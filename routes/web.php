<?php

use App\Http\Controllers\LivroController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/usuario/register', [UsuarioController::class, 'create'])->name('usuario.create');
Route::post('/ususario', [UsuarioController::class, 'register'])->name('register');

Route::get('/livros', [LivroController::class, 'index'])->middleware('auth')->name('livros.index');
Route::get('/livro/create', [LivroController::class, 'create'])->middleware('auth')->name('livro.create');
Route::post('/livro', [LivroController::class, 'store'])->middleware('auth')->name('livro.store');
Route::get('/livro/edit/{livro}', [LivroController::class, 'edit'])->middleware('auth')->name('livro.edit');
Route::put('/livro/{livro}', [LivroController::class, 'update'])->middleware('auth')->name('livro.update');
Route::delete('/livro/destroy/{livro}', [LivroController::class, 'destroy'])->middleware('auth')->name('livro.destroy');
