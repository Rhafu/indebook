<?php

use Blog\Infra\Controller\PostCreateController;
use Blog\Infra\Controller\PostReadController;
use Blog\Infra\Middleware\PostReadMiddlewareValidator;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('post/{id}', PostReadController::class)
    ->middleware([PostReadMiddlewareValidator::class]);

Route::post('post', PostCreateController::class);
