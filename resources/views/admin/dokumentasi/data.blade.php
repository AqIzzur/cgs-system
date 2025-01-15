@extends('admin.dokumentasi')
@section('content_dokumentasi')
<style>
      #preview {
    max-width: 100%;
    max-height: 200px;
    display: none;
    object-fit: cover;
    border: 1px solid #dee2e6;
    padding: 5px;
    border-radius: 5px;
}   
</style>
{{-- <link rel="stylesheet" href="{{ asset('asset/css/users/style-dokumentasi.css') }}"> --}}

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
                        <img src="{{ asset('images/dokumentasi/sampul/'. $data->image) }}" class="   card-img-top" alt="...">
                            <div class="card-body d-flex flex-column ">
                                <h5 class="card-title card-title-custom mb-2 poppins-bold">{{ $data->title }}</h5>
                                <div class="d-flex justify-content-between mt-auto">
                                    <button class="btn btn-custom-card btn-warning poppins-regular" data-bs-target="#edit{{ $data->documents_id }}" data-bs-toggle="modal"><i class="fa fa-pen"></i></button>
                                    <a href="{{ route('pdf.view', ['filename' => $data->file_path]) }}" target="_blank" class="btn btn-custom-card btn-primary 
                                        @if ($data->akses == "admin")
                                            text-success
                                        @endif"><i class="fa fa-eye"></i></a>
                                    {{-- <button class=""></button> --}}
                                    <button class="btn btn-custom-card btn-danger poppins-regular" data-bs-target="#dalete{{ $data->documents_id }}" data-bs-toggle="modal"><i class="fa fa-trash-can"></i></button>
                                    {{-- <a href="#" class="btn btn-custom-card text-decoration-none btn-danger"><i class="fa fa-trash-can"></i> Delete</a> --}}
                                </div>
                            </div>
                            </div>
            </div>

                {{-- Modal Edit --}}
                <div class="modal fade" id="edit{{ $data->documents_id }}" tabindex="1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-warning bg-opacity-50">
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('dokumentasi.data_edit', $data->documents_id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{-- <div class="form-group"> --}}
                                      <div class="row">
                                        <div class="col-lg-6">
                      
                                          <label for="title " class="poppins-bold">Judul Dokumentasi :</label>
                                          <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $data->title) }}">
                                          @error('title')
                                            <span class="text-danger font-monospace">{{ $message }}</span>
                                          @enderror
                                        </div>
                                        <div class="col-lg-6 margin-top-custom">
                                            <label for="title " class="poppins-bold">File Dokumentasi :</label>
                                            <div class="row">
                                                <div class="col-10">
                      
                                          <label for="file" class="custom-file-upload">Apload Your Documentation</label>
                                          <input type="file" name="file" id="file" class="input-field form-control image" accept="application/pdf" value="{{ old('file') }}">
                                                </div>
                                                <div class="col-2">
                                                    <a href="{{ route('pdf.view', ['filename' => $data->file_path]) }}" target="_blank" class="btn btn-outline-primary btn-edit-custom mt-auto
                                                        @if ($data->akses == "admin")
                                                            text-success
                                                        @endif"><i class="fa fa-eye"></i></a>
                                                </div>
                                            </div>
                                          
                                          
                                          @error('file')
                                            <span class="text-danger font-monospace">{{ $message }}</span>
                                          @enderror
                                        </div>
                                      </div>
                                      <div class="form-group mt-3 ">
                                        <label for="hastag" class="poppins-bold">Hastag</label>
                                        <textarea name="hastag" id="hastag" cols="30" rows="3" class="form-control">{{ old('hastag', $data->hastag) }}</textarea>
                                        @error('hastag')
                                          <span class="text-danger font-monospace">{{ $message }}</span>
                                        @enderror
                                      </div>
                                      <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <div class="col-md-12">
                                              <label for="img_sampul" class="poppins-bold">Sampul</label>
                                                <input type="file" id="fileInput" name="img_sampul" class="form-control" accept="image/*" value="{{ old('img_sampul') }}">
                                                @error('img_sampul')
                                                  <span class="text-danger font-monospace">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 text-center ">
                                                <img
                                                        src="{{ asset('images/dokumentasi/sampul/' . $data->image) }}" 
                                                        alt="Preview Foto" 
                                                        class="img-thumbnail mt-3" 
                                                        style="max-height: 200px;">
                                                {{-- <img id="preview" alt="Preview Foto" class="img-thumbnail mt-3"> --}}
                                            </div>
                                        </div>
                                        <div class="col-lg-6 margin-top-custom">
                                          <label for="akses" class="poppins-bold">Bisa Diakses :</label>
                                          <select name="akses" id="akses" class="form-control">
                                            <option value="user" {{ old('akses', $data->akses) == 'user' ? 'selected' : '' }}> Semua Pengguna </option>
                                            <option value="admin" {{ old('akses', $data->akses) == 'admin' ? 'selected' : '' }}> Hanya Admin </option>
                                          </select>
                                          @error('akses')
                                            <span class="text-danger font-monospace">{{ $message }}</span>
                                          @enderror
                                        </div>
                                      </div>
                                    {{-- </div> --}}
                                      
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-backward"></i> Back</button>

                                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Change</button>
                                    </form>
                                </div>
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
                                <form action="{{ route('dokumentasi.data_delete', $data->documents_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-custom-table" ><i class="fa fa-trash-can"></i> Delete</button>
                                </form>
                                {{-- <button class="btn btn-danger"><i class="fa fa-trash-can"></i> Delete</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Modal --}}

            @empty
                <span class="text-center fs-6">--Data Tidak Tersedia--</span>
            @endforelse
            
        </div>
    </div>


    <script>
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
            }
        });
    </script>
    
@endsection