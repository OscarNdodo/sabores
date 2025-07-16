<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class RecipeController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        // Valida que a imagem tenha no máximo 5MB
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->getSize() > 5 * 1024 * 1024) {
                return back()->withErrors(['image' => 'A imagem deve ter no máximo 5MB.']);
            }
            $data["image"] = $file->store('recipes/images');
        }


        $items = [];
        foreach ($data as $key => $value) {
            if (preg_match('/^item-\d+$/', $key)) {
                $items[] = $value;
            }
        }
        $items;
        $data["ingredients"] = $items;

        $steps = [];
        foreach ($data as $key => $value) {
            if (preg_match('/^step-\d+$/', $key)) {
                $steps[] = $value;
            }
        }
        $steps;
        $data["steps"] = $steps;

        $user = Auth::user();

        $recipe = $user->recipes()->create($data);

        if ($recipe) {
            foreach ($items as $ingredient) {
                $recipe->ingredients()->create(["name" => $ingredient]);
            }
        }
        if ($recipe) {
            foreach ($steps as $key => $step) {
                $recipe->steps()->create([
                    "step_number" => $key + 1,
                    "instruction" => $step
                ]);
            }
        }
        return Redirect::route('panel')->withErrors(["success" => "Receita criada com sucesso!"]);
    }


    public function explore()
    {
        $recipes = Recipe::with(['user', 'ingredients'])
            // ->where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('explore', [
            "recipes" => $recipes
        ]);
    }


    public function show($id)
    {
        $recipe = Recipe::find($id / now()->format("dmy"));
        if ($recipe) {
            $data = [
                "ip_address" => request()->ip(),
                "user_agent" => request()->userAgent(),
                "referrer" => request()->headers->get('referer'),
            ];

            $recipe = Recipe::with(['user', 'ingredients', 'steps'])
                ->findOrFail($id / now()->format("dmy"));
            $recipe->views()->create($data);
        } else {
            return redirect()->route('explore')->withErrors(['error' => 'Receita não encontrada.']);
        }

        $relatedRecipes = $this->getRelatedRecipes($recipe);

        return view('view', [
            "recipe" => $recipe,
            "relatedRecipes" => $relatedRecipes
        ]);
    }

    protected function getRelatedRecipes(Recipe $recipe)
    {
        // 1. Por mesma categoria (mais simples)
        $byCategory = Recipe::where('category', $recipe->category)
            ->where('id', '!=', $recipe->id)
            ->with(['user'])
            ->limit(4)
            ->get();


        // 3. Por ingredientes similares (mais complexo)
        $byIngredients = [];
        if ($recipe->ingredients->isNotEmpty()) {
            $ingredientNames = $recipe->ingredients->pluck('name');

            $byIngredients = Recipe::whereHas('ingredients', function ($query) use ($ingredientNames) {
                $query->whereIn('name', $ingredientNames);
            })
                ->where('id', '!=', $recipe->id)
                ->with(['user'])
                ->limit(4)
                ->get();
        }

        // Combine todos os resultados, removendo duplicatas e a receita atual
        $related = $byCategory
            ->merge($byIngredients)
            ->unique('id')
            ->shuffle()
            ->take(4); // Limita a 4 receitas relacionadas

        // Se não encontrou o suficiente, complete com receitas populares
        if ($related->count() < 3) {
            $popular = Recipe::orderBy('created_at', 'desc')
                ->where('id', '!=', $recipe->id)
                ->with(['user'])
                ->limit(3 - $related->count())
                ->get();

            $related = $related->merge($popular);
        }

        return $related;
    }

    public function aiGenerate(Request $request)
    {
        $title = $request->validate([
            "title" => "required|string|max:255"
        ])["title"];

        // dd($title);
        // Implement AI generation logic here
        $response = Http::withHeaders([
            'Authorization' => 'Bearer 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',
            'Content-Type' => 'application/json',
        ])->post('https://openrouter.ai/api/v1/chat/completions', [
            'model' => 'mistralai/mistral-7b-instruct',
            'messages' => [
                ['role' => 'user', 'content' => "Crie uma receita de " . $title . ". Retorne apenas um JSON válido com os seguintes campos: \"descricao\" (descricao longa com vataminas e vantagens), \"duracao\"(ex. 1h 20min), \"level\"(ex. low), \"ingredientes\" (array de strings), \"preparo\" (array de strings). Sem explicações. Apenas o JSON. Use português de Moçambique."]
            ]
        ]);


        // dd($response->body());
        $data = $response->json();
        if (isset($data['error'])) {
            return response()->json(['error' => $data['error']], 400);
        }
        if (!isset($data['choices'][0]['message']['content'])) {
            return response()->json(['error' => 'Invalid response format'], 400);
        }

        $ia_recipe = json_decode($data["choices"][0]["message"]["content"], true);
        $ia_recipe["title"] = $title;

        $user = Auth::user();
        $recipes = $user->recipes;

        // dd($ia_recipe);
        return view("panel", [
            "ia" => true,
            "recipes" => $recipes,
            "ia_recipe" => $ia_recipe
        ]);
    }
}
