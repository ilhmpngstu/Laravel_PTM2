@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="container flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card mt-5">

                    <div class="card-header bg-warning text-white text-center py-4">

                        <div class="d-flex justify-content-center mb-3">
                            <img
                                src="{{ asset('WhatsApp Image 2026-09-19 at 10.54.01 (1).jpeg') }}"
                                class="rounded-circle img-thumbnail shadow-sm"
                                style="width: 120px; height: 120px; object-fit: cover;"
                                alt="">
                        </div>

                        <h4 class="mb-0">Data Mahasiswa</h4>

                        <span class="badge bg-success">
                            {{ $mahasiswa['status'] }}
                        </span>

                    </div>

                    <div class="card-body">

                        <p>
                            <strong>Nama:</strong>
                            {{ $mahasiswa['nama'] }}
                        </p>

                        <p>
                            <strong>NIM:</strong>
                            {{ $mahasiswa['nim'] }}
                        </p>

                        <p>
                            <strong>Jurusan:</strong>
                            {{ $mahasiswa['prodi'] }}
                        </p>

                        <p>
                            <strong>Kampus:</strong>
                            {{ $mahasiswa['kampus'] }}
                        </p>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection