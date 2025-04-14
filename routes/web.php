<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;    
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubscriptionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/data', [UserController::class, 'getData'])->name('users.data');

Route::get('/users/list', [UserController::class, 'list'])->name('users.list');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/send-email', [EmailController::class, 'sendEmail'])->name('sendemail');

Route::get('/product', [ProductController::class, 'setProduct'])->name('product');
Route::get('/list-product', [ProductController::class, 'getProducts'])->name('list-product');

Route::post('/product/{id}/extend-subscription', [ProductController::class, 'extendProductSubscription']);

Route::get('/create-user', function () {
    return view('create-user'); 
})->name('create-user');

Route::post('/create-user', [UserController::class, 'create'])->name('create-user');

require __DIR__.'/auth.php';
