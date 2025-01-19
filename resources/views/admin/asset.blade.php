@extends('component.sidebar')
@section('content_sidebar')
<link rel="stylesheet" href="{{ asset('asset/css/font-rasa.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/users/style-asset.css') }}">
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

    .triangle-button.rotate {
      transform: rotate(180deg);
    }

    .dropdown {
      position: relative; /* Menjadikan parent dropdown sebagai posisi referensi */
    }

    .dropdown-menu {
      position: absolute !important; /* Menimpa posisi default Bootstrap */
      top: calc(100%); /* Posisi dropdown tepat di bawah segitiga */
      /* left: -50%; Menu diposisikan di tengah secara horizontal */
      /* transform: translateX(-500%); Menyelaraskan dengan posisi tengah */
      margin-left: -40% !important;
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
</style>
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
                <a href="{{ route('asset.data', $kat->kategori_id)  }}" class="text-decoration-none text-dark">
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
                        <div class="triangle-button " id="triangleButton{{ $kat->kategori_id }}" data-bs-toggle="dropdown" aria-expanded="false"></div>
                        <ul class="dropdown-menu" aria-labelledby="triangleButton{{ $kat->kategori_id }}">
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
@endsection