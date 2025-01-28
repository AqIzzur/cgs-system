<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absensi;
use App\Models\KategoriAsset;
use App\Models\AssetData;
use App\Models\user;
use App\Models\Dokument;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function view(){
        $admin_khusus = user::where('user_id', Auth::user()->user_id)
            ->where('role', 'admin')
            ->where('akses_spesial', 'yes')
            ->first();
        $absen = Absensi::where('user_id', Auth::user()->user_id)
                ->where('tanggal', date('Y-m-d'))
                ->first();
        if($absen){
            return view('users.dashboard', ['title' => 'Dashboard User']);
        }else{
            if($admin_khusus){
                dd($admin_khusus);
            }
            auth()->logout();
            return redirect()->route('main.login')->with('errorlogin', 'Anda Tidak diizinkan Login oleh Admin');
        }
    }

    public function asset_view(){
        $kategori = KategoriAsset::orderBy('created_at', 'asc')->get();
        return view('users.asset', [
            'title'         => 'Asset | Users',
            'kategori' => $kategori, 
        ],);
    }

    public function asset_user_view($id){
        // dd($id);
        $cek_kategori = AssetData::select('*')
                        ->where('kategori_asset', $id)
                        ->get();
        // dd($cek_kategori);
        return view('users.asset.index', [
            'title'         => 'Asset | Users',
            'view_asset'    => $cek_kategori,
            'kat_aset'      => $id,
        ]);
    }
    public function asset_user_save(Request $request){
        // dd($request);
        $cek = Validator::make($request->all(), [
            "name_aset" => 'required|max:20',
            "file_asset"=> 'image|nullable|mimes:png,jpg,jpeg|max:3024'
        ]);
        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->with('error', 'Input Asset Error') // Kirim error ke view
                ->withInput();          // Kirim data input sebelumnya
        }
        $kategori = KategoriAsset::select('kategori_name')->where('kategori_id', $request->kategori_id)->first();
        $img_name = $kategori->kategori_name . date('H-i-s'). '.' . $request->file_asset->extension();
        $ext = $request->file_asset->extension();
        // dd($img_name,$ext );
        DB::beginTransaction();
        try{
        // dd($request->name_aset, $img_name, $request->kategori_id, $ext, $request->akses,Auth::user()->user_id);
            AssetData::create([
                'name_asset'        => $request->name_aset,
                'file_asset'        => $img_name,
                'kategori_asset'    => $request->kategori_id,
                'type_file'         => $ext,
                'akses'             => $request->akses,
                'user_id'           => Auth::user()->user_id,
                'created_at'        => now(),
                'updated_at'        => now(),

            ]);

            DB::commit();
            $request->file_asset->move(public_path('images/asset'), $img_name);
            return  redirect()->back()->with('success', 'Input Asset Successful');

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with('error', 'detail: ' . $e->getMessage());
        }

    }

    public function asset_user_download($filename){

        $file = public_path('images/asset/'. $filename);

        // dd($file);
        // Periksa apakah file ada
        if (!file_exists($file)) {
            abort(404, 'File tidak ditemukan.');
        }

        return Response::download($file);
    }

    public function dokumentasi_view(){
        // dd();
        $data_dokumentasi = Dokument::select('*')->where('akses', 'user')->get();
        return view('users.dokumentasi', [
            'title'     => 'Dokumentasi | Users',
            'data'       => $data_dokumentasi,
        ]);
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('logout', 'Selamat Anda Berhasil Logout');
    }

}
