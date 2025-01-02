@extends('main')
@section('content')
<link rel="stylesheet" href="{{ asset('asset/css/style-register.css') }}">

<div class="wrapper">
    <div class="form-left ">
        <h2 class="text-uppercase text-white">information</h2>
        <p class=" text-white">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et molestie ac feugiat sed. Diam volutpat commodo.
        </p>
        <p class="text text-white">
            <span>Sub Head:</span>
            Vitae auctor eu augudsf ut. Malesuada nunc vel risus commodo viverra. Praesent elementum facilisis leo vel.
        </p>
        <div class="form-field ">
            {{-- <input type="submit" class="account" value=""> --}}
            <a href="{{ route('main.login') }}" class="mt-3 account text-decoration-none">Have an Account?</a>
        </div>
    </div>
    <form action="{{ route('main.register_save') }}" method="POST" autocomplete="off" class="form-right" enctype="multipart/form-data">
        @csrf
        <h2 class="text-uppercase">Registration form</h2>
        <div class="row">
            <div class="col-sm-6 mb-3">
                <label for="FullName">Full Name</label>
                <input type="text" name="FullName" id="FullName" class="input-field" value="{{ old('FullName') }}">
                @error('FullName')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-6 mb-3">
                <label for="NickName">Nick Name</label>
                <input type="text" name="NickName" id="NickName" class="input-field" value="{{ old('NickName') }}">
                @error('NickName')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="PhoneNumber">Your Phone Number</label>
                <input type="text" class="input-field" name="PhoneNumber"  id="PhoneNumber" value="{{ old('PhoneNumber') }}">
                @error('PhoneNumber')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col mb-3">
                <label for="SchoolName">Your School</label>
                <input type="text" class="input-field" name="SchoolName"  value="{{ old('SchoolName') }}">
                @error('SchoolName')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        {{-- <div class="mb-3">
            
        </div>
        <div class="mb-3">
            
        </div> --}}

        <div class="mb-3">
            <label for="adress">Your Address</label>
            <textarea name="adress" class="input-field" id="adress" cols="30" rows="3">{{ old('adress') }}</textarea>
            {{-- <input type="email" class="input-field" name="adress" id="adress"  value="{{ old('email') }}"> --}}
            @error('adress')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email">Your Email</label>
            <input type="email" class="input-field" name="email" id="email"  value="{{ old('email') }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="row">
            <div class="col-sm-6 mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="input-field" value="{{ old('password') }}">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-6 mb-3">
                <label for="PasswordConfirmation">Confirm Password</label>
                <input type="password" name="PasswordConfirmation" id="PasswordConfirmation" class="input-field" value="{{ old('PasswordConfirmation') }}">
                @error('PasswordConfirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12 mb-3">
                <label for="img_profile" class="custom-file-upload "><i class="fas fa-file-upload"></i> Upload Your Profile Photo</label>
                <input type="file" name="img_profile" id="img_profile" class="input-field">
                @error('img_profile')
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
            <a href="{{ route('main') }}" class="register text-decoration-none bg-dark me-3"><i class="fa fa-backward"></i> Back</a>
            <button type="submit" class="register"><i class="fa fa-user-plus"></i> Register</button>
        </div>
    </form>
</div>
@endsection