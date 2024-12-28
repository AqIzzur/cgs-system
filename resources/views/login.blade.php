@extends('main')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center vh-100">
            <div class="mt-5 p-4 col-md-5 col-sm-8 mx-auto bg-success bg-opacity-50 rounded">
                <h2 class="text-center">Sign In</h2>
                <form action="{{ route('main.login_submit') }}" method="post" class="">
                    @csrf 
                    <div class="row my-4">
                        <div class="col-lg-12 mb-2">

                            <label for="user" class="fs-5 fw-bold text-dark">Email :</label>
                        </div>
                        <div class="col">
                            <input type="email" name="email" id="user" class="form-control">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-lg-12 mb-2 ">
                            <label for="password" class="fs-5 fw-bold  text-dark">Password :</label>
                        </div>
                        <div class="col">
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <p class="text-center text-white mt-3">
                        Don't have an account? <a href="{{ route('main.register') }}" class="text-decoration-none text-primary"> Register</a>
                    </p>
                    <div class="d-flex justify-content-between">
                        <a href="/" class="text-decoration-none btn btn-secondary"><i class="fa fa-backward"></i> Back</a>
                        {{-- <a href="/" class="text-decoration-none "></a> --}}
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection