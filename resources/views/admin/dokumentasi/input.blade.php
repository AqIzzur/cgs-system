@extends('admin.dokumentasi')
@section('content_dokumentasi')
<link rel="stylesheet" href="{{ asset('asset/css/users/style-dokumentasi.css') }}">

    <div class="container">
        <div class="col-lg-9 col-sm-12">
            <h3 class="poppins-bold  text-md-start text-center">Input Dokumentasi</h3>
            <hr class=" garis_dokumentasi">
        </div>
        <div class="row">
            <div class="col-md-5 mx-auto col-sm-12 mt-3 p-2">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control">
                    </div>
                </form>
            </div>
            <div class="col-md-5 mx-auto col-sm-12 mt-3 p-2">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection