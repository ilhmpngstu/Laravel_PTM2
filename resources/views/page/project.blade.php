@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<div class="container py-4">
    <!-- Header Halaman -->
    <h1 class="text-center my-4 text-dark" style="font-weight: 400; font-size: 2.2rem;">My Projects</h1>

    <!-- Grid Projects (3 Per Baris) -->
    <div class="row g-4 mb-4">
        @forelse ($projects as $project)
            <div class="col-12 col-md-4">
                <div class="card h-100 project-card shadow-none">
                    <div class="project-img-wrapper">
                        @if ($project->image && file_exists(public_path('images/' . $project->image)))
                            <img src="{{ asset('images/' . $project->image) }}" alt="{{ $project->title }}">
                        @else
                            <div class="text-muted small">No Image</div>
                        @endif
                    </div>

                    <div class="card-body d-flex flex-column p-4">
                        <h5 class="card-title fw-bold text-dark mb-2">
                            {{ $project->title ?? 'Tanpa Judul' }}
                        </h5>

                        <p class="card-text text-muted mb-3" style="font-size: 13.5px; line-height: 1.5;">
                            {{ Str::limit($project->description, 48) }}
                        </p>

                        <div class="mt-auto">
                            <p class="card-text text-muted small mb-3">
                                Tech: {{ $project->teknologi ?? '-' }}
                            </p>

                            <a href="{{ url('/projects/' . $project->id) }}" class="btn btn-primary w-100 py-2">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center py-4">
                    Belum ada project yang tersedia.
                </div>
            </div>
        @endforelse
    </div>

    <!-- Paginasi (Showing X to Y of Z results) -->
    <div class="d-flex justify-content-center align-items-center gap-3 mt-4">
        <span class="text-muted small">
            Showing {{ $projects->firstItem() ?? 0 }} to {{ $projects->lastItem() ?? 0 }} of {{ $projects->total() }} results
        </span>
        <div>
            {{ $projects->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
