<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('/users', UserController::class);



//Route::resource('/users', UserController::class)
//    ->middleware('auth:sanctum');

Route::resource('/categories', CategoryController::class);

Route::resource('/products', ProductController::class);

