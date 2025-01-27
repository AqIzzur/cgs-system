@extends('errors.main_error')
@section('title', '419 || PAGE EXPIRED')
@section('errors')
<div class="d-flex flex-column vh-100 justify-content-center align-items-center text-center">
    <h1 class="poppins-bold text-uppercase text-white text-error-custom font-monospace">419 | PAGE EXPIRED</h1>
    <a href="{{ route('main') }}" class="btn btn-outline-primary poppins-bold fs-4 text-white">Go To Home</a>
</div>
@endsection