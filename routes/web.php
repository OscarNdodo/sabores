<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cadastrar', function () {
    return view('account');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/explorar', function () {
    return view('explore');
});


Route::get('explorar/receita', function () {
    return view('view');
});

Route::middleware("auth")->prefix("painel/u/")->group(function () {
    Route::get("/", [AuthController::class, 'home'])->name("panel");
    Route::post("/receitas/criar", [RecipeController::class, 'store'])->name("panel.recipes.store");
});
