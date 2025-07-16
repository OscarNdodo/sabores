<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
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
        return view('panel', [
            "ia" => false,
            'ia_recipe' => [],
            "recipes" => $recipes
        ]);
    }

    public function logout()
    {
        Auth::logout(); // Log the user out
        return redirect('/'); // Redirect to the home page
    }
}
