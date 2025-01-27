@extends('component.users_sidebar')
@section('content_sidebar')
{{-- @extends('component.sidebar') --}}
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
    .active1{
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
                <a href="{{ route('asset_user.view', $kat->kategori_id) }}" class="text-decoration-none text-dark">
                <div class="card bg-success bg-opacity-50 card-asset mx-auto ">
                    <div class="svg_style mx-auto mt-3">
                        {!! $kat->icon_path !!}
                    </div>
                    <div class="card-body">
                        <p class="card-text text-center poppins-bold fs-5 text-uppercase">{{ $kat->kategori_name }}</p>

                        
                    </div>
                </a>    
{{-- 
                    <!-- Triangle Button -->
                    <div class="dropdown">
                        <div class="text-center"   data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fas fa-caret-down fa-2x "></i>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="triangleButton">
                        <li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#edit{{ $kat->kategori_id }}">
                            <i class="fa fa-pen text-warning"></i><span class=" poppins-bold"> Edit</span>
                        </a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete{{ $kat->kategori_id }}">
                            <i class="fa fa-trash-can text-danger"></i><span class=" poppins-bold"> Hapus</span>    
                        </a></li>
                        {{-- <li><a class="dropdown-item" href="#">Menu 3</a></li> 
                        </ul>
                    </div> c--}}
                </div>
            </div>

            {{-- Modal Edit --}}
            <div class="modal fade" id="edit{{ $kat->kategori_id }}" aria-hidden="true" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-warning bg-opacity-50">
                    <h5 class="poppins-regular text-dark">Edit <span class="fw-bold">{{ $kat->kategori_name }}</span></h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                      <form action="{{ route('asset.edit', $kat->kategori_id) }}" method="post">
                        @csrf
                        <div class="form-group my-3">
                          <label for="name_edit">Nama Kategori</label>
                          <input type="text" name="name_kategori" id="name_edit" class="form-control" value="{{ $kat->kategori_name }}">
                        </div>
                        <div class="form-group my-3">
                          <label for="svg_script">SVG Script</label>
                          <input type="text" id="svg_script" name="svg_script" class="form-control" value="{{ $kat->icon_path }}">
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
            {{-- End Modal Edit --}}

            <div class="modal fade" id="delete{{ $kat->kategori_id }}" aria-hidden="true" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-danger bg-opacity-50">
                    <h5 class="poppins-regular text-dark">Delete <span class="fw-bold">{{ $kat->kategori_name }}</span> </h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                      <p class="poppins-regular text-capitalize">apakah anda ingin menghapus kategori ini ?</p>
                  </div>
                  <div class="modal-footer d-flex justify-content-between">
                    {{-- <div class=""> --}}
                      <button class="btn btn-secondary poppins-regular" data-bs-dismiss="modal"><i class="fa fa-backward"></i> Back</button>
                      <form action="{{ route('asset.delete', $kat->kategori_id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-custom-table poppins-regular" ><i class="fa fa-trash-can"></i> Delete</button>
                      </form>
                      {{-- <button class="btn btn-danger" type="submit"><i class="fa fa-trash-can"></i> Hapus</button> --}}
                    {{-- </div> --}}
                  </div>
                </div>
              </div>
            </div>
                        {{-- Modal Delete --}}
                      {{-- @if (session('DeleteAllKategori'))
                        <div class="modal fade" id="DeleteAll" aria-hidden="true" tabindex="-1">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header bg-danger bg-opacity-50">
                                <h5 class="poppins-regular text-dark">Delete <span class="fw-bold">{{ $kat->kategori_name }}</span> </h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                              </div>
                              <div class="modal-body">
                                  <p class="poppins-regular text-capitalize">apakah anda ingin menghapus Semua asset dari kategori ini ?</p>
                              </div>
                              <div class="modal-footer d-flex justify-content-between">
                                  <button class="btn btn-secondary poppins-regular" data-bs-dismiss="modal"><i class="fa fa-backward"></i> Back</button>
                                  <form action="{{ route('asset.deleteall', session('DeleteAllKategori')) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger btn-custom-table poppins-regular" ><i class="fa fa-trash-can"></i> Delete</button>
                                  </form>

                              </div>
                            </div>
                          </div>
                        </div>
                      @endif  --}}
                        {{-- End Modal Delete --}}

            @empty
                <div class="col-12">
                    <p class="text-dark">Data Tidak Tersedia</p>
                </div>
            @endforelse

             
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script>
          document.addEventListener('DOMContentLoaded', function () {
            @if (session('DeleteAllKategori'))
                var errorModal = new bootstrap.Modal(document.getElementById('DeleteAll'));
                errorModal.show();
            @endif
          });
    </script>
@endsection