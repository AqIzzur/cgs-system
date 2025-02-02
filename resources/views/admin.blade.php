@extends('main')
@section('content')
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="text-center my-3">
                    <img src="{{ asset('asset/image/logo-cgs-png.png') }}" alt="logo" width="200">
                </div>
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h1 class="fs-3 card-title fw-bold mb-4"><i class="fa fa-user"></i> Login </h1>
                        <form method="POST" action="" class="needs-validation" novalidate="" autocomplete="off">
                            @csrf
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="mb-2 w-100">
                                    <label class="text-muted" for="password">Password</label>
                                    {{-- <a href="forgot.html" class="float-end">
                                        Forgot Password?
                                    </a> --}}
                                </div>
                                {{-- <div class="password-container"> --}}
                                    <div class="input-group">
                                      <input type="password" class="form-control" id="password"  name="password" required value="{{ old('password') }}">
                                      <span class="input-group-text" id="togglePassword"><i class="fas fa-eye"></i></span>
                                    </div>
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  {{-- </div> --}}
                                {{-- <input id="password" type="password" class="form-control" name="password" required value="{{ old('password') }}"> --}}

                            </div>

                            <div class="d-flex align-items-center">
                                {{-- <div class="form-check"> --}}
                                    <a href="/" class="btn btn-secondary text-decoration-none"><i class="fa fa-backward"></i> Back</a>
                                {{-- </div> --}}
                                <button type="submit" class="btn btn-primary ms-auto">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            Don't have an account? <a href="{{ route('main.register') }}" class="text-dark">Create One</a>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3 mb-4 text-muted">
                    Copyright &copy; 2025 M. Izzur Rohman &mdash; Cipta Graha Software 
                </div>
            </div>
        </div>
    </div>
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
</section>
@endsection