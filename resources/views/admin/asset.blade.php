@extends('component.sidebar')
@section('content_sidebar')
<link rel="stylesheet" href="{{ asset('asset/css/font-rasa.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/users/style-asset.css') }}">
    <div class="container">
        <h3 class="rasa-bold  text-center text-uppercase mt-2 judul-asset">Asset CGS</h3>
        <hr class="mx-auto garis-asset1" >
        <div class="row mt-2">
            <div class="col-4 col-lg-6">
                <button class="btn btn-primary" data-bs-target="#input_kategori" data-bs-toggle="modal"><i class="fa fa-plus"></i> Input </button>

                {{-- Modal Input  --}}
                <div class="modal fade" id="input_kategori" aria-hidden="true" tabindex="1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary bg-opacity-50">
                                <h5 class="">Input Kategori</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('asset.kategori_save') }}" method="POST">
                                    @csrf
                                    <div class="form-group my-2">
                                        <label for="name_kategori">Nama Kategori</label>
                                        <input type="text" id="name_kategori" name="name_kategori" class="form-control">
                                        @error('name_kategori')
                                            <span class="text-danger font-monospace">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group my-2">
                                        <label for="svg_script">SVG Script</label>
                                        <input type="text" id="svg_script" name="svg_script" class="form-control">
                                        @error('svg_script')
                                            <span class="text-danger font-monospace">{{ $message }}</span>
                                        @enderror
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-backward"></i> Back</button>

                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save </button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col">
                <form action="" method="post">
                    <input type="text" name="" id="" placeholder="Search Here...." class="form-control border border-dark">
                </form>
            </div>
        </div>

        <div class="row mt-3">
            @forelse ($kategori as $kat)
            <div class="col-md-2 col-6 my-2">
                <div class="card bg-success bg-opacity-50 card-asset mx-auto ">
                    <div class="svg_style mx-auto mt-3">
                        {!! $kat->icon_path !!}
                    </div>
                    <div class="card-body">
                        <p class="card-text text-center poppins-bold fs-5 text-uppercase">{{ $kat->kategori_name }}</p>

                        
                    </div>
                </div>
            </div>    
            @empty
                
            @endforelse
            
             
        </div>
    </div>
@endsection