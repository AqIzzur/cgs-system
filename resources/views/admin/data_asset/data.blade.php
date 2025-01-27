@extends('component.sidebar')
@section('content_sidebar')
<style>
        .file_asset {
            display: none;
        }
        
        /* Custom label for file input */
        .custom-file-upload {
            text-align: center;
            display: inline-block;
            padding: 5px 20px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            color: rgb(0, 0, 0) ;
            background:transparent;
            border: 2px solid darkcyan;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        
        /* Add hover effect */
        .custom-file-upload:hover {
            background-color: darkcyan;
            color: #fff !important;
            /* border-color: #004494; */
        }
        
        /* Add focus effect */
        .custom-file-upload:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .thumbnail {
            /* width: 150px; */
            cursor: pointer;
            transition: transform 0.3s;
        }
        .thumbnail:hover {
            transform: scale(1.07);
        }
        /* .thumbnail-custom {
            width: 159.5px !important;
            border-radius: 0px 5px 0px 0px;
        } */
        .thumbnail-custom:hover{
            transform: scale(1.0);
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgb(0, 0, 0);
            display: flex;
            justify-content: center;
            align-items: center;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s, visibility 0.3s;
        }
        .overlay img {
            max-width: 90%;
            max-height: 90%;
        }
        .overlay.show {
            visibility: visible;
            opacity: 1;
        }
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

                                <img src="{{ asset('images/asset/'. $asset->file_asset) }}" 
                                data-src="{{ asset('images/asset/'. $asset->file_asset) }}" 
                                data-asset-id="{{ $asset->asset_id }}" 
                                alt="Thumbnail{{ $asset->file_asset }}" 
                                class="img-png-custom thumbnail rounded-top">

                            </div>
                            <div class="overlay" id="overlay-{{ $asset->asset_id }}">
                                <img id="fullscreenImg-{{ $asset->asset_id }}" src="" alt="Fullscreen Image">
                            </div>
                            <div class="card-body">
                                <h6 class="text-center poppins-bold text-capitalize">{{ $asset->name_asset   }} </h6>
                            </div>
                            
                            <!-- Triangle Button -->
                            <div class="dropdown">
                                <div class="triangle-button " id="triangleButton" data-bs-toggle="dropdown" aria-expanded="false"></div>
                                <ul class="dropdown-menu " aria-labelledby="triangleButton">
                                <li><a class="dropdown-item" data-bs-target="#edit{{ $asset->asset_id }}" data-bs-toggle="modal">
                                    <i class="fa fa-pen text-warning"></i><span class=" poppins-bold"> Edit</span>
                                </a></li>
                                <li><a class="dropdown-item" href="{{ route('asset.data_download', ['filename' => $asset->file_asset]) }}" target="_blank">
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


                @else
                            <div class="col-lg-2 col-6 mt-3">
                                <div class="card bg-primary bg-opacity-50 card-asset mx-auto">
                                    <div class="img-card-custom ">
                                        <img src="{{ asset('images/asset/'. $asset->file_asset) }}" 
                                        data-src="{{ asset('images/asset/'. $asset->file_asset) }}" 
                                        data-asset-id="{{ $asset->asset_id }}" 
                                        alt="Thumbnail{{ $asset->file_asset }}" 
                                        class="thumbnail thumbnail-custom img-custom ">
                                    </div>

                                    <div class="overlay" id="overlay-{{ $asset->asset_id }}">
                                        <img id="fullscreenImg-{{ $asset->asset_id }}" src="" class="border border-3 border-light rounded">
                                    </div>
                                    <div class="card-body">
                                        <h6 class="text-center poppins-bold">{{ $asset->name_asset   }}</h6>
                                    </div>
                                    
                                    
                                <!-- Triangle Button -->
                                <div class="dropdown">
                                    <div class="triangle-button " id="triangleButton" data-bs-toggle="dropdown" aria-expanded="false"></div>
                                    <ul class="dropdown-menu " aria-labelledby="triangleButton">
                                    <li><a class="dropdown-item" data-bs-target="#edit{{ $asset->asset_id }}" data-bs-toggle="modal">
                                        <i class="fa fa-pen text-warning"></i><span class=" poppins-bold"> Edit</span>
                                    </a></li>
                                    <li><a class="dropdown-item" href="{{ route('asset.data_download', ['filename' => $asset->file_asset]) }}" target="_blank">
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
                @endif
                                        {{-- Modal Hapus --}}
                                        <div class="modal fade" id="delete{{ $asset->asset_id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger bg-opacity-50">
                                                        <h5 class="poppins-bold text-white">Delete Asset</h5>
                                                        <button class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="poppins-regular">Hapus Asset <span class="text-primary poppins-bold">{{ $asset->name_asset }}</span> ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('asset.data_delete', $asset->asset_id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash-can"></i> Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- End Modal --}}

                                    {{-- Modal Edit --}}
                                    <div class="modal fade" id="edit{{ $asset->asset_id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-warning bg-opacity-50">
                                                    <h5 class="poppins-regular">Edit Asset</h5>
                                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('asset.data_edit',$asset->asset_id ) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group my-2">
                                                            <label for="name_aset" class="poppins-regular">Nama Asset</label>
                                                            <input type="text" class="form-control" id="name_aset" name="name_aset" value="{{ old('name_aset', $asset->name_asset) }}">
                                                            @error('name_aset')
                                                              <span class="text-danger font-monospace">{{ $message }}</span>
                                                            @enderror
                                                            
                                                        </div>
                                                        <div class="form-group my-2">
                                                            <label for="kategori_aset" class="poppins-regular">Kategori Asset</label>
                                                            {{-- <div class="input-group"> --}}
                                                                <select name="kategori" id="kategori_aset" class="form-select">
                                                                    <option value="" >Pilih Kategori</option>
                                                                    @forelse ($kategori as $kategori1) 
                                                                      {{-- {{ dd($kategori) }} --}}
                                                                         <option value="{{ $kategori1->kategori_id }}" {{ old('kategori', $asset->kategori_asset) == $kategori1->kategori_id ? 'selected' : '' }}>{{ $kategori1->kategori_name }}</option>
                                                                    @empty
                                                                        <option value="">Tidak ada kategori tersedia</option>
                                                                    @endforelse
                                                                </select>
                                                                @error('kategori')
                                                                  <span class="text-danger font-monospace">{{ $message }}</span>
                                                                @enderror
                                                              
                                                            {{-- </div> --}}
                                                        </div>
                                                        <div class="form-group d-flex flex-column my-2">
                                                          <label for="" class="poppins-regular">Asset File</label>
                                                          {{-- <label for="file_asset" class="custom-file-upload " >File Asset</label> --}}
                                                          <input type="file" name="file_asset" id="file_asset" class="form-control " accept="image/*" >
                                                          @error('file_asset')
                                                            <span class="text-danger font-monospace">{{ $message }}</span>
                                                          @enderror
                                                        </div>
                                                        @php $kat = $asset->akses == 'admin' ? '2' : '1'; @endphp
                                                        <div class="form-group">
                                                            <label for="akses" class="poppins-regular">Akses Asset</label>
                                                            <select name="akses" id="akses" class="form-select">
                                                              <option value="" >Pilih Akses </option>

                                                              <option value="1"  {{ old('akses', $kat) == '1' ? 'selected' : '' }}>Semua Pengguna</option>
                                                              <option value="2"  {{ old('akses', $kat) == '2' ? 'selected' : '' }}>Hanya Admin</option>
                                                            </select>
                                                            @error('akses')
                                                              <span class="text-danger font-monospace">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                            
                                                </div>
                                                <div class="modal-footer d-flex justify-content-between">
                                                    <button class="btn btn-secondary poppins-regular" data-bs-dismiss="modal"><i class="fa fa-backward"></i> Back</button>
                                                    <button type="submit" class="btn btn-primary btn-custom-table poppins-regular" ><i class="fa fa-save"></i> Save Change</button>
                                                    
                                                  </form>
                                
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                @empty
                <div class="col-lg-12 col-12 mt-3">
                    <p class="text-center text-capitalize poppins-bold">- - there is no data in directory - -</p>
                </div>
                @endforelse
                
            {{--    --}}


        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.thumbnail').forEach(img => {
        img.addEventListener('click', function () {
            const assetId = this.getAttribute('data-asset-id');
            const fullImg = document.querySelector(`#fullscreenImg-${assetId}`);
            const overlay = document.querySelector(`#overlay-${assetId}`);
            
            fullImg.src = this.getAttribute('data-src');
            overlay.classList.add('show');
        });
    });

    document.querySelectorAll('.overlay').forEach(overlay => {
        overlay.addEventListener('click', function () {
            this.classList.remove('show');
            this.querySelector('img').src = ""; // Hapus src untuk menghindari cache
        });
    });
});




    </script>
@endsection