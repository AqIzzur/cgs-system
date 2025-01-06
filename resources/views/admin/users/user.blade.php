@extends('admin.users')
@section('content')
<link rel="stylesheet" href="{{ asset('asset/css/users/style-table.css') }}">

    <div class="container">
        <div class="row">
            <div class="col my-3">
                <h2 class="poppins-bold">
                    Daftar User
                </h2>
            </div>
            <div class="col">

            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-custom">
              <thead>
                <tr>
                    <th width="30px">No</th>
                    <th>Nama </th>
                    <th>Nick Name </th>
                    <th>Asal</th>
                    <th>Menu</th>
                    {{-- <th>#</th> --}}
                </tr>
              </thead>
              <tbody>
                @foreach ( $users as $user)
                    
                <tr>
                    <td class="bg-primary bg-opacity-25 poppins-bold"><span class="text-table">{{ $loop->iteration }}</td>
                    <td><span class="text-table poppins-regular">{{ $user->full_name  }}</span></td>
                    <td><span class="text-table poppins-regular">{{ $user->email  }}</span></td>
                    <td><span class="text-table poppins-regular">{{ $user->school_name  }}</span></td>
                    <td>
                        <button class="btn btn-primary btn-custom-table mb-sm-2" data-bs-target="#detail{{ $user->user_id }}" data-bs-toggle="modal"> Detail</button>
                        @if ($user->status == 'active')
                            
                        <button class="badge text-info  poppins-regular border-1 border border-info  poppins-regular  bg-opacity-50 btn-custom-table">Activate</button>
                        @endif
                        @if ($user->status == 'inactive')
                        <button class="badge text-danger border-1 poppins-regular border border-danger bg-opacity-50 btn-custom-table">Deactivate</button>
                            
                        @endif 

                    </td>
                    {{-- <td>
                        @if ($user->status)
                            
                        @endif
                    </td> --}}
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>

    </div>
@endsection