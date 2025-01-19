@extends('main')
@section('content')
<style>
          .form-control-position {
            position: relative;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
</style>
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
          <div class="mb-3">
              <input type="text" class="form-control" name="email" placeholder="Your Email" id="UserName" value="{{ old('email') }}">
              @error('email')
              <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          {{-- <div class="mb-3 form-control-position"> --}}
            <div class="password-container">
              <div class="input-group">
                <input type="password" name="password" class="form-control" id="password" placeholder="Your Password" value="{{ old('password') }}">
                <span class="input-group-text" id="togglePassword"><i class="fas fa-eye"></i></span>
              </div>
            </div>
            {{-- <input type="password"  id="password" class="form-control" placeholder="Your Password" /> --}}
            {{-- <i id="togglePassword" class="fas fa-eye toggle-password" ></i> --}}
              @error('password')
              <span class="text-danger">{{ $message }}</span>
              @enderror
          {{-- </div> --}}

          <p class="have-accuount">Don't have an account yet? <a href="{{ route('main.register') }}" class="text-decoration-none text-primary">Sign Up</a></p>
          <button type="submit" class="mt-2 btn btn-success w-100">Log in</button>
      </form>
    
       
  </div>
  <div class="fixed-bottom text-center mt-3 mb-2 text-muted" >
    Copyright &copy; 2025 M. Izzur Rohman &mdash; Cipta Graha Software 
</div>

    {{-- <script src="{{ asset('asset/js/style-user.js') }}"></script> --}}
    <script>
document.addEventListener("DOMContentLoaded", function () {
      const togglePassword = document.getElementById('togglePassword');
      const passwordInput = document.getElementById('password');

      // Pastikan elemen ditemukan
      console.log('togglePassword:', togglePassword); // Debugging
      console.log('passwordInput:', passwordInput); // Debugging

      if (togglePassword && passwordInput) {
        togglePassword.addEventListener('click', function () {
          // Ubah tipe input antara password dan text
          const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
          passwordInput.setAttribute('type', type);

          // Toggle ikon
          this.querySelector('i').classList.toggle('fa-eye');
          this.querySelector('i').classList.toggle('fa-eye-slash');
        });
      }
    });   

  </script>
@endsection