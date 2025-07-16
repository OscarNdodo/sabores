<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $steps = [];
        foreach ($data as $key => $value) {
            if (preg_match('/^step-\d+$/', $key)) {
                $steps[] = $value;
            }
        }
        $steps;

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
        return Redirect::back()->withErrors(["success" => "Receita criada com sucesso!"]);
    }
}
