@extends('main')
@section('content')
<div class="container pb-3">
    <div class="row d-flex justify-content-center align-items-center vh-100 pb-3">
        <div class="mt-5 p-4 col-lg-9 col-sm-9 mx-auto bg-primary bg-opacity-50 rounded ">
            <h2 class="text-center">Sign Up</h2>
            {{-- @if ($errors->any()) 
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif  --}}
            <form action="{{ route('main.register_save') }}" method="POST" class="" autocomplete="off">
                @csrf 
                {{-- @method('PUT') --}}
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
                
                <p class="text-center text-white mt-3">
                    Already have an account? <a href="{{ route('main.login') }}" class="text-decoration-none text-primary"> Login</a>
                </p>
                <div class="d-flex justify-content-between">
                    <a href="/" class="text-decoration-none btn btn-secondary"><i class="fa fa-backward"></i> Back</a>
                    {{-- <a href="/" class="text-decoration-none btn btn-primary"><i class="fa-solid fa-right-to-bracket"></i> Register</a> --}}
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-right-to-bracket"></i> Register</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection