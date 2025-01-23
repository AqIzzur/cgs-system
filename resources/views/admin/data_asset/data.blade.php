@extends('component.sidebar')
@section('content_sidebar')
<style>
    .triangle-button {
      width: 0;
      height: 0;
      border-left: 10px solid transparent;
      border-right: 10px solid transparent;
      border-top: 10px solid #333;
      margin:auto ;
        
      cursor: pointer;
      transition: transform 0.3s ease;
    }

    .triangle-button.rotate {
      transform: rotate(180deg);
    }


    .dropdown-item {
      font-weight: 500;
      transition: all 0.2s ease-in-out;
    }

    .dropdown-item:hover {
      background-color: #007bff;
      color: white;
    }
</style>
<link rel="stylesheet" href="{{ asset('asset/css/font-rasa.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/users/style-asset.css') }}">
    <div class="container">
        <h3 class="rasa-bold  text-center text-uppercase mt-2 judul-asset">Data Asset CGS</h3>
        <hr class="mx-auto garis-asset1" >
        <div class="row">
            <div class="col-4 col-lg-6">
                <a href="{{ route('admin.asset') }}" class="btn btn-secondary"><i class="fas fa-backward"></i></a>
            </div>
            <div class="col">
                <form action="" method="post">
                    <input type="text" name="" id="" placeholder="Search Here...." class="form-control border border-dark">
                </form>
            </div>
        </div>
        

        <div class="row mt-3">
            
            @forelse ($view_asset as $asset)
                @if($asset->type_file == 'png')
                    <div class="col-lg-2 col-6 mt-3">
                        <div class="card bg-primary bg-opacity-50 card-asset mx-auto ">
                            <div class="png-custom">

                                <img src="{{ asset('images/asset/'. $asset->file_asset) }}" alt="" class="img-png-custom">
                            </div>
                            <div class="card-body">
                                <h6 class="text-center poppins-bold text-capitalize">{{ $asset->name_asset   }} </h6>
                            </div>
                            
                            <!-- Triangle Button -->
                            <div class="dropdown">
                                <div class="triangle-button " id="triangleButton" data-bs-toggle="dropdown" aria-expanded="false"></div>
                                <ul class="dropdown-menu " aria-labelledby="triangleButton">
                                <li><a class="dropdown-item" >
                                    <i class="fa fa-pen text-warning"></i><span class=" poppins-bold"> Edit</span>
                                </a></li>
                                <li><a class="dropdown-item" >
                                    <i class="fa fa-download text-secondary"></i><span class=" poppins-bold"> Download</span>
                                </a></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete{{ $asset->asset_id }}">
                                    <i class="fa fa-trash-can text-danger"></i><span class=" poppins-bold"> Hapus</span>    
                                </a></li>
                                {{-- <li><a class="dropdown-item" href="#">Menu 3</a></li> --}}
                                </ul>
                            </div>
                        </div>
                        </div>

                        {{-- Modal Hapus --}}
                            <div class="modal fade" id="delete{{ $asset->asset_id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger bg-opacity-50">
                                            <h5 class="poppins-bold text-white">Delete Asset</h5>
                                            <button class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="poppins-regular">Hapus Asset <span class="text-warning poppins-bold">{{ $asset->name_asset }}</span> ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="" method="post">
                                                {{-- @method() --}}
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-can"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{-- End Modal --}}
                @else
                            <div class="col-lg-2 col-6 mt-3">
                                <div class="card bg-primary bg-opacity-50 card-asset mx-auto">
                                    <img src="{{ asset('images/asset/'. $asset->file_asset) }}" alt="" class="">
                                    <div class="card-body">
                                        <h6 class="text-center poppins-bold">{{ $asset->name_asset   }}</h6>
                                    </div>
                                    
                                    
                                <!-- Triangle Button -->
                                <div class="dropdown">
                                    <div class="triangle-button " id="triangleButton" data-bs-toggle="dropdown" aria-expanded="false"></div>
                                    <ul class="dropdown-menu " aria-labelledby="triangleButton">
                                    <li><a class="dropdown-item" >
                                        <i class="fa fa-pen text-warning"></i><span class=" poppins-bold"> Edit</span>
                                    </a></li>
                                    <li><a class="dropdown-item" >
                                        <i class="fa fa-download text-secondary"></i><span class=" poppins-bold"> Download</span>
                                    </a></li>
                                    <li><a class="dropdown-item" href="#">
                                        <i class="fa fa-trash-can text-danger"></i><span class=" poppins-bold"> Hapus</span>    
                                    </a></li>
                                    {{-- <li><a class="dropdown-item" href="#">Menu 3</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                            </div>
                @endif
                @empty
                <div class="col-lg-12 col-12 mt-3">
                    <p class="text-center text-capitalize poppins-bold">- - there is no data in directory - -</p>
                </div>
                @endforelse
                
            {{--  --}}


        </div>
    </div>
@endsection