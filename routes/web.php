<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\TodolistController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


use Illuminate\Support\Facades\DB;

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

Route::get('/', [MainController::class, 'view'])->name('main');
Route::get('/login', [MainController::class, 'login'])->name('main.login');
Route::post('/login/submit', [MainController::class, 'login_submit'])->name('main.login_submit');
Route::get('/register', [MainController::class, 'register'])->name('main.register');
Route::post('/register/save', [MainController::class, 'register_save'])->name('main.register_save');
Route::get('/todolist', [TodolistController::class, 'view'])->name('todolist.view');

// Role Admin


// Route untuk user dengan role 'user'
Route::middleware(['auth:user', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'view'])->name('users.view');
});

// Route untuk admin dengan role 'admin'
Route::middleware(['auth:admin', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard',function(){
                    dd(Auth::guard('user')->check());

    }); 
    // [AdminController::class, 'view'])->name('admin.view');
});
Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return 'Koneksi ke database berhasil!';
    } catch (\Exception $e) {
        return 'Gagal terhubung: ' . $e->getMessage();
    }
});
