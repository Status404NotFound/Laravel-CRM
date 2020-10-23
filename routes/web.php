<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Blog\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Auth::routes();
Route::view('/', 'home');
Route::view('/admin', 'admin');


Route::get('post/{id}', [PostController::class, 'show']);

