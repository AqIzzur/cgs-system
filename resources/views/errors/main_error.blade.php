<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Tambahkan token CSRF dalam request POST -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- <link rel="icon" href="{{ asset('asset/image/cgs_team.png') }}" type="image/x-icon"> -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/awesome/fontawesome.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/font-poppins.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/errors/style_error.css') }}">
    
</head>
<body>
    @yield('errors')
<script src="{{ asset('asset/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('asset/js/awesome/all.min.js') }}"></script>
    
</body>
</html>