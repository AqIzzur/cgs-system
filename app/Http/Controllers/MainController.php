<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use App\Models\user;
use App\Models\absensi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class MainController extends Controller
{
    public function view(){
        return view('index', ['title' => 'Main Page']);
    }
    public function login(){
        return view('login', ['title' => 'Login User']);
    }
    public function login_submit(Request $request){

            $cekLogin = validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string|min:8',
            ],[
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'password.required' => 'Password Salah!',
                'password.min:8' => 'Password minimal 8 karakter',
            ]);
            if ($cekLogin->fails()) {
                return redirect()->back()
                    ->withErrors($cekLogin) // Kirim error ke view
                    ->withInput();          // Kirim data input sebelumnya
            }
            // cek di table
            $user_account  = user::select('*')
            ->where('email', $request->email)
            ->where('role', '=', 'user')
            ->first();
            // dd($user_account->all());
            if($user_account){
                if (Hash::check($request->password, $user_account->password)) {
                        $absen1 = DB::table('absensi')
                                        ->where('user_id', $user_account->user_id)
                                        ->where('status_user', 'izin')
                                        ->where('tanggal', date('Y-m-d'))
                                        ->get();
                        $absen2 = DB::table('absensi')
                                        ->where('user_id', $user_account->user_id)
                                        ->where('status_user', 'hadir')
                                        ->where('tanggal', date('Y-m-d'))
                                        ->get();
                    // echo $absen->user_id;
                                    // Jika sudah izin
                                    if (!$absen1->isEmpty()) {
                                        return redirect()->back()->with(['errorlogin' => 'Detail: Anda Sudah Izin!']);
                                    } 
                                    $time = \Carbon\Carbon::now();
                                    $startTime = \Carbon\Carbon::createFromTime(7, 30, 0); // 07:30
                                    $endTime = \Carbon\Carbon::createFromTime(17, 30, 0);
                                    if (!$time->between($startTime, $endTime)) {
                                        // dd('Waktu tidak valid', $time, $startTime, $endTime);
                                        return redirect()->back()->with(['errorlogin' => 'detail : Login hanya diperbolehkan antara pukul 07:30 sd 17:30.']);
                                    }
                                    if ($absen2->isEmpty()) {      
                                        Absensi::create([
                                            'user_id' => $user_account->user_id,
                                            'tanggal' => date('Y-m-d'),
                                            'status_user'  => 'hadir',
                                            'login_time' => date('H:i:s'),
                                            'created_at' => now(),
                                            'updated_at' => now(),
                                        ]);
                                    }


                                    // Loginkan user dan redirect ke dashboard
                                    Auth::login($user_account);
                                    return redirect('/user/dashboard');
                }else{

                    return redirect()->back()->with(['errorlogin' => 'detail : Password salah!']);
                }
        
            }else{
                return redirect()->back()->with('errorlogin','detail : Email Belum Terdaftar');
            }

    }

    public function register(){
        return view('register', ['title' => 'Register User']);
    }

    public function register_save(Request $request){
        // dd($request->all());
        // dd($request->file('img_profile')); 

        DB::beginTransaction();
        try{
            $cekRegister = Validator::make($request->all(), [
                'FullName' => 'required|string|max:255',
                'NickName' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:tb_user,email',
                'PhoneNumber' => 'required|string|min:10|unique:tb_user,no_hp',
                'SchoolName' => 'required|string|max:255',
                'password' => 'required|string|min:8',
                'PasswordConfirmation' => 'required|string|same:password',
                'img_profile' => 'image|mimes:jpeg,png,jpg|max:3048',
                'adress' => 'required|min:15',
            ], [
                // Pesan error dalam bahasa Indonesia
                'FullName.required' => 'Nama lengkap wajib diisi.',
                'NickName.required' => 'Nama panggilan wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah terdaftar.',
                'PhoneNumber.required' => 'Nomor Hp Harus Diisi',
                'PhoneNumber.unique' => 'Nomor Hp Sudah Digunakan',
                'PhoneNumber.min:10' => 'Nomor Hp Minimal 10',
                'SchoolName.required' => 'Nama sekolah wajib diisi.',
                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password minimal harus terdiri dari 8 karakter.',
                'PasswordConfirmation.required' => 'Konfirmasi password wajib diisi.',
                'PasswordConfirmation.same' => 'Konfirmasi password harus sama dengan password.',
                'img_profile.image' => 'Tipe File Bukan Gambar', 
                'img_profile.mimes' => 'Tipe File Harus jpeg , png atau jpg', 
                'img_profile.max' => 'Ukuran File maksimal 3MB', 
                'adress.required' => 'Alamat Wajib Diisi!',
                'adress.min' => 'Minimal Karakter 15',
            ]);
// dd($request->all());
                if ($cekRegister->fails()) {
                    return redirect()->back()
                        ->withErrors($cekRegister) // Kirim error ke view
                        ->withInput();          // Kirim data input sebelumnya
                }
                if($request->img_profile){
                    $imageName = $request->NickName . time(). '.' . $request->img_profile->extension();
                }else{
                    $imageName = null;
                }
                
                // $imagesave = 'images/'. $imageName ;

            DB::table('tb_user')->insert([
                'full_name' =>$request->input('FullName'),
                'nick_name' =>$request->input('NickName'),
                'email' =>$request->input('email'),
                'no_hp' =>$request->input('PhoneNumber'),
                'school_name' =>$request->input('SchoolName'),
                'password' => Hash::make($request->input('password')),
                'password_confirmation' => $request->input('PasswordConfirmation'),
                'role' => 'user',
                'alamat' => $request->input('adress'),
                'img_profile' =>  $imageName,
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
            ]);

            DB::commit();
            if($request->img_profile){
            $request->img_profile->move(public_path('images/profile'), $imageName);
            return  redirect()->route('main.login')->with('success', 'Registration Successful');
            }else{
                return  redirect()->route('main.login')->with('success', 'Registration Successful');
            }
        }catch (\Exception $e){
            DB::rollback();
            // dd($e->getMessage());
            return redirect()->back()->with('errorlogin','detail :'. $e->getMessage());
        }
    }
    public function loginAdmin(){
        return view('admin', ['title' => 'Login Admin']);
    }
    public function loginAdmin_submit(Request $request){
        $cekLogin = validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ],[
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password Wajib diisi!',
            'password.min:8' => 'Password minimal 8 karakter',
        ]);
        if ($cekLogin->fails()) {
            return redirect()->back()
                ->withErrors($cekLogin) // Kirim error ke view
                ->withInput();          // Kirim data input sebelumnya
        }

        $user = user::all('*')
            ->where('email', $request->email)
            ->where('role', '=', 'admin')
            ->first();

        if($user){
            if(Hash::check($request->password, $user->password)){
                // echo "Email = ". $request->email. "<br> Password : $request->password";
                Auth::login($user);
                return redirect()->route('admin.view');
            }else{
                return redirect()->back()->withInput()->with('errorAdmin','Password Salah!!');
            }
        }else{
            return redirect()->back()->with('errorAdmin','Email Belum Terdaftar!!');
        }
    }
}
