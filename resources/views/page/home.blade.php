@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="display-f fw-bold text-primary mt-5">Selamat Datang</h2>
                <p>Ini adalah halaman utama Project Laravel Web Profile</p>
                <a href="{{ url('/profile') }}" class="btn btn-success">Lihat Profile</a>
            </div>
        </div>
    </div>

@endsection