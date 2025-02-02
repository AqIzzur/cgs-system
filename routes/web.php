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
Route::middleware(['guest'])->group(function(){
    Route::get('/zr', [MainController::class, 'loginAdmin'])->name('main.login_admin');
    Route::post('/zr', [MainController::class, 'loginAdmin_submit'])->name('main.login_admin_submit');
    Route::get('/login', [MainController::class, 'login'])->name('main.login');
    Route::post('/login/submit', [MainController::class, 'login_submit'])->name('main.login_submit');
});

Route::get('/', [MainController::class, 'view'])->name('main');
Route::get('/register', [MainController::class, 'register'])->name('main.register');
Route::post('/register/save', [MainController::class, 'register_save'])->name('main.register_save');
Route::get('/todolist', [TodolistController::class, 'view'])->name('todolist.view');

// Route untuk mengarahkan user yang sudah login maupun belum'
Route::get('/home', function () {
    $userRole = auth()->user()->role; // Ambil nilai role dari kolom

    if ($userRole === 'user') {
        return redirect('user/dashboard');
    } elseif ($userRole === 'admin') {
        return redirect('admin/dashboard');
    } else {
        Route::get('/', [MainController::class, 'view'])->name('main');   
    }
})->middleware(['auth']);

Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'view'])->name('users.view');
    Route::get('/asset', [UserController::class, 'asset_view'])->name('asset.view');
    Route::prefix('asset')->group(function (){
        Route::get('/view/{id}', [UserController::class, 'asset_user_view'])->name('asset_user.view');
        Route::post('/view/save', [UserController::class, 'asset_user_save'])->name('asset_user.save');
        Route::get('/download/{filename}', [UserController::class, 'asset_user_download'])->name('asset_user.download');
    });
    Route::get('/dokumentasi', [UserController::class, 'dokumentasi_view'])->name('dokumentasi.view');
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
});

// Route untuk admin dengan role 'admin'
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'view'])->name('admin.view'); 
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::prefix('users')->group(function () {
        Route::get('/absensi', [AdminController::class, 'absensi'])->name('users.absensi');
        Route::post('/absensi', [AdminController::class, 'absensi_izin'])->name('users.absensi_save');
        Route::delete('/absensi/delete/{id}', [AdminController::class, 'absensi_delete'])->name('users.absensi_delete');
        Route::post('/absensi/filter', [AdminController::class, 'filterAbsensi'])->name('filter.absensi');
        Route::get('/tugas', [AdminController::class, 'tugas'])->name('users.tugas');
        Route::get('/user', [AdminController::class, 'user'])->name('users.user');
    });
    Route::get('/asset', [AdminController::class, 'asset'])->name('admin.asset');
    Route::post('/asset', [AdminController::class, 'asset_kategori_save'])->name('asset.kategori_save');
    Route::post('/asset/save', [AdminController::class, 'asset_save'])->name('asset.save');
    Route::post('/asset/edit/{id}', [AdminController::class, 'asset_edit'])->name('asset.edit');
    Route::delete('/asset/delete/{id}', [AdminController::class, 'asset_delete'])->name('asset.delete');
    Route::delete('/asset/deleteall/{id}', [AdminController::class, 'asset_deleteall'])->name('asset.deleteall');
    Route::prefix('asset')->group(function () {
        Route::get('/data/{id}', [AdminController::class, 'data_aset'])->name('asset.data');
        Route::post('/data/{id}', [AdminController::class, 'data_aset_edit'])->name('asset.data_edit');
        Route::delete('/data/delete/{id}', [AdminController::class, 'delete_asset'])->name('asset.data_delete');
        Route::get('/download/{filename}', [AdminController::class, 'data_aset_download'])->name('asset.data_download');
    });
    Route::get('/dokumentasi', [AdminController::class, 'dokumentasi'])->name('admin.dokumentasi');
    Route::prefix('dokumentasi')->group(function () {
        Route::get('/data-dokumentasi', [AdminController::class, 'dokumentasi_data'])->name('dokumentasi.data');
        Route::post('/data-dokumentasi', [AdminController::class, 'dokumentasi_data_save'])->name('dokumentasi.data_save');
        Route::get('/view/{filename}', [AdminController::class, 'viewPdf'])->name('pdf.view');
        Route::post('/edit/{id}', [AdminController::class, 'dokumentasi_data_edit'])->name('dokumentasi.data_edit');
        Route::delete('/delete/{id}', [AdminController::class, 'dokumentasi_data_delete'])->name('dokumentasi.data_delete');
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
