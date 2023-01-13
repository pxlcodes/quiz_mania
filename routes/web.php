<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GameController;
use App\Models\Category;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/games', [GameController::class, 'index'])->name('games.index');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');


    Route::get('/categories/{category:name}', function (Category $category) {
        $questions = $category->questions;

        $total = $questions->count();
        $answered = $questions->where('answered', true)->count();

        return Inertia::render('Games/Questions');
    })->name('games.category');


    Route::get('/games/{category:name}', function (Category $category) {
        $questions = $category->questions;
        return Inertia::render('Games/Questions');
    })->name('games.category');

    Route::get('/games/{category:name}/1', function (Category $category) {
        return Inertia::render('Games/Question');
    })->name('games.question');


});
