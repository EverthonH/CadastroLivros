<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LivroController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/livro', function () {
    return view('livros');
})->middleware(['auth'])->name('livro');
 Route::resource('livros', LivroController::class);

 Route::post('/novo/livro', [LivroController::class, 'store'])->middleware('auth')->name('addlivro'); //Rota para adicionar     

 Route::put('/livro/{livro}/update', [LivroController::class, 'update'])->name('uplivro')->middleware('auth'); //Rota para Editar

 Route::get('/livro/remover/{livro}', [LivroController::class, 'destroy'])->name('delelivro')->middleware('auth'); //Rota para Deletar
 

require __DIR__.'/auth.php';
