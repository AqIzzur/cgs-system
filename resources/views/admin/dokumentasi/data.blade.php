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
                        <img src="{{ asset('images/dokumentasi/sampul/'. $data->image) }}" class=" m-1  img-card-doku" alt="...">
                            <div class="card-body d-flex flex-column ">
                                <h5 class="card-title card-title-custom mb-2 poppins-bold">{{ $data->title }}</h5>
                                <div class="d-flex justify-content-between mt-auto">
                                    <button class="btn btn-custom-card btn-warning poppins-regular" data-bs-target="#edit{{ $data->documents_id }}" data-bs-toggle="modal"><i class="fa fa-pen"></i></button>
                                    <button class="btn btn-custom-card btn-primary poppins-regular"><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-custom-card btn-danger poppins-regular" data-bs-target="#dalete{{ $data->documents_id }}" data-bs-toggle="modal"><i class="fa fa-trash-can"></i></button>
                                    {{-- <a href="#" class="btn btn-custom-card text-decoration-none btn-danger"><i class="fa fa-trash-can"></i> Delete</a> --}}
                                </div>
                            </div>
                            </div>
            </div>

                {{-- Modal Edit --}}
                <div class="modal fade" id="edit{{ $data->documents_id }}" tabindex="1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-warning bg-opacity-50">
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" ></form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Modal --}}
                {{-- Modal Hapus --}}
                <div class="modal fade" id="dalete{{ $data->documents_id }}" tabindex="1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger bg-opacity-50">
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p class="poppins-bold fs-5">What You sure delete data?</p>
                                <p class="poppins-regular">Judul : <span class=" text-primary">{{ $data->title }}</span></p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-backward"></i> Back</button>
                                <button class="btn btn-danger"><i class="fa fa-trash-can"></i> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Modal --}}

            @empty
            <div class="col-lg-12 col-md-12 my-3 ">
                <span class="text-center fs-6">--Data Tidak Tersedia--</span>
            </div>
            @endforelse
            
        </div>
    </div>
@endsection