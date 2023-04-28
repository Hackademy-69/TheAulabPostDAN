<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;

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

//PUBLIC
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/careers', [PublicController::class, 'careers'])->name('careers');
Route::post('/careers/submit', [PublicController::class, 'careers_submit'])->name('careers.submit');

//ARTICLE
Route::get('/article/{article}/show', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/{category}/index', [ArticleController::class, 'articles_by_category'])->name('article.category');

//ADMIN
Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/{user}/set-admin}', [AdminController::class, 'make_user_admin'])->name('admin.make_user_admin');
    Route::get('/admin/{user}/set-revisor}', [AdminController::class, 'make_user_revisor'])->name('admin.make_user_revisor');
    Route::get('/admin/{user}/set-writer}', [AdminController::class, 'make_user_writer'])->name('admin.make_user_writer');
});

//REVISOR
Route::middleware('revisor')->group(function(){
    Route::get('/revisor/dashboard', [RevisorController::class, 'revisor_dashboard'])->name('revisor.dashboard');
    Route::get('/revisor/article/{article}/detail', [RevisorController::class, 'article_detail'])->name('revisor.detail');
    Route::get('/revisor/article/{article}/accept', [RevisorController::class, 'accept_article'])->name('revisor.accept');
    Route::get('/revisor/article/{article}/reject', [RevisorController::class, 'reject_article'])->name('revisor.reject');
});

//WRITER
Route::middleware('writer')->group(function(){
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
});