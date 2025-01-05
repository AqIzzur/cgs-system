@extends('component.sidebar')
@section('content_sidebar')
<style>
  .offcanvas{
      width: 50% !important;
  }
  .active1{
    background-color: #5ea0dd;
    color: #fff;
    border-radius: 7px;
  }
  .active1:hover{
    background-color: #66b3fa;
    color: rgb(255, 225, 225);
  }

</style>
<nav class="navbar  navbar-expand-lg ">
    <div class="container-fluid">
      {{-- <a class="navbar-brand" href="#">Offcanvas navbar</a> --}}
      <button class="navbar-toggler ms-auto btn btn-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <i class="fa-solid fa-bars"></i>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">CGS SYSTEM</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1  ">
            <li class="nav-item ">
              <a class="nav-link text-custom-sidebar
              @if($menu == 'input')active1 @endif
               p-2" aria-current="page" href="{{ route('dokumentasi.input') }}">
                <div class="row">
                  <div class="col-2">
                    <i class="fa-solid fa-square-plus"></i>
                  </div>
                  <div class="col poppins-regular ">
                    Input Data
                    {{-- active1 --}}
                  </div>
                </div>
                </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link text-custom-sidebar
              @if($menu == 'data')active1 @endif
               p-2" aria-current="page" href="{{ route('dokumentasi.data') }}">
                <div class="row">
                  <div class="col-2">
                    {{-- <i class="fa fa-folder-closed "></i> --}}
                    <i class="fa fa-folder-open "></i>
                  </div>
                  <div class="col poppins-regular ">
                    Documentation
                    {{-- active1 --}}
                  </div>
                </div>
                </a>
            </li>
        
          </ul>
        
        </div>
      </div>
    </div>
  </nav>  
 @yield('content_dokumentasi')
@endsection