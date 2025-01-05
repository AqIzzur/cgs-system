@extends('admin.users')
@section('content')
<link rel="stylesheet" href="{{ asset('asset/css/users/style-table.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/users/style-modal.css') }}">
<div class="container">
    <div class="row my-3">
        <div class="col-lg-3 text-lg-end">
            <h2 class="poppins-bold ">Data Absensi</h2>

        </div>
        <div class="col d-flex justify-content-end">
            <button class="btn btn-info btn-custom-table poppins-regular me-2 text-light" data-bs-toggle="modal" data-bs-target="#input-izin"><i class="fa-solid fa-clipboard-list " ></i> Input Izin</button>
            <button class="btn btn-primary btn-custom-table poppins-regular" data-bs-toggle="modal" data-bs-target="#filter-data"><i class="fa-solid fa-filter"></i> Filter</button>
        </div>
    </div>

    {{-- Modal Input Izin --}}
        <div class="modal fade" id="input-izin" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="poppins-bold text-light">Input Izin</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('users.absensi_save') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="nama_user" class="poppins-bold mb-2">Nama User :</label>
                                <select class="form-select poppins-regular" id="nama_user" name="nama_user">
                                    {{-- <option selected value="">Pilih Nama User</option> --}}
                                    @foreach ($user as $users)
                                    <option value="{{ $users->user_id }}" {{ old('nama_user') == $users->user_id ? 'selected' : '' }} >{{ $users->full_name }}</option>
                                    @endforeach
                                  </select>
                                  @error('nama_user')
                                  <span class="text-danger">{{ $message }}</span>
                                  @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="dari_tanggal" class="poppins-bold mb-2"> Tanggal Izin :</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="date" id="sampai_tanggal" name="dari_tanggal" class="form-control" value="{{ old('dari_tanggal') }}">
                                        @error('sampai_tanggal')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="date" id="sampai_tanggal" name="sampai_tanggal" class="form-control" value="{{ old('sampai_tanggal') }}">
                                        @error('sampai_tanggal')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="keterangan" class="poppins-bold mb-2">Keterangan :</label>
                                <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control"> {{ old('keterangan') }} </textarea>
                                @error('keterangan')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="img_ket" class="custom-file-upload text-dark d-block"><i class="fas fa-file-upload"></i> Upload Bukti Izin</label>
                                <input type="file" name="img_ket" id="img_ket" class="input-field">
                                @error('img_ket')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary btn-custom-table" data-bs-dismiss="modal"><i class="fa fa-backward"></i> Back</button>
                        <button type="submit" class="btn btn-primary btn-custom-table"><i class="fa fa-save"></i> Save</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    {{-- End Modal --}}

    {{-- Modal FIlter --}}
    <div class="modal fade" id="filter-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            {{-- <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
              
            </div> --}}
            <div class="modal-body">
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <form action="{{ route('users.absensi') }}" method="POST">
                    @csrf
                    <div class="row poppins-regular">
                        <div class="col">
                            <h5 class="mb-3 filter-judul">Filter Bulan :</h5>
                            <hr class="w-50">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="month[]" value="1" class="form-check-input" id="januari">
                                        <label for="januari" class="form-check-label bulan"> Januari</label>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="month[]" value="2" class="form-check-input" id="Februari">
                                        <label for="Februari" class="form-check-label bulan"> Februari</label>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="month[]" value="3" class="form-check-input" id="Maret">
                                        <label for="Maret" class="form-check-label bulan"> Maret</label>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="month[]" value="4" class="form-check-input" id="April">
                                        <label for="April" class="form-check-label bulan"> April</label>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="month[]" value="5" class="form-check-input" id="Mei">
                                        <label for="Mei" class="form-check-label bulan"> Mei</label>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="month[]" value="6" class="form-check-input" id="Juni">
                                        <label for="Juni" class="form-check-label bulan"> Juni</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="month[]" value="7" class="form-check-input" id="Juli">
                                        <label for="Juli" class="form-check-label bulan"> Juli</label>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="month[]" value="8" class="form-check-input" id="Agustus">
                                        <label for="Agustus" class="form-check-label bulan"> Agustus</label>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="month[]" value="9" class="form-check-input" id="September">
                                        <label for="September" class="form-check-label bulan"> September</label>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="month[]" value="10" class="form-check-input" id="Oktober">
                                        <label for="Oktober" class="form-check-label bulan"> Oktober</label>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="month[]" value="11" class="form-check-input" id="November">
                                        <label for="November" class="form-check-label bulan"> November</label>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="month[]" value="12" class="form-check-input" id="Desember">
                                        <label for="Desember" class="form-check-label bulan"> Desember</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <h5 class="mb-3 filter-judul">Filter Status :</h5>
                            <hr class="w-50">
                            <div class="mb-3 form-check">
                                <input type="radio" name="status" value="hadir" class="form-check-input" id="Hadir">
                                <label for="Hadir" class="form-check-label bulan"> Hadir</label>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="radio" name="status" value="izin" class="form-check-input" id="Izin">
                                <label for="Izin" class="form-check-label bulan"> Izin</label>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="radio" name="status" value="" class="form-check-input" id="Semua" checked>
                                <label for="Semua" class="form-check-label bulan"> Semua</label>
                            </div>
                        
                        </div>
                    </div>
                    
                
                    {{-- <button type="submit">Filter</button> --}}
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-custom-table" data-bs-dismiss="modal"><i class="fa fa-backward"></i> Back</button>
              <button type="submit" class="btn btn-primary btn-custom-table"><i class="fa fa-save"></i> Save changes</button>
            </form>

            </div>
          </div>
        </div>
      </div>
      {{-- End --}}
      
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="table-responsive">
            <table class="table table-hover table-custom">
              <thead>
                <tr>
                  <th class="poppins-regular" width="30px" >No</th>
                  <th class="poppins-regular">Nama</th>
                  <th class="poppins-regular">Tanggal</th>
                  <th class="poppins-regular">Login Time</th>
                  <th class="poppins-regular">Status</th>
                  <th class="poppins-regular">Menu</th>
                  {{-- <th class="poppins-regular">#</th> --}}
                </tr>
              </thead>
              <tbody>
                  @forelse ($absensi_with_user as $data)
                <tr>
                  <td class="bg-primary bg-opacity-25 poppins-bold"><span class="text-table ">{{ $loop->iteration }}</span></td>
                  <td><span class="text-table poppins-regular">{{ $data->full_name  }}</span></td>
                  <td><span class="text-table poppins-regular">{{ \Carbon\Carbon::parse($data->tanggal)->format('d F Y') }}
                    {{-- {{ $data->tanggal->format('d/m/Y') }} --}}
                </span></td>
                  {{-- <td><span class="text-table poppins-regular">{{ $data->tanggal  }}</span></td> --}}
    
                  <td class="{{ $waktu }} fs-5 poppins-regular my-auto">
                    <span class="text-table">
                        @if ($data->login_time)
                        {{ \Carbon\Carbon::parse($data->login_time)->format('H:i') }}
                    @else
                        User Izin
                    @endif
                    
                    </span>
                </td>
                  <td>
                    @if ($data->status_user == 'hadir')
                        <div class="text-table badge text-bg-primary p-2 text-secondary border border-primary border-2 bg-opacity-25 text-table poppins-bold">
                            <span>Present</span>
                        </div>
                    @endif
                    @if ($data->status_user == 'izin')
                        <div class="text-table badge text-bg-danger poppins-bold p-2 text-secondary border border-danger border-2 bg-opacity-25 ">
                            <span>Absent</span>
                        </div>
                    @endif
                  </td>
                  <td>
                    @if ($data->status_user == 'izin')
                    <button class="btn btn-primary btn-custom-table" data-bs-target="#izin{{ $data->absent_id }}" data-bs-toggle="modal"> Detail</button>                    
                    @endif
                    @if ($data->status_user == 'hadir')
                    <button class="btn btn-danger btn-custom-table" data-bs-target="#hadir{{ $data->absent_id }}" data-bs-toggle="modal"> Hapus Izin</button>                    
                        
                    @endif
                  
                    {{-- Modal Detail Izin --}}
                    <div class="modal fade" id="izin{{ $data->absent_id }}" aria-hidden="true" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary bg-opacity-50">
                                {{-- <h5 class="poppins-bold">User Izin</h5> --}}
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                            <img src="{{ asset('images/izin/'. $data->foto) }}" class="img-ket-custom rounded border border-primary border-3" alt="">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="fs-4 poppins-bold">{{ $data->full_name }}</p>

                                                </div>
                                                <div class="col">
                                                    <p class="fs-6 text-primary text-end poppins-bold">{{ $data->tanggal }}</p>

                                                </div>
                                            </div>
                                            <p class="poppins-regular mb-1">Keterangan :</p>
                                            <div class="border border-info border-3 p-2 rounded">
                                                <span class="text-muted">{{ $data->keterangan }}</span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button data-bs-dismiss="modal" class="btn btn-primary btn-custom-table">OK</button>
                            </div>
                        </div>
                    </div>
                    </div>
    
                    {{-- endModal --}}
                    {{-- Modal Detail Izin --}}
                    <div class="modal fade" id="hadir{{ $data->absent_id }}" aria-hidden="true" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary bg-opacity-50">
                                <h4 class="">Name User <span class="text-light">{{ $data->full_name }}</span></h4>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <h6>Login Tanggal : <span class="text-warning">{{ $data->tanggal }}</span></h6>
                                <p class="">Anda Yakin Mau Menghapus Izin Absen?</p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary btn-custom-table" data-bs-dismiss="modal"><i class="fa fa-backward"></i> Back</button>
                                {{-- <a href="" class="text-decoration-none btn btn-danger btn-custom-table"><i class="fa fa-user-times"></i> Hapus</a> --}}
                                <form action="{{ route('users.absensi_delete', $data->user_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-custom-table" ><i class="fa fa-user-times"></i> Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
    
                    {{-- endModal --}}
                    </td>
                  {{-- <td></td> --}}
                </tr>
                
                  @empty
                <tr>
                    <td colspan="6"><p class="text-center poppins-regular">-- No Data Available --</p> </td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <div>
                {{ $absensi_with_user->links('vendor.pagination.simple') }}
    </div>
</div>
    
        </div>
      </div>
</div>
@endsection