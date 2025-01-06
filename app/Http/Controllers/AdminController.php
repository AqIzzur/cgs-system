<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\absensi;
use App\Models\Dokument;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;



class AdminController extends Controller
{
    public function view(){
        return view('admin.dashboard', ['title' => 'Dashboard | Admin']);
    }
    public function users(){
        return view('admin.users', ['title' => 'Data Users | Admin']);

    }
    public function absensi(){
        // dd();
        if(!request('month')){
                $absensi = Absensi::join('tb_user', 'tb_user.user_id', '=', 'absensi.user_id')
                ->select('absensi.*', 'tb_user.*')
                ->orderBy('tanggal', 'desc')
                ->paginate(10);
                            // dd();
        }else{
            $query = Absensi::select('absensi.*', 'tb_user.full_name')
                            ->join('tb_user', 'tb_user.user_id', '=', 'absensi.user_id')
                            ->orderBy('tanggal', 'desc');
                            // ->get();
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
        foreach($absensi as $absen_waktu){

            $time = $absen_waktu->login_time;
            $parsedTime = Carbon::parse($time); // Parse waktu menggunakan Carbon
            $startTime = Carbon::createFromTime(7, 30); // 07:30
            $endTime = Carbon::createFromTime(9, 30);   // 09:30
            $waktu = $parsedTime->between($startTime, $endTime) ? 'text-success' : 'text-danger';
        }


        $user_select = DB::table('tb_user')
                    ->where('status', 'active')
                    ->where('role', 'user')
                    ->get();
        return view('admin.users.absen', [
            'title' => 'Data Users | Admin',
            'menu' => 'absensi',
            'absensi_with_user' => $absensi,
            'user' => $user_select, 
            'waktu' => $waktu,   
        ],
             );
    }
    public function absensi_delete($id){
        // dd($id);
        $user = absensi::where('user_id', $id)
                    ->where('tanggal' , date('Y-m-d'))
                    ->first();
        if ($user) {
            $user->delete(); // Hapus data
            return redirect()->back()->with('success', 'User berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }
    }
    public function absensi_izin(Request $request){
        // dd($request->all());
        DB::beginTransaction();
        try{
        // dd($request->all());

            $cek_data = Validator::make($request->all(),[
                'nama_user'     => 'required',
                'dari_tanggal'  => 'required|date',
                'sampai_tanggal'=> 'required|date|after_or_equal:dari_tanggal',
                'keterangan'    => 'required|regex:/^(\w+\s+){3,}\w+$/',
                'img_ket'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ],[
                'nama_user.required'    => 'Nama User Wajib Dipilih!',
                'dari_tanggal.required' => 'Tanggal Harus Diisi!',
                'dari_tanggal.date'     => 'Format Tanggal Tidak Sesuai!',
                'sampai_tanggal.required'=> 'Tanggal Harus Diisi!',
                'sampai_tanggal.date'   => 'Format Tanggal Tidak Sesuai!',
                'sampai_tanggal.after_or_equal'=> 'Tanggal Harus Sesudah!',
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
            $dari_tanggal   = Carbon::parse($request->dari_tanggal);
            $sampai_tanggal = Carbon::parse($request->sampai_tanggal) ;
        // dd($request->all());

            // $cek_absen = DB::table('absensi')
            //             ->where('user_id', $request->user_id)
            //             ->where('tanggal', date('Y-m-d'))
            //             ->first();

            // // dd();

            // if($cek_absen){
                
            //     return redirect()->back()->with('errorlogin', 'User Sudah Login');
            // }

            $cari_nama = DB::table('tb_user')
                        ->where('user_id', $request->nama_user)
                        ->first();
                // dd($cari_nama->);
                $imageName = $cari_nama->nick_name . time(). '.' . $request->img_ket->extension();
                while ($dari_tanggal   <= $sampai_tanggal) {
            DB::table('absensi')->insert([
                'user_id'       => $request->nama_user,
                'tanggal'       => $dari_tanggal->toDateString(),
                'status_user'   => 'izin',
                'foto'          => $imageName,
                'keterangan'    => $request->keterangan,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
            $dari_tanggal->addDay(); // Tambah 1 hari
            DB::commit();
        }
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
            'title' => 'Data Users | Admin',
            'menu' => 'tugas',
        ]);
    }
    public function user(){
        $show_users = User::latest();


        return view('admin.users.user', [
            'title' => 'Data Users | Admin',
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

// Asset
    public function asset(){
        return view('admin.asset', ['title' => 'Asset | Admin']);
    }
    public function dokumentasi(){
        return view('admin.dokumentasi', ['title' => 'Dokumentasi | Admin']);
    }

    public function dokumentasi_data(){
        return view('admin.dokumentasi.data', [
            'title' => 'Dokumentasi | Admin',
            'menu'  => 'data',
        ]);

    }

    public function dokumentasi_data_save(Request $request){
        $cek_data = validator::make($request->all(), [
            'title'     => 'required|regex:/^(\w+\s+){3,}\w+$/', 
            'hastag'    => 'required|regex:/^(#\w+(\s+|,\s*)?){5,}$/',
            'akses'     => 'required',
            'file'      => 'required|mimes:pdf|max:2048',
            'img_sampul'=> 'required|image|mimes:jpeg,png,jpg|max:3048',
        ],[
            'title.required'     => 'Judul Wajib diisi!',
            'title.regex'     => 'Judul Minimal 4 kata',
            'hastag.required'    => 'Hastag Harus diisi!',
            'hastag.regex'    => 'Hastag Minimal 6',
            'akses.required' => 'Akses Harus diisi!',
            'file.required' => 'File harus diunggah.',
            'file.mimes' => 'File harus berformat PDF.',
            'file.max' => 'Ukuran file maksimal adalah 3MB.',
            'img_sampul.required'=> 'Gambar Sampul harus diunggah',
            'img_sampul.image'=> 'Format Gambar Tidak Sesuai!',
            'img_sampul.mimes'=> 'Format Gambar Harus .jpeg, .png dan jpg!',
            'img_sampul.max'=> 'Ukuran Gambar Maksimal 3 MB',
        ]); 
        // dd(Request()->all());
        if ($cek_data->fails()) {
            return redirect()->back()
                ->withErrors($cek_data) // Kirim error ke view
                ->withInput();          // Kirim data input sebelumnya
        }
        DB::beginTransaction();  // Mulai transaksi database
        try {
            // Simpan file PDF
        $filePath   = $request->akses . date('d-m-Y'). '.' . $request->file->extension();;
        $imageName  = $request->akses . date('d-m-Y'). '.' . $request->img_sampul->extension();;
        
        Dokument::create([
            'title'     => $request->title,
            'file_path' => $filePath,
            'image'     => $imageName,
            'akses'     => $request->akses,
            'hastag'    => $request->hastag,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::commit();
        $request->file->move(public_path('images/dokumentasi/file'), $filePath);
        $request->img_sampul->move(public_path('images/dokumentasi/sampul'), $imageName);
        return  redirect()->back()->with('success', 'Documentation Added Successfully');
    } catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->with('error', 'There is an error: ' . $e->getMessage());
    }

    }




    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('main.login_admin')->with('success', 'Anda Berhasil Logout');
    }
}
