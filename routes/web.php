<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\PostsController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    /* ================= PARA CATEGORIAS ======================== */
    Route::resource('/categorias', \App\Http\Controllers\CategoriasController::class); 
    Route::post('/categorias/delete', [CategoriasController::class, 'deletes'])->name('categorias.deletes');
    Route::post('/categorias/deleteDefinitive', [CategoriasController::class, 'deletesDefinitive'])->name('categorias.deletesDefinitive');
    Route::post('/categorias/restore/{id}', [CategoriasController::class, 'restore'])->name('categorias.restore');
    Route::post('/categorias/restores', [CategoriasController::class, 'restores'])->name('categorias.restores');
    /* ================= FIN CATEGORIAS ======================== */

    /* ================= PARA POSTS ======================== */
    Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');//Usando el slug
    Route::get('/posts/{posts}', [PostsController::class, 'show'])->name('posts.show');//Usando el slug    
    Route::resource('/posts', \App\Http\Controllers\PostsController::class); 
    Route::post('/posts/delete', [PostsController::class, 'deletes'])->name('posts.deletes');
    Route::post('/posts/deleteDefinitive', [PostsController::class, 'deletesDefinitive'])->name('posts.deletesDefinitive');
    Route::post('/posts/restore/{id}', [PostsController::class, 'restore'])->name('posts.restore');
    Route::post('/posts/restores', [PostsController::class, 'restores'])->name('posts.restores');
    Route::post('/postsImg/temp-upload', [PostsController::class, 'tempUpload'])->name('posts.restores');
    Route::delete('/postsImg/temp-delete', [PostsController::class, 'tempDelete'])->name('posts.restores');    
    /* ================= FIN POSTS ======================== */
});

require __DIR__.'/auth.php';
