<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PublicController;
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

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
//Ricerca per prezzo//
Route::get('/ricerca/articolo', [PublicController::class, 'searchArticle'])->name('article.search');
//profilo utente//
Route::get('/auth/profile', [PublicController::class, 'profile'])->name('auth.profile');
//articoli//
Route::get('/Article/create', [ArticleController::class, 'create'])->name('article.create');
Route::get('/Article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('Article/show{article}', [ArticleController::class, 'show'])->name('article.show');
Route::delete('/Article/destroy{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
Route::get('Article/category{category}', [ArticleController::class, 'indexCategory'])->name('article.indexCategory');
Route::get('/Article/edit{article}', [ArticleController::class, 'edit'])->name('article.edit');

//carrello//
Route::post('/Article/addToCart{article}', [CartController::class, 'addToCart'])->name('article.addToCart');
Route::get('/Article/show/cart', [CartController::class, 'showCart'])->name('article.showCart');


