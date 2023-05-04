<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

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

Route::get('/article/search', [ArticleController::class, 'articleSearch'])->name('article.search');

//ADMIN
Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/{user}/set-admin}', [AdminController::class, 'make_user_admin'])->name('admin.make_user_admin');
    Route::get('/admin/{user}/set-revisor}', [AdminController::class, 'make_user_revisor'])->name('admin.make_user_revisor');
    Route::get('/admin/{user}/set-writer}', [AdminController::class, 'make_user_writer'])->name('admin.make_user_writer');
    Route::put('/admin/edit/{tag}/tag', [AdminController::class, 'editTag'])->name('admin.editTag');
    Route::delete('/admin/delete/{tag}/tag', [AdminController::class, 'deleteTag'])->name('admin.deleteTag');
    Route::put('/admin/edit/{category}/category', [AdminController::class, 'editCategory'])->name('admin.editCategory');
    Route::delete('/admin/delete/{category}/category', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');
    Route::post('/admin/category/store', [ AdminController::class, 'storeCategory'])->name('admin.storeCategory');

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
    Route::get('/writer/dashboard/', [WriterController::class, 'dashboard'])->name('writer.dashboard');
    Route::get('/article/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/article/{article}/update', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/article/{article}/destroy', [ArticleController::class, 'destroy'])->name('article.destroy');


});