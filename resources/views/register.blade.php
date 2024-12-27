@extends('main')
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center align-items-center vh-100 pb-3">
        <div class="mt-5 p-4 col-lg-5 col-sm-10 mx-auto bg-primary bg-opacity-50 rounded ">
            <h2 class="text-center">Sign Up</h2>
            <form action="{{ route('main.register-save') }}" method="post" class="">
                @csrf 
                <div class="row my-4">
                    <div class="col-lg-12 mb-2">

                        <label for="user" class="fs-5 fw-bold text-dark">Full name :</label>
                    </div>
                    <div class="col">
                        <input type="text" name="FullName" id="user" class="form-control">

                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-lg-12 mb-2">

                        <label for="NickName" class="fs-5 fw-bold text-dark">Nick name :</label>
                    </div>
                    <div class="col">
                        <input type="text" name="NickName" id="NickName" class="form-control">

                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-lg-12 mb-2">

                        <label for="email" class="fs-5 fw-bold text-dark">Email :</label>
                    </div>
                    <div class="col">
                        <input type="email" name="email" id="email" class="form-control">

                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-lg-12 mb-2">

                        <label for="SchoolName" class="fs-5 fw-bold text-dark">School Name :</label>
                    </div>
                    <div class="col">
                        <input type="text" name="SchoolName" id="SchoolName" class="form-control">

                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-lg-12 mb-2 ">
                        <label for="password" class="fs-5 fw-bold  text-dark">Password :</label>
                    </div>
                    <div class="col">
                        <input type="password" name="password" id="password" class="form-control">

                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-lg-12 mb-2 ">
                        <label for="PasswordConfirmation" class="fs-5 fw-bold  text-dark">Password Confirmation :</label>
                    </div>
                    <div class="col">
                        <input type="password" name="PasswordConfirmation" id="PasswordConfirmation" class="form-control">

                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="/" class="text-decoration-none btn btn-secondary"><i class="fa fa-backward"></i> Back</a>
                    {{-- <a href="/" class="text-decoration-none btn btn-primary"><i class="fa-solid fa-right-to-bracket"></i> Register</a> --}}
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-right-to-bracket"></i> Register</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection