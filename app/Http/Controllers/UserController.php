<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absensi;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function view(){
        $absen = Absensi::where('user_id', Auth::user()->user_id)
                ->where('tanggal', date('Y-m-d'))
                ->first();
        if($absen){
            return view('users.dashboard', ['title' => 'Dashboard User']);
        }else{
            auth()->logout();
            return redirect()->route('main.login')->with('errorlogin', 'Anda Tidak diizinkan Login oleh Admin');
        }
    }
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('logout', 'Selamat Anda Berhasil Logout');
    }

}
