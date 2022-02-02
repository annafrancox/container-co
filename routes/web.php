<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContainerController;

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

Auth::routes();

//rota redirecionando para login
Route::get('/', [PagesController::class, 'home'])->name('home');

Route::middleware(['auth'])->group(function () {
    // Rotas logadas
    Route::get('dashboard', [PagesController::class, 'dashboard'])->name('dashboard');

    // Rotas logadas no sistema
    Route::prefix('admin')->middleware(['auth'])->group(function () {
        //users
        Route::resource('/usuarios', UserController::class)->names('users')->parameters(['usuarios' => 'user']);
        Route::resource('/categorias', CategoryController::class)->names('categories')->except('show')->parameters(['categorias' => 'categoria']);
        Route::resource('/containers', ContainerController::class)->names('containers')->except('show');
    });
});
