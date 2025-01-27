@extends('component.sidebar')
@section('content_sidebar')
<link rel="stylesheet" href="{{ asset('asset/css/users/style-dokumentasi.css') }}">
<style>
  .offcanvas{
      width: 50% !important;
  }
  .active2{
    background-color: #5ea0dd;
    color: #fff;
    /* border-radius: 7px; */
  }

    /* border-radius: 7px; */

</style>

    <div class="modal fade" id="input-dokumentasi" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header active2 ">
            <h5 class="poppins-regular">
              Input Dokumentasi
            </h5>
            <button class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('dokumentasi.data_save') }}" method="post" enctype="multipart/form-data">
              @csrf
              {{-- <div class="form-group"> --}}
                <div class="row">
                  <div class="col-lg-6">

                    <label for="title " class="poppins-bold">Judul Dokumentasi :</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                    @error('title')
                      <span class="text-danger font-monospace">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-lg-6">

                    <label for="title " class="poppins-bold">File Dokumentasi :</label>

                    <label for="file" class="custom-file-upload">Apload Your Documentation</label>
                    <input type="file" name="file" id="file" class="input-field form-control image" accept="application/pdf" value="{{ old('file') }}">
                    @error('file')
                      <span class="text-danger font-monospace">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group mt-3 ">
                  <label for="hastag" class="poppins-bold">Hastag</label>
                  <textarea name="hastag" id="hastag" cols="30" rows="3" class="form-control">{{ old('hastag') }}</textarea>
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
                          <img id="preview" alt="Preview Foto" class="img-thumbnail mt-3">
                      </div>
                  </div>
                  <div class="col-lg-6">
                    <label for="akses" class="poppins-bold">Bisa Diakses :</label>
                    <select name="akses" id="akses" class="form-control">
                      <option value="user" {{ old('akses') == 'user' ? 'selected' : '' }}> Semua Pengguna </option>
                      <option value="admin" {{ old('akses') == 'admin' ? 'selected' : '' }}> Hanya Admin </option>
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
              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
            </form>
            </div>
        </div>
      </div>
    </div>

 @yield('content_dokumentasi')

<script src="{{ asset('asset/js/user/script-dokumentasi.js') }}"></script>

@endsection