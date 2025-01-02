@extends('main')
@section('content')
    <link rel="stylesheet" href="{{ asset('asset/css/style-user.css') }}">
    <div class="login-form">
        <div class="d-flex">
            <a href="{{ route('main') }}" class="text-decoration-none mx-auto">
            <img src="{{ asset('asset/image/logo-cgs-png.png') }}" class="mb-3 logo-login" alt=""  loading="lazy">
            </a>
        </div>
        <h3 class=""></h3>
        <form action="{{ route('main.login_submit') }}" method="post">
            @csrf
        <div class="form-group ">
          <input type="text" class="form-control" name="email" placeholder="Your Email" id="UserName" value="{{ old('email') }}">
          {{-- <i class="mdi mdi-account"></i> --}}
          @error('email')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group ">
          <input type="password" name="password" class="form-control" placeholder="Your Password" id="Passwod" value="{{ old('password') }}">
          @error('password')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
         {{-- <span class="alert">Invalid Credentials</span>
         <a class="link" href="#">Lost your password?</a> --}}
         <p  class="have-accuount">Don't have an account yet ? <a href="{{ route('main.register') }}" class="text-decoration-none text-primary"> Sign Up</a></p  >
        <button type="submit" class="mt-2 log-btn" ><i class="mdi mdi-account"></i> Log in</button>
    </form>
    
       
  </div>
  <div class="fixed-bottom text-center mt-3 mb-2 text-muted" >
    Copyright &copy; 2025 M. Izzur Rohman &mdash; Cipta Graha Software 
</div>

    <script src="{{ asset('asset/js/style-user.js') }}"></script>
@endsection