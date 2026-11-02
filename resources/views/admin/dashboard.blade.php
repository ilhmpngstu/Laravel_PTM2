@extends('admin.template')

@section('title', 'Admin Web Profile - Dashboard')

@section('content')
<div class="card-custom mb-4">
    <h3 class="fw-semibold text-dark mb-2">Dashboard</h3>
    <p class="text-muted">Selamat datang di Panel Admin Web Profile Program Studi Sistem Informasi Universitas Pamulang.</p>

    <div class="row g-3 mt-2">
        <!-- Card Total Project -->
        <div class="col-12 col-md-4">
            <div class="p-3 bg-light rounded border border-secondary-subtle">
                <div class="text-muted small fw-bold text-uppercase">Total Project</div>
                <h2 class="fw-bold text-primary mt-2 mb-0">{{ $totalProjects }}</h2>
                <div class="mt-2">
                    <a href="{{ route('admin.projects.index') }}" class="small text-decoration-none">Kelola data project &rarr;</a>
                </div>
            </div>
        </div>

        <!-- Card Project Active -->
        <div class="col-12 col-md-4">
            <div class="p-3 bg-light rounded border border-secondary-subtle">
                <div class="text-muted small fw-bold text-uppercase">Project Selesai / Active</div>
                <h2 class="fw-bold text-success mt-2 mb-0">{{ $projectsSelesai }}</h2>
                <div class="mt-2">
                    <span class="small text-muted">Project berstatus aktif / selesai</span>
                </div>
            </div>
        </div>

        <!-- Card Project Other -->
        <div class="col-12 col-md-4">
            <div class="p-3 bg-light rounded border border-secondary-subtle">
                <div class="text-muted small fw-bold text-uppercase">Project Dalam Pengerjaan</div>
                <h2 class="fw-bold text-warning mt-2 mb-0">{{ $projectsProses }}</h2>
                <div class="mt-2">
                    <span class="small text-muted">Project yang masih diproses</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
