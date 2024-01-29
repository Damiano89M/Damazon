<?php

use App\Http\Controllers\ArticleController;
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

Route::get('/Article/create', [ArticleController::class, 'create'])->name('article.create');
Route::get('/Article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('Article/show{article}', [ArticleController::class, 'show'])->name('article.show');
Route::delete('/Article/destroy{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
Route::get('Article/category{category}', [ArticleController::class, 'indexCategory'])->name('article.indexCategory');