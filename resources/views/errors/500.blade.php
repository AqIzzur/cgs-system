@extends('errors.main_error')
@section('title', '500 | Server Error')
@section('errors')
<div class="d-flex vh-100 justify-content-center align-items-center text-center flex-column">
    <h1 class="poppins-bold text-uppercase text-white text-error-custom font-monospace">500 | Server Error</h1>
    <a href="{{ route('main') }}" class="btn btn-outline-primary poppins-bold fs-4">Go To Home</a>
    {{-- <h5 class="">Sila</h5> --}}
</div>
@endsection