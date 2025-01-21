@extends('component.sidebar')
@section('content_sidebar')
<link rel="stylesheet" href="{{ asset('asset/css/font-rasa.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/users/style-asset.css') }}">
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script> --}}
<style>
    .triangle-button {
      width: 0;
      height: 0;

      border-left: 10px solid transparent;
      border-right: 10px solid transparent;
      border-top: 10px solid #333;
      margin: 10px auto ;
      
      cursor: pointer;
      transition: transform 0.3s ease;
    }

    .dropdown {
      position: relative; /* Menjadikan parent dropdown sebagai posisi referensi */
    }

    .dropdown-menu {
      position: absolute !important; /* Menimpa posisi default Bootstrap */
      /* top: calc(100%); Posisi dropdown tepat di bawah segitiga */
      /* left: -50%; Menu diposisikan di tengah secara horizontal */
      /* transform: translateX(-500%); Menyelaraskan dengan posisi tengah */
      /* margin-left: -40% !important; */
      border-radius: 10px;
      overflow: hidden;
      border: none;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      /* text-align: center; */
      min-width: 150px;
      padding: 5px 0; /* Memberi ruang di dalam menu */
    }

    .dropdown-item {
      font-weight: 500;
      transition: all 0.2s ease-in-out;
    }

    .dropdown-item:hover {
      background-color: #007bff;
      color: white;
    }
    .active{
      background-color: transparent;
    }
    .tab-size{
      font-size: 15px;
    }
    input[type="file"]#file_asset {
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
</style>
    <div class="container">
      {{-- @dump($kategori) --}}
        <h3 class="rasa-bold  text-center text-uppercase mt-2 judul-asset">Asset CGS</h3>
        <hr class="mx-auto garis-asset1" >
        <div class="row mt-2">
          
            <div class="col-4 col-lg-6">

                {{-- Modal Input  --}}
                <div class="modal fade" id="input"
                {{-- aria-labelledby="InputAsset" --}}tabindex="-1" aria-hidden="true" >
                <div class="modal-dialog 
                {{-- modal-dialog-centered --}}
                ">
                  <div class="modal-content">
                    <div class="modal-header bg-primary bg-opacity-50">
                      <h1 class="modal-title fs-5" id="InputAsset">
                        Input 
                      </h1>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <ul class="nav nav-tabs" id="modalTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active poppins-regular tab-size" id="inputDataTab" data-bs-toggle="tab" data-bs-target="#inputData" type="button" role="tab" aria-controls="inputData" aria-selected="true">
                                Input Asset
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link poppins-regular tab-size" id="inputKategoriTab" data-bs-toggle="tab" data-bs-target="#inputKategori" type="button" role="tab" aria-controls="inputKategori" aria-selected="false">
                                Input Kategori
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="modalTabContent">
                      <div class="tab-pane fade show active" id="inputData" role="tabpanel" aria-labelledby="inputDataTab">
                        {{-- <form id="dataBarangForm">  --}}
                          <form action="{{ route('asset.save') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group my-2">
                                <label for="name_aset" class="poppins-regular">Nama Asset</label>
                                <input type="text" class="form-control" id="name_aset" name="name_aset">
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
                                             <option value="{{ $kategori1->kategori_id }}">{{ $kategori1->kategori_name }}</option>
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
                              <label for="file_asset" class="custom-file-upload " >File Asset</label>
                              <input type="file" name="file_asset" id="file_asset" class="form-control" accept="image/*">
                              @error('file_asset')
                                <span class="text-danger font-monospace">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="akses" class="poppins-regular">Akses Asset</label>
                                <select name="akses" id="akses" class="form-select">
                                  <option value="" >Pilih Akses </option>
                                  <option value="1">Semua Pengguna</option>
                                  <option value="2">Hanya Admin</option>
                                </select>
                                @error('akses')
                                  <span class="text-danger font-monospace">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-3 d-grid gap-2 d-flex justify-content-end">
                              <button type="button" data-bs-dismiss="modal" class="btn btn-secondary "><i class="fa fa-backward"></i> Back</button>
                              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Asset</button>
                            </div>
                          </form>
                        {{-- </form> --}}
                        
                      </div>
                      <div class="tab-pane fade" id="inputKategori" role="tabpanel" aria-labelledby="inputKategoriTab">
                        {{-- <form id="kategoriForm"> --}}
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

                            <div class="mt-3 d-grid gap-2 d-flex justify-content-end">
                              <button type="button" data-bs-dismiss="modal" class="btn btn-secondary "><i class="fa fa-backward"></i> Back</button>
                              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Kategori</button>
                            </div>
                          </form>
                        {{-- </form> --}}
                    </div>
                  </div>
                      
                    </div>
                    <div class="modal-footer">
                      
                    </div>
                  </div>
                </div>
              </div>
          

              <button class="btn btn-primary" data-bs-target="#input" data-bs-toggle="modal"><i class="fa fa-plus"></i> Input </button>

                {{-- <div class="modal fade" id="input_kategori" aria-hidden="true" tabindex="1" aria-hidden="true">
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
                </div> --}}


            </div>
            {{-- <div class="col">
                <form action="" method="post">
                    <input type="text" name="" id="" placeholder="Search Here...." class="form-control border border-dark">
                </form>
            </div> --}}
        </div>

        <div class="row mt-3">
            @forelse ($kategori as $kat)
            {{-- {{ dd($kat) }} --}}
            <div class="col-md-2 col-6 my-2">
                <a href="{{ route('asset.data', $kat->kategori_id) }}" class="text-decoration-none text-dark">
                <div class="card bg-success bg-opacity-50 card-asset mx-auto ">
                    <div class="svg_style mx-auto mt-3">
                        {!! $kat->icon_path !!}
                    </div>
                    <div class="card-body">
                        <p class="card-text text-center poppins-bold fs-5 text-uppercase">{{ $kat->kategori_name }}</p>

                        
                    </div>
                </a>    

                    <!-- Triangle Button -->
                    <div class="dropdown">
                        <div class="text-center"   data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fas fa-caret-down fa-2x "></i>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="triangleButton">
                        <li><a class="dropdown-item" >
                            <i class="fa fa-pen text-warning"></i><span class=" poppins-bold"> Edit</span>
                        </a></li>
                        <li><a class="dropdown-item" href="#">
                            <i class="fa fa-trash-can text-danger"></i><span class=" poppins-bold"> Hapus</span>    
                        </a></li>
                        {{-- <li><a class="dropdown-item" href="#">Menu 3</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
    {{-- <script>
        // Select the triangle button
        const triangleButton = document.getElementById('triangleButton{{ $kat->kategori_id }}');
    
        // Add event listener for the dropdown toggle
        triangleButton.addEventListener('click', () => {
          const isExpanded = triangleButton.getAttribute('aria-expanded') === 'true';
          triangleButton.classList.toggle('rotate', !isExpanded);
        });
      </script> --}}
            @empty
                <div class="col-12">
                    <p class="text-dark">Data Tidak Tersedia</p>
                </div>
            @endforelse
            
             
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>

@endsection