@extends('admin.template')

@section('title', 'Admin Web Profile')

@section('content')
<div class="card-custom">
    <h3 class="fw-normal text-dark mb-4" style="font-size: 1.75rem;">Edit Project</h3>

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-3 mb-3">
            <!-- Nama Project -->
            <div class="col-12 col-md-6">
                <label for="title" class="form-label form-label-custom">Nama Project</label>
                <input type="text"
                       class="form-control form-control-custom @error('title') is-invalid @enderror"
                       id="title"
                       name="title"
                       value="{{ old('title', $project->title) }}"
                       required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Teknologi -->
            <div class="col-12 col-md-6">
                <label for="teknologi" class="form-label form-label-custom">Teknologi</label>
                <input type="text"
                       class="form-control form-control-custom @error('teknologi') is-invalid @enderror"
                       id="teknologi"
                       name="teknologi"
                       value="{{ old('teknologi', $project->teknologi) }}">
                @error('teknologi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row g-3 mb-3">
            <!-- Status -->
            <div class="col-12 col-md-6">
                <label for="status" class="form-label form-label-custom">Status</label>
                <input type="text"
                       class="form-control form-control-custom @error('status') is-invalid @enderror"
                       id="status"
                       name="status"
                       value="{{ old('status', $project->status) }}"
                       placeholder="active / archived">
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Image -->
            <div class="col-12 col-md-6">
                <label for="image" class="form-label form-label-custom">Image</label>
                <input type="file"
                       class="form-control form-control-custom @error('image') is-invalid @enderror"
                       id="image"
                       name="image"
                       accept="image/*">
                @if($project->image)
                    <small class="text-muted d-block mt-1">File saat ini: {{ $project->image }}</small>
                @endif
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="form-label form-label-custom">Description</label>
            <textarea class="form-control form-control-custom @error('description') is-invalid @enderror"
                      id="description"
                      name="description"
                      rows="5">{{ old('description', $project->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tombol Aksi (Ubah & Batal) -->
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-3" style="background-color: #0d6efd; border-color: #0d6efd;">
                Ubah
            </button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-danger px-3" style="background-color: #dc3545; border-color: #dc3545;">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
