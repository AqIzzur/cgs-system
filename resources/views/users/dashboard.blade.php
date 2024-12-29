@extends('main')
@section('content')
<h1>Welcome to your Dashboard</h1>
<p>Welcome, {{ Auth::user()->email }}</p>
<a href="/user/logout">Logout</a>
@endsection