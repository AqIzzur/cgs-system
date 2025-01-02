<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\absensi;
use Illuminate\Support\Facades\Validator;



class AdminController extends Controller
{
    public function view(){
        return view('admin.dashboard', ['title' => 'Dashboard Admin']);
    }
    public function users(){
        return view('admin.users', ['title' => 'Data Users']);

    }
    public function absensi(){
        // dd();
        if(!request('month')){
                $absensi = DB::table('absensi')
                            ->select('absensi.*', 'tb_user.full_name')
                            ->join('tb_user', 'tb_user.user_id', '=', 'absensi.user_id')
                            ->orderBy('user_id', 'asc')
                            ->paginate(10);
                            // dd();
        }else{
            $query = Absensi::select('absensi.*', 'tb_user.full_name')
                            ->join('tb_user', 'tb_user.user_id', '=', 'absensi.user_id')
                            ->orderBy('tanggal', 'desc')
                            ->get();
                        // Filter berdasarkan bulan
                if (request('month')) {
                    $query->whereIn('month', request('month'));
                }
                        // Filter berdasarkan status
                if (request('status')) {
                    $query->where('status', request('status'));
                }

                // dd();
                $absensi = $query->paginate(10);
        }

        $user_select = DB::table('tb_user')
                    ->where('status', 'active')
                    ->get();
        return view('admin.users.absen', [
            'title' => 'Data Users',
            'menu' => 'absensi',
            'absensi_with_user' => $absensi,
            'user' => $user_select,    
        ],
             );
    }

    public function absensi_izin(Request $request){
        // dd($request->all());
        DB::beginTransaction();
        try{
        // dd($request->all());

            $cek_data = Validator::make($request->all(),[
                'nama_user'     => 'required',
                'keterangan'    => 'required|regex:/^(\w+\s+){3,}\w+$/',
                'img_ket'       => 'required|image|mimes:jpeg, png, jpg|max:2048',
            ],[
                'nama_user.required'    => 'Nama User Wajib Dipilih!',
                'keterangan.required'   => 'Keterangan Wajib Diisi!!',
                'keterangan.regex'      => 'Minimal 3 Kata',
                'img_ket.required'      => 'Foto Bukti Wajib Di Upload!',
                'img_ket.image'         => 'Format file bukan Foto',
                'img_ket.mimes'         => 'Extensi Gambar Harus berupa .jpeg .png .jpg',
                'img_ket.max'           => 'Maksimal Ukuran Gambar 2Mb',
            ]);

        // dd($request->all());

            // dd($request->all());
            if ($cek_data->fails()) {
        // dd($request->all());
                return redirect()->back()
                    ->withErrors($cek_data) // Kirim error ke view
                    ->withInput();          // Kirim data input sebelumnya
            }
        // dd($request->all());

            $cek_absen = DB::table('absensi')
                        ->where('user_id', $request->user_id)
                        ->where('tanggal', date('Y-m-d'))
                        ->first();

            // dd();

            if($cek_absen){
                
                return redirect()->back()->with('errorlogin', 'User Sudah Login');
            }

            $cari_nama = DB::table('tb_user')
                        ->where('user_id', $request->nama_user)
                        ->first();
                // dd($cari_nama->);
                $imageName = $cari_nama->nick_name . time(). '.' . $request->img_ket->extension();

            DB::table('absensi')->insert([
                'user_id'       => $request->nama_user,
                'tanggal'       => date('Y-m-d'),
                'status_user'   => 'izin',
                'foto'          => $imageName,
                'keterangan'    => $request->keterangan,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            DB::commit();
            $request->img_ket->move(public_path('images/izin/'), $imageName);
            return redirect()->back()->with('success', 'Izin Berhasil Diinput');
        }catch (\Exception $e){
        DB::rollback();
            // dd($e->getMessage());
            return redirect()->back()->with('errorlogin','detail :'. $e->getMessage());
        }
    }

    public function tugas(){
        return view('admin.users.tugas', [
            'title' => 'Data Users',
            'menu' => 'tugas',
        ]);
    }
    public function user(){
        $show_users = User::latest();


        return view('admin.users.user', [
            'title' => 'Data Users',
            'menu' => 'user',
            'users' => $show_users->get(),
        ]);
    }
    public function filterAbsensi(Request $request)
{   
    // dd($request->all());
    $months = $request->input('month'); // Array bulan terpilih
    $status = $request->input('status'); // Status (hadir, izin, atau kosong untuk semua)

    $filter_absensi = DB::table('absensi')
    ->join('tb_user', 'tb_user.user_id', '=', 'absensi.user_id')
    ->when($months, fn($query) => $query->whereRaw('EXTRACT(MONTH FROM tanggal) IN (?)', [$months]))
    ->when($status, fn($query) => $query->where('status', $status))
    ->get();

        // $absensi_with_user = [];

        // foreach ($filter_absensi as $absensi) {
        //     // Ambil nama lengkap pengguna berdasarkan user_id
        //     $user = DB::table('tb_user')->select('full_name')
        //             ->where('user_id', $absensi->user_id)
        //             ->first(); // Menggunakan first() karena hanya satu data yang diambil
            
        //             // $user_name = $user ? $user->full_name : 'Nama tidak ditemukan';
        
        //             // Tambahkan data absensi dan user ke dalam array
        //             $absensi_with_user[] = [
        //                 'absensi' => $absensi,
        //                 // Nama pengguna yang ditemukan atau 'Nama tidak ditemukan'
        //             ];
        // }
    
        // Kirimkan data ke view
        return view('admin.users.absen', ['absensi_with_user']);
    // $absensi = $filter_absensi . $user;

    // dd($user);
        // echo $absensi;
    // return view('admin.users.absen', compact('absensi'));
}




    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('main.login_admin')->with('success', 'Anda Berhasil Logout');
    }
}
