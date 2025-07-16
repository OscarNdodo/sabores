<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $recipes = Recipe::with(['user']) // Carrega relações adicionais se necessário
            ->withCount('views')          // Conta as visualizações
            ->orderByDesc('views_count')   // Ordena por visualizações (descendente)
            ->take(6)                     // Limita a 10 receitas
            ->get();

        $destaque1 = $recipes[0];
        $destaque2 = $recipes[1];
        // $destaque["user"] = User::where("");
        // dd($destaque->user);

        return view("welcome", [
            "recipes" => $recipes,
            "destaque1" => $destaque1,
            "destaque2" => $destaque2,
        ]);
    }


    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            // Show the login form
            return view('login');
        }
        // Validate the request data
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // dd($data); // Debugging line to check the input data
        // Attempt to log the user in
        if ($request->remember == 'on') {
            $remember = true; // Set remember me if checkbox is checked
        } else {
            $remember = false; // Default to not remembering
        }
        if (Auth::attempt($data, $remember)) {
            // Authentication passed, redirect to intended page
            // $user = preg_replace('/[^A-Za-z0-9]/', '', iconv('UTF-8', 'ASCII//TRANSLIT', mb_strtolower(Auth::user()->name)));
            // return redirect()->route('panel', ['user' => $user]);
            return redirect()->route('panel');
        }

        // Authentication failed, redirect back with error
        return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function home()
    {
        $user = Auth::user();
        $recipes = $user->recipes()->orderBy('created_at', 'desc')->paginate(9);
        $views = 0;
        foreach ($recipes as $item) {
            $views += $item->views()->count();
        }

        $recent_recipes = $user->recipes()->orderBy('created_at', 'desc')->paginate(3);
        $recent_views = [];

        foreach ($recent_recipes as $item) {
            $data = $item->views()->orderBy("created_at", "asc")->paginate(2);
            foreach ($data as $i) {
                $recent_views[] = $i;
            }
        }

        // dd($recent_views);

        return view('panel', [
            "ia" => false,
            'ia_recipe' => [],
            "recipes" => $recipes,
            "views" => $views,
            "recent_recipes" => $recent_recipes,
            "recent_views" => $recent_views
        ]);
    }

    public function logout()
    {
        Auth::logout(); // Log the user out
        return redirect('/'); // Redirect to the home page
    }
}
