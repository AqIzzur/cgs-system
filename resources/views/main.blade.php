<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Tambahkan token CSRF dalam request POST -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Team Cretive</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/awesome/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/style-custom.css')  }}">
    <link rel="stylesheet" href="{{ asset('asset/css/styles.css')  }}">
    <link rel="stylesheet" href="{{ asset('asset/css/swiper.css')  }}">


    <!-- Tambahkan jQuery CDN di <head> atau sebelum </body> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


</head>
<body>
    @yield('content') 
    <!-- Alert Modal -->
    @if (session('success'))
    <div class="modal fade alert-modal" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success bg-opacity-50">
                    <h5 class="modal-title " id="successModalLabel">Berhasil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <i class="ms-3 fa-solid fa-circle-check fa-4x" style="color: #63E6BE;"></i>
                        </div>
                        <div class="col ">
                            <p class="text-uppercase my-auto fs-5 fw-bold mt-2">{{ session('success') }}</p>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if (session('error'))
    <div class="modal fade alert-modal" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger bg-primary-50">
                    <h5 class="modal-title text-white " id="errorModalLabel">Gagal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-3">
                            <i class="fa-solid fa-circle-exclamation fa-4x ms-3" style="color: #ff0000;"></i>
                        </div>
                        <div class="col ">
                            <p class="text-uppercase my-auto fs-5 fw-bold mt-2">{{ session('error') }}</p>

                        </div>
                        
                    {{-- <p class="text-uppercase"></p> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger " data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Bootstrap JS -->
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Cek session flash untuk modal success
            @if (session('success'))
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            @endif
    
            // Cek session flash untuk modal error
            @if (session('error'))
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            @endif
        });
    </script>
    

<script src="{{ asset('asset/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('asset/js/swiper.min.js') }}"></script>
<script src="{{ asset('asset/js/scripts.js') }}"></script>
<script src="{{ asset('asset/js/awesome/all.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
{{-- @izzur.akun1426 --}}