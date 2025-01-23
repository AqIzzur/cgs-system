@extends('errors.main_error')
@section('title', '404 | Halaman Tidak Ditemukan')
@section('errors')
    {{-- <div class="container"> --}}
        {{-- <div class="row"> --}}
            <div class="d-flex vh-100 justify-content-center align-items-center text-center">
                <h1 class="poppins-bold text-uppercase text-white text-error-custom font-monospace">Halaman Tidak Ditemukan</h1>
                <a href="{{ route('main') }}" class="btn btn-outline-primary">Go To Home</a>
            </div>
        {{-- </div> --}}
    {{-- </div> --}}

@endsection