@extends('component.users_sidebar')
@section('content_sidebar')
{{-- <link rel="stylesheet" href="{{ asset('asset/css/users/style-dokumentasi.css') }}">
 --}}
<link rel="stylesheet" href="{{ asset('asset/css/font-rasa.css') }}">
<style>
  .garis-asset1{
    border:2px solid black;
    margin-top: -15px;
    margin-bottom: 20px;
       
}


  @media screen and (min-width:414px) {
    .garis-asset1{
        width:25%; 
    }
    .mobile-view{
      display: none;
    }
  }
  @media screen and (max-width:414px) {
    .garis-asset1{
        width:60%; 
    }
    .desktop-view{
      display: none;
    }
    .mobile-view{
      display: block;
    }
  }
</style>
{{-- <link rel="stylesheet" href="{{ asset('asset/css/users/style-asset.css') }}"> --}}
  <div class="container">
    <h3 class="rasa-bold  text-center text-uppercase mt-2 judul-asset">Dokumentasi CGS</h3>
    <hr class="mx-auto garis-asset1" >
    <div class="row mt-2">
      @if (Auth::user()->akses_spesial == 'yes')
        <div class="desktop-view col-12 ">
          <div class="row">

            <div class="col">
              <button class="btn btn-primary " data-bs-target="#input_dokumentasi" data-bs-toggle="modal"><i class="fa fa-plus"></i></button>
            </div>
            <div class="col-lg col-10">
              <form action="" method="post">
                <input type="text" name="" id="" placeholder="Search Here...." class="form-control border border-dark">
            </form>
            </div>
          </div>
        </div>


        <div class="col-12 mobile-view">
          <div class="row d-flex flex-column">
            {{-- <div class=""> --}}
              <form action="" method="post">
              <div class="col input-group">
                  <button type="button" data-bs-target="#input_dokumentasi" data-bs-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                  <input type="text" name="" id="" placeholder="Search Here...." class="form-control border border-dark">
                </div>
              </form>
            {{-- </div> --}}
          </div>
        </div>


          <div class="modal fade" id="input_dokumentasi" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-primary bg-opacity-50">
                  <h5 class="poppins-bold ">Input Dokumentasi</h5>
                  <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  
                </div>
                <div class="modal-footer d-flex justify-content-between">
                  <button class="btn btn-secondary poppins-regular" data-bs-dismiss="modal"><i class="fa fa-backward"></i> Back</button>
                  <button type="submit" class="btn btn-primary btn-custom-table poppins-regular" ><i class="fa fa-save"></i> Save</button>
                  
                </form>

                </div>
              </div>
            </div>
          </div>
          @else

          <div class="col">
  
          </div>
          <div class="col-lg col-12">
            <form action="" method="post">
              <input type="text" name="" id="" placeholder="Search Here...." class="form-control border border-dark">
          </form>
          </div>
      @endif
      
    </div>
  </div>

@endsection