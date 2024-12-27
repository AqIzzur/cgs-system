<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
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
    public function login_submit(Request $request){
        // dd($request->all());
        DB::beginTransaction();
        try{
            $cekLogin = validator::make($request->all(), [
                'email' => 'required|email,',
                'password' => 'required|string|min:8',
            ]);

            DB::commit();
            return  redirect()->route('main.login')->with('success', 'Registration Successful');
        }catch(\Exception $e){
            DB::rollback();
            // dd($e->getMessage());
            return redirect()->back()->with('error','detail :'. $e->getMessage());
        }
    }


    public function register(){
        return view('register');
    }

    public function register_save(Request $request){
        DB::beginTransaction();
        try{
            $validator = Validator::make($request->all(), [
                'FullName' => 'required|string|max:255',
                'NickName' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:user_account,email',
                'SchoolName' => 'required|string|max:255',
                'password' => 'required|string|min:8',
                'PasswordConfirmation' => 'required|string|same:password',
            ]);
// dd($request->all());
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator) // Kirim error ke view
                        ->withInput();          // Kirim data input sebelumnya
                }

            DB::table('user_account')->insert([
                'full_name' =>$validator['FullName'],
                'nick_name' =>$validator['NickName'],
                'email' =>$validator['email'],
                'school_name' =>$validator['SchoolName'],
                'password' => Hash::make($validator['password']),
                'password_confirmation' => $validator['PasswordConfirmation'],
                'role' => '1',
                'created_at' => now(),
                'updated_at' => now(),
                // 'full_name' =>$request->FullName,
                // 'nick_name' =>$request->NickName,
                // 'email' =>$request->email,
                // 'school_name' =>$request->SchoolName,
                // 'password' => Hash::make($request->password),
                // 'password_confirmation' => $request->PasswordConfirmation,
                // 'role' => '1',
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ], [
                // Pesan error dalam bahasa Indonesia
                'FullName.required' => 'Nama lengkap wajib diisi.',
                'NickName.required' => 'Nama panggilan wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah terdaftar.',
                'SchoolName.required' => 'Nama sekolah wajib diisi.',
                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password minimal harus terdiri dari 8 karakter.',
                'PasswordConfirmation.required' => 'Konfirmasi password wajib diisi.',
                'PasswordConfirmation.same' => 'Konfirmasi password harus sama dengan password.',
            ]);

            DB::commit();
            return  redirect()->route('main.login')->with('success', 'Registration Successful');
        }catch (\Exception $e){
            DB::rollback();
            // dd($e->getMessage());
            return redirect()->back()->with('errorlogin','detail :'. $e->getMessage());
        }

        // DB::beginTransaction();
        // try{
        // $validated = $request->validate([
        //     'FullName' => 'required|string|max:255',
        //     'NickName' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:user_account,email',
        //     'SchoolName' => 'required|string|max:255',
        //     'password' => 'required|string|min:8|confirmed',
        //     // 'PasswordConfirmation' => 'required|string|max:255',
        // ]);

        // DB::table('user_account')->insert([
        //     'full_name' => $validated['FullName'],
        //     'nick_name' => $validated['NickName'],
        //     'email' => $validated['email'],
        //     'school_name' => $validated['SchoolName'],
        //     'password' => Hash::make($validated['password']),
        //     // 'password_confirmation' => $validated['PasswordConfirmation'],
        //     // 'role' => 'user',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);


        // DB::commit();
        // return  redirect()->route('login')->with('success', 'Registration Successful');
        // // dd(session()->all());

        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return redirect::back()->with('error', 'Registration Failed');
        // }
    }
}
