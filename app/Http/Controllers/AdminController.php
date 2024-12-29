<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view(){
        return view('admin.dashboard', ['title' => 'Dashboard Admin']);
    }
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('main.login_admin')->with('success', 'Selamat Anda Berhasil Logout');
    }
}
