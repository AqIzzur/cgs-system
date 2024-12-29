<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="icon" href="{{ asset('asset/image/cgs_team.png') }}" type="image/x-icon">
    {{-- <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    {{-- <link rel="stylesheet" href="{{ asset('asset/css/awesome/fontawesome.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('asset/css/style_sidebar.css') }}">
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">BBBootstrap</span> </a>
                    <div class="nav_list"> <a href="#" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> <a href="#" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a> <a href="#" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Messages</span> </a> <a href="#" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span> </a> <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span> </a> <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a> </div>
                </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100 bg-light">
            <h4>Main Components</h4>
        </div>
        <!--Container Main end-->












        <script src="{{ asset('asset/js/script-sidebar.js') }}"></script>
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
@if (session('errorlogin'))
<div class="modal fade alert-modal" id="errorModalLogin" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger bg-primary-50">
                <h5 class="modal-title text-white " id="errorModalLabel">Pendaftaran Gagal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-3">
                        <i class="fa-solid fa-circle-exclamation fa-4x ms-3" style="color: #ff0000;"></i>
                    </div>
                    <div class="col ">
                        <p class="text-uppercase my-auto fs-6 fw-bold mt-2">Pendaftaran gagal: </p> 
                        <p> {{ session('errorlogin') }}</p>

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
@if (session('errorAdmin'))
<div class="modal fade alert-modal" id="errorModalAdmin" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger bg-primary-50">
                <h5 class="modal-title text-white " id="errorModalLabel">Login Gagal</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-3">
                        <i class="fa-solid fa-circle-exclamation fa-4x ms-3" style="color: #ff0000;"></i>
                    </div>
                    <div class="col ">
                        <h3 class="text-uppercase my-auto  fw-bold mt-2">Login gagal: </h3> 
                        <p class=""> Detail : <span class="text-primary">{{ session('errorAdmin') }}</span></p>

                    </div>
                    
                {{-- <p class="text-uppercase"></p> --}}
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-bs-dismiss="modal">OK</button>
            </div> --}}
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
        @if (session('errorlogin'))
            var errorModal = new bootstrap.Modal(document.getElementById('errorModalLogin'));
            errorModal.show();
        @endif
        @if (session('errorAdmin'))
            var errorModal = new bootstrap.Modal(document.getElementById('errorModalAdmin'));
            errorModal.show();
        @endif
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
{{-- <script src="{{ asset('asset/js/bootstrap.bundle.js') }}"></script> --}}
{{-- <script src="{{ asset('asset/js/swiper.min.js') }}"></script>
<script src="{{ asset('asset/js/scripts.js') }}"></script> --}}
{{-- <script src="{{ asset('asset/js/awesome/all.min.js') }}"></script> --}}
{{-- @endsection --}}
    </body>
    </html>