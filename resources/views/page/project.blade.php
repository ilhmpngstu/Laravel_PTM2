@extends('layouts.app')

@section('title', 'Project')

@section('content')

<div class="container py-5">

    {{-- Header halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-2">My Projects</h2>
            <p class="text-muted mb-0">
                Kumpulan project yang telah saya kerjakan.
            </p>
        </div>

        <span class="badge bg-primary rounded-pill px-3 py-2">
            {{ $projects->total() }} Projects
        </span>
    </div>

    <hr class="mb-4">

    <div class="row g-4">

        @forelse ($projects as $project)

            <div class="col-12 col-md-6 col-lg-4">

                <div class="card h-100 border-0 shadow-sm project-card">

                    @if ($project->image)
                        <img
                            src="{{ asset('images/' . $project->image) }}"
                            class="card-img-top project-image"
                            alt="{{ $project->title }}"
                        >
                    @else
                        <div class="project-image-placeholder">
                            <span>No Image</span>
                        </div>
                    @endif
                    <div class="card-body d-flex flex-column p-4">

                        <div class="mb-3">
                            <span class="badge
                                {{ $project->status == 'Selesai'
                                    ? 'bg-success'
                                    : 'bg-warning text-dark' }}">
                                {{ $project->status }}
                            </span>
                        </div>


                        <h5 class="card-title fw-bold mb-3">
                            {{ $project->title ?? 'Tanpa Judul' }}
                        </h5>

                        {{-- Deskripsi --}}
                        <p class="card-text text-muted project-description">
                            {{ $project->description ?? 'Belum ada deskripsi.' }}
                        </p>

                        {{-- Teknologi --}}
                        <div class="mt-auto">

                            <p class="small text-muted mb-2">
                                Teknologi yang digunakan
                            </p>

                            <div class="mb-3">
                                <span class="badge bg-light text-dark border">
                                    {{ $project->teknologi ?? 'Belum ditentukan' }}
                                </span>
                            </div>

                            {{-- Tombol detail --}}
                            <a
                                href="{{ route('project.show', $project->id) }}"
                                class="btn btn-outline-primary w-100"
                            >
                                Lihat Detail
                                &rarr;
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">
                <div class="alert alert-info text-center">
                    Belum ada project yang tersedia.
                </div>
            </div>

        @endforelse

    </div>

    {{-- Pagination --}}
    @if ($projects->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $projects->links('pagination::bootstrap-5') }}
        </div>
    @endif

</div>

{{-- CSS halaman project --}}
<style>
    .project-card {
        border-radius: 14px;
        overflow: hidden;
        transition: transform 0.25s ease,
                    box-shadow 0.25s ease;
    }

    .project-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.10) !important;
    }

    .project-image {
        width: 100%;
        height: 210px;
        object-fit: cover;
    }

    .project-image-placeholder {
        width: 100%;
        height: 210px;
        background: #f1f3f5;
        color: #6c757d;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .project-description {
        line-height: 1.7;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 5.1em;
    }

    .project-card .card-title {
        line-height: 1.4;
    }
</style>

@endsection