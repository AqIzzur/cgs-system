<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rasa:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/awesome/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/font-poppins.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/font-rasa.css') }}">
    <style>
        /* Sidebar styling */
        .sidebar {
            width: 200px;
            height: 100vh;
            background-color: #000818;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1050;
            transition: transform 0.3s ease-in-out;
        }
        .sidebar .nav-link {
            color: white;
        }
        
        .sidebar .nav-link:hover {
            background-color: #495057;
            color: rgb(155, 252, 0);
        }
        .sidebar.closed {
            transform: translateX(-100%);
        }
        .content {
            margin-left: 200px;
        }
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.open {
                transform: translateX(0);
            }
            .content {
                margin-left: 0;
            }
        }
        /* Overlay styling */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5) !important;
            z-index: 1049; /* Below sidebar */
        }
        .overlay.active {
            display: block;
        }
        .sidebar_img{
            width: 70px;
            height: 70px;
            object-fit: cover;
            overflow: hidden;
        }
        .btn-custom-dropdown:focus{
            border: none !important;
            outline: none;
        }
        .btn-custom-dropdown{
            border: none !important;
            outline: none;
            
        }
        @media (max-width:414px){
            .sidebar_img{
                margin-left: 20px
            }
            .w-fit-div{
                width: fit-content;
            }
            .sidebar .nav-link span{
                font-size: 14px;
            }
            .mx-custom-name{
                margin-left: auto;
                margin-right: auto;
            }
        }
        @media (min-width:415px){
            .sidebar_img{
                margin-left: 20px;
                /* width: 50px; */
            }
            .w-fit-div{
                width: fit-content;
            }
            .sidebar .nav-link span{
            font-size: 16px;
        }
        .dropdown-icon-user{
            font-size: 16px;
        }
        }
        .active{
            background-color: #63E6BE;
            color: black;
        }
        .sidebar .active:hover{
            background-color: #92ffde;
            color: rgb(1, 80, 11)!important;

        }
        .kedip{
            animation: blink-animation 1.5s ease-in-out infinite;
        }
        .mx-custom-name{
                margin: 20px auto;
            }
        @keyframes blink-animation {
            0%, 100% {
            opacity: 1; /* Tampilan penuh */
        }
        50% {
            opacity: 0; /* Transparansi penuh */
        }
        }


    </style>
</head>
<body>
    @php
            $img = Auth::user()->img_profile ?: 'default.jpg';
        @endphp
    
    <!-- Sidebar -->
    <!-- Sidebar -->
    <div class="sidebar d-lg-flex flex-column  ">
        <div class="mx-auto mt-4 rounded-circle border border-success border-4 w-fit-div ">
            <img src="{{ asset('images/profile/'. $img ) }}" alt="" class="m-1 border border-primary border-3 sidebar_img rounded-circle">

        </div>
        <h4 class="text-center mt-3" style="font-size: 14px">{{ Auth::user()->full_name }}</h4>
        <hr>
        {{--  --}}
        <nav class="nav flex-column">
            <a class="nav-link @if($title == 'Dashboard User')active text-dark @endif  " href="{{ route('users.view') }}">
                <div class="row">
                    <div class="col-2">
                        <i class="fa fa-home  me-3"></i>
                    </div>
                    <div class="col">
                        <span class="poppins-regular ">Home</span> 

                    </div>
                </div>
            </a>

            <a class="nav-link @if($title == 'Asset | Users')active text-dark @endif  " href="{{ route('asset.view') }}">
                <div class="row">
                    <div class="col-2">
                        <i class="fa fa-user-gear me-3"></i>

                    </div>
                    <div class="col">
                        <span class="poppins-regular">Asset</span> 

                    </div>
                </div>
            </a>
            {{-- <a class="nav-link" href="/user">
                <div class="row">
                    <div class="col-2">
                        <i class="fa fa-icons me-3"></i>

                    </div>
                    <div class="col">
                <span class="poppins-regular">Asset</span>
                        
                    </div>
                </div>
            </a> --}}
            <a class="nav-link @if($title == 'Dokumentasi | Users')active text-dark @endif  " href="{{ route('dokumentasi.view') }}">
                <div class="row">
                    <div class="col-2">
                        <i class="fa fa-folder-closed me-3"></i>

                    </div>
                    <div class="col">
                <span class="poppins-regular">Documentation</span>
                        
                    </div>
                </div>
            </a>
            <a class="nav-link" href="#">
                <div class="row">
                    <div class="col-2">
                        <i class="fa fa-gear me-3"></i>

                    </div>
                    <div class="col">
                <span class="poppins-regular">Setting</span>
                        
                    </div>
                </div>
            </a>
        </nav>
    </div>

    <!-- Overlay -->
    <div id="overlay" class="overlay"></div>

    <!-- Content -->
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-info bg-opacity-50">
            <div class="container-fluid">
                <button id="toggleSidebar" class="btn btn-transparent text-dark d-lg-none">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <span class="navbar-brand mb-0 h1 text-uppercase poppins-bold ">CGS System</span>
                <div class="dropdown">
                    <a class="btn btn-custom-dropdown  btn-transparent outline-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-user "></i>
                    </a>
                  
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item dropdown-icon-user" href="#">Action</a></li>
                      <li><a class="dropdown-item dropdown-icon-user" href="#">Another action</a></li>
                      <li><a class="dropdown-item dropdown-icon-user text-danger " href="{{ route('user.logout') }}"><i class="fa fa-sign-out"></i> Log Out</a></li>
                    </ul>
                  </div>
            </div>
        </nav>
        <div class="container mt-4">
            @yield('content_sidebar')
        </div>
    </div>

    {{-- @yield('content_user') --}}
    <script>
        const toggleSidebarButton = document.getElementById('toggleSidebar');
        const sidebar = document.querySelector('.sidebar');
        const overlay = document.getElementById('overlay');

        // Open sidebar
        toggleSidebarButton.addEventListener('click', () => {
            sidebar.classList.add('open');
            overlay.classList.add('active');
        });

        // Close sidebar by clicking on overlay
        overlay.addEventListener('click', () => {
            sidebar.classList.remove('open');
            overlay.classList.remove('active');
        });
    </script>
@if (session('info'))
<div class="modal fade alert-modal" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info bg-opacity-50">
                <h5 class="modal-title " id="infoModalLabel">Berhasil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-3">
                        <i class="ms-3 fa-solid fa-circle-check fa-4x" style="color: #63E6BE;"></i>
                    </div>
                    <div class="col ">
                        <p class="text-capitalize my-auto fs-5 fw-bold mt-2">{{ session('info') }}</p>

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
                        <p class="text-capitalize my-auto fs-5 fw-bold mt-2">{{ session('success') }}</p>

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
                        <p class="text-capitalize my-auto fs-5 fw-bold mt-2">{{ session('error') }}</p>

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
                        <p class="text-capitalize my-auto fs-6 fw-bold mt-2">Pendaftaran gagal: </p> 
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
                        <h3 class="text-capitalize my-auto  fw-bold mt-2">Login gagal: </h3> 
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
        @if (session('info'))
            var successModal = new bootstrap.Modal(document.getElementById('infoModal'));
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
<script src="{{ asset('asset/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('asset/js/awesome/all.min.js') }}"></script>
</body>
</html>