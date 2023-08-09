<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckGuest;
use App\Http\Middleware\IsAdmin;
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


/**
 * Routes accessible only to guests (unauthenticated users).
 */
Route::middleware(CheckGuest::class)->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/register', [HomeController::class, 'register'])->name('register');
    Route::get('/login', [HomeController::class, 'login'])->name('login');;
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('auth/google', [GoogleLoginController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('auth/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);
});

/**
 * Routes accessible only to authenticated users.
 */
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::middleware(IsAdmin::class)->group(function () {
        Route::get('/manage-users', [UserController::class, 'index'])->name('admin.manage.users');
        Route::get('/add-user', [UserController::class, 'create'])->name('admin.add.user');
        Route::get('/edit-user/{user_id}', [UserController::class, 'edit'])->name('admin.edit.user');
        Route::get('/delete-user-modal/{user_id}', [UserController::class, 'deleteUserModal'])->name('admin.delete.user.modal');
        Route::post('/update-user/{user_id}', [UserController::class, 'update'])->name('admin.update.user');
        Route::post('/create-user', [UserController::class, 'store'])->name('admin.create.user');
        Route::delete('/delete-user/{user_id}', [UserController::class, 'destroy'])->name('admin.delete.user');
    });
});







