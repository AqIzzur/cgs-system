@extends('admin.dokumentasi')
@section('content_dokumentasi')
    <div class="container">
        {{-- <div class=""> --}}
            <div class="button btn btn-primary ms-auto me-4 my-3" data-bs-target="#input-dokumentasi" data-bs-toggle="modal"><i class="fa fa-plus"></i> Input </div>
        {{-- </div> --}}

        <div class="row mt-3">
            <div class="col-lg-9 col-sm-12">
                <h3 class="poppins-bold  text-md-start text-center">Dokumentasi CGS</h3>
                <hr class=" garis_dokumentasi">
            </div>
            <div class="col-lg-3 col-sm-12">
                
                <form action="" method="post">
                    <input type="text" name="" id="" placeholder="Search Here...." class="form-control border border-dark">
                </form>
            </div>
        </div>

        <div class="row mt-3">
            @forelse ( $data_file as $data)
                
            <div class="col-lg-3 col-md-4 my-3 ">
                    <div class="card mx-auto bg-primary bg-opacity-50 card-custom">
                        <img src="{{ asset('images/dokumentasi/sampul/'. $data->image) }}" class="card-img-top img-card-doku" alt="...">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title card-title-custom ">{{ $data->title }}</h5>
                                <div class="d-flex justify-content-between mt-auto">
                                    <button class="btn btn-custom-card btn-warning poppins-regular"><i class="fa fa-pen"></i></button>
                                    <button class="btn btn-custom-card btn-primary poppins-regular"><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-custom-card btn-danger poppins-regular"><i class="fa fa-trash-can"></i></button>
                                    {{-- <a href="#" class="btn btn-custom-card text-decoration-none btn-danger"><i class="fa fa-trash-can"></i> Delete</a> --}}
                                </div>
                            </div>
                            </div>
            </div>
            @empty
            <div class="col-lg-12 col-md-12 my-3 ">
                <span class="text-center fs-6">--Data Tidak Tersedia--</span>
            </div>
            @endforelse
            <div class="col-lg-3 col-md-4 my-3 ">
                <div class="card mx-auto bg-primary bg-opacity-50 card-custom ">
                    <img src="{{ asset('images/Logo_CGS.png') }}" class="card-img-top img-card-doku" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title card-title-custom ">Percobaan</h5>
                            <div class="d-flex justify-content-between mt-auto">
                                <button class="btn btn-custom-card btn-warning poppins-regular"><i class="fa fa-pen"></i></button>
                                <button class="btn btn-custom-card btn-primary poppins-regular"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-custom-card btn-danger poppins-regular"><i class="fa fa-trash-can"></i></button>
                                {{-- <a href="#" class="btn btn-custom-card text-decoration-none btn-danger"><i class="fa fa-trash-can"></i> Delete</a> --}}
                            </div>
                        </div>
                        </div>
        </div>
        </div>
    </div>
@endsection