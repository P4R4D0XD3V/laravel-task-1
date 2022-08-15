<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\PageController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\TrashController;


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

Route::get('/', [PageController::class, 'index'])->name('/')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/users/create', [UserController::class, 'create']);
    Route::get('/users/edit/{id}', [UserController::class, 'edit']);
    Route::get('/users/delete/{id}', [UserController::class, 'delete']);
    Route::post('/users/store', [UserController::class, 'store']);
    Route::post('/users/{id}/update', [UserController::class, 'update']);

    Route::get('/users/restore/{id}', [UserController::class, 'restore']);
    Route::get('/users/force-delete/{id}', [UserController::class, 'forceDelete']);


    Route::get('/products/create', [ProductController::class, 'create']);
    Route::get('/products/edit/{id}', [ProductController::class, 'edit']);
    Route::get('/products/delete/{id}', [ProductController::class, 'delete']);
    Route::post('/products/store', [ProductController::class, 'store']);
    Route::post('/products/{id}/update', [ProductController::class, 'update']);

    Route::get('/products/restore/{id}', [ProductController::class, 'restore']);
    Route::get('/products/force-delete/{id}', [ProductController::class, 'forceDelete']);

    Route::get('/categories/create', [CategoryController::class, 'create']);
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit']);
    Route::get('/categories/delete/{id}', [CategoryController::class, 'delete']);
    Route::post('/categories/store', [CategoryController::class, 'store']);
    Route::post('/categories/{id}/update', [CategoryController::class, 'update']);

    Route::get('/categories/restore/{id}', [CategoryController::class, 'restore']);
    Route::get('/categories/force-delete/{id}', [CategoryController::class, 'forceDelete']);

    Route::get('/trash', [TrashController::class, 'index']);


});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [PageController::class, 'home']);
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/categories', [CategoryController::class, 'index']);
});
