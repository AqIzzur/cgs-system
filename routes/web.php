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
Route::get('/zr', [MainController::class, 'loginAdmin'])->name('main.login_admin');
Route::post('/zr', [MainController::class, 'loginAdmin_submit'])->name('main.login_admin_submit');
Route::get('/login', [MainController::class, 'login'])->name('main.login');
Route::post('/login/submit', [MainController::class, 'login_submit'])->name('main.login_submit');
Route::get('/register', [MainController::class, 'register'])->name('main.register');
Route::post('/register/save', [MainController::class, 'register_save'])->name('main.register_save');
Route::get('/todolist', [TodolistController::class, 'view'])->name('todolist.view');

// Role Admin

// Route::get('/example', function () {
//     // $user = Auth::guard('user')->user();
//     // dd($user); // Cek apakah user terdeteksi
//     if (Auth::guard('user')->check()) {
//         return 'User sudah login';
//     } else {
//         return 'User belum login';
//     }
// });

// Route untuk user dengan role 'user'
Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'view'])->name('users.view');
    Route::get('/logout', [UserController::class, 'logout']);
});

// Route untuk admin dengan role 'admin'
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'view'])->name('admin.view'); 
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
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
