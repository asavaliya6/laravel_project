<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\V1\UserController as V1UserController;
use App\Http\Controllers\API\V2\UserController as V2UserController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('/user', [AuthController::class, 'getUser']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::prefix('v1')->group(function () {
    Route::get('/users', [V1UserController::class, 'index']);
});

Route::prefix('v2')->group(function () {
    Route::get('/users', [V2UserController::class, 'index']);
});
