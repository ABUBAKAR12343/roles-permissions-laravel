<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
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
// Auth::routes();
Route::resource('permissions', PermissionController::class);
Route::get('/deleteRole/{id}',[PermissionController::class, 'destroy'])->name('deleteRole');
Route::post('/update/{id}',[PermissionController::class, 'update'])->name('update');
Route::resource('roles', RoleController::class);
Route::get('/delete/{id}',[RoleController::class, 'destroy'])->name('delete');
Route::post('/update/{id}',[RoleController::class, 'update'])->name('update');
Auth::routes();

Route::get('/createArticle',[ArticleController::class, 'create'])->name('createArticle');
Route::post('/storeArticle',[ArticleController::class, 'store'])->name('storeArticle');
Route::get('/article',[ArticleController::class, 'index'])->name('article');
Route::get('/editArticle/{id}',[ArticleController::class, 'edit'])->name('editArticle');
Route::post('/updateArticle/{id}',[ArticleController::class, 'update'])->name('updateArticle');
// Web routes file (web.php)
Route::get('article/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Web routes file (web.php)
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');

