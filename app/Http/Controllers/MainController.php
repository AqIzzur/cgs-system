<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class MainController extends Controller
{
    public function view(){
        return view('index');
    }
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }

    public function register_save(Request $request){
        DB::beginTransaction();
        try{
        $validated = $request->validate([
            'FullName' => 'required|string|max:255',
            'NickName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'SchoolName' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        DB::table('user_account')->insert([
            'full_name' => $validated['FullName'],
            'nick_name' => $validated['NickName'],
            'email' => $validated['email'],
            'school_name' => $validated['SchoolName'],
            'password' => Hash::make($validated['password']),
            'password_confirmation' => $validated['password'],
            // 'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::commit();
        return view('login')->with('success', 'Pendaftaran Berhasil');
        // dd(session()->all());

        } catch (\Exception $e) {
            DB::rollback();
            return redirect::back()->with('error', 'Input Failed');
        }
    }
}
