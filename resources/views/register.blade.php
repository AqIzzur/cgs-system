@extends('main')
@section('content')
<link rel="stylesheet" href="{{ asset('asset/css/style-register.css') }}">

{{-- <div class="container pb-3">
    <div class="row d-flex justify-content-center align-items-center vh-100 pb-3">
        <div class="mt-5 p-4 col-lg-9 col-sm-9 mx-auto bg-primary bg-opacity-50 rounded ">
            <h2 class="text-center">Sign Up</h2>

            <form action="{{ route('main.register_save') }}" method="POST" class="" autocomplete="off">
                @csrf 
                <div class="row my-4">
                    <div class="col-lg-6 col-sm-12">

                        <div class="form-group">
    
                            <label for="user" class="fs-5 fw-bold text-dark">Full name :</label>
                            <input type="text" name="FullName" id="user" class="form-control"  >
                            @error('FullName')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
    
                            <label for="NickName" class="fs-5 fw-bold text-dark">Nick name :</label>
    
                            <input type="text" name="NickName" id="NickName" class="form-control"  >
                            @error('NickName')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
    
                            <label for="email" class="fs-5 fw-bold text-dark">Email :</label>
                            <input type="email" name="email" id="email" class="form-control"  value="{{ old('email') }}">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">

                        <div class="form-group">
    
                            <label for="SchoolName" class="fs-5 fw-bold text-dark">School Name :</label>
                            <input type="text" name="SchoolName" id="SchoolName" class="form-control"  >
                            @error('SchoolName')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
    
    
                        <div class="form-group ">
                            <label for="password" class="fs-5 fw-bold  text-dark">Password :</label>
                            <input type="password" name="password" id="password" class="form-control"  >
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="PasswordConfirmation" class="fs-5 fw-bold  text-dark">Password Confirmation :</label>
                            <input type="password" name="PasswordConfirmation" id="PasswordConfirmation" class="form-control"  >
                            @error('PasswordConfirmation')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                
                <p class="text-center text-white mt-3 fs-6">
                    Already have an account? <a href="{{ route('main.login') }}" class="text-decoration-none text-primary"> Login</a>
                </p>
                <div class="d-flex justify-content-between">
                    <a href="/" class="text-decoration-none btn btn-secondary"><i class="fa fa-backward"></i> Back</a>
                
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-right-to-bracket"></i> Register</button>
                </div>
                
            </form>
        </div>
    </div>
</div> --}}

<div class="wrapper">
    <div class="form-left">
        <h2 class="text-uppercase">information</h2>
        <p class=" text-white">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et molestie ac feugiat sed. Diam volutpat commodo.
        </p>
        <p class="text text-white">
            <span>Sub Head:</span>
            Vitae auctor eu augudsf ut. Malesuada nunc vel risus commodo viverra. Praesent elementum facilisis leo vel.
        </p>
        <div class="form-field">
            {{-- <input type="submit" class="account" value=""> --}}
            <a href="{{ route('main.login') }}" class="account text-decoration-none">Have an Account?</a>
        </div>
    </div>
    <form action="{{ route('main.register_save') }}" method="POST" autocomplete="off" class="form-right">
        @csrf
        <h2 class="text-uppercase">Registration form</h2>
        <div class="row">
            <div class="col-sm-6 mb-3">
                <label for="FullName">Full Name</label>
                <input type="text" name="FullName" id="FullName" class="input-field">
                @error('FullName')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-6 mb-3">
                <label for="NickName">Nick Name</label>
                <input type="text" name="NickName" id="NickName" class="input-field">
                @error('NickName')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="SchoolName">Your School</label>
            <input type="text" class="input-field" name="SchoolName" >
            @error('SchoolName')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email">Your Email</label>
            <input type="email" class="input-field" name="email" id="email" >
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="row">
            <div class="col-sm-6 mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="input-field">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-6 mb-3">
                <label for="PasswordConfirmation">Current Password</label>
                <input type="password" name="PasswordConfirmation" id="PasswordConfirmation" class="input-field">
                @error('PasswordConfirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        {{-- <div class="mb-3">
            <label class="option">I agree to the <a href="#">Terms and Conditions</a>
                <input type="checkbox" checked>
                <span class="checkmark"></span>
            </label>
        </div> --}}
        {{-- <p class="text-start text-dark mt-3 fs-6">
            Already have an account? <a href="{{ route('main.login') }}" class="text-decoration-none text-primary"> Login</a> --}}
        </p>
        <div class="form-field">
            {{-- <input type="submit" value="Register" class="register" name="register"> --}}
            <button type="submit" class="register"><i class="fa fa-user-plus"></i> Register</button>
        </div>
    </form>
</div>
@endsection