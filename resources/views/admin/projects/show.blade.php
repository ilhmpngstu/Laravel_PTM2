@extends('admin.template')

@section('title', 'Detail Project: ' . $project->title)
@section('page_title', 'Detail Project')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.project.index') }}" class="text-decoration-none">Project</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail</li>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-9">
        <div class="card border-0 shadow-sm rounded-3 bg-white mb-4">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <h5 class="fw-bold mb-0 text-dark">
                    <i class="bi bi-info-circle me-1 text-primary"></i> Detail Project
                </h5>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.project.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                    <a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-pencil-square me-1"></i> Edit
                    </a>
                </div>
            </div>

            <div class="card-body p-4">
                <div class="row g-4">
                    <div class="col-12 col-md-5">
                        @if($project->image && file_exists(public_path('images/' . $project->image)))
                            <img src="{{ asset('images/' . $project->image) }}"
                                 alt="{{ $project->title }}"
                                 class="img-fluid rounded shadow-sm w-100"
                                 style="max-height: 300px; object-fit: cover;">
                        @else
                            <div class="bg-light rounded text-muted d-flex flex-column align-items-center justify-content-center py-5 border">
                                <i class="bi bi-image fs-1 mb-2"></i>
                                <span>Tidak ada gambar</span>
                            </div>
                        @endif

                        <div class="mt-3 p-3 bg-light rounded border">
                            <div class="small text-muted mb-1">Status Pengerjaan:</div>
                            <div>
                                @if($project->status == 'Selesai')
                                    <span class="badge bg-success fs-6">
                                        <i class="bi bi-check-circle me-1"></i> Selesai
                                    </span>
                                @elseif($project->status == 'Sedang Dikerjakan')
                                    <span class="badge bg-warning text-dark fs-6">
                                        <i class="bi bi-hourglass-split me-1"></i> Sedang Dikerjakan
                                    </span>
                                @else
                                    <span class="badge bg-secondary fs-6">
                                        {{ $project->status }}
                                    </span>
                                @endif
                            </div>

                            <hr class="my-2">

                            <div class="small text-muted mb-1">Dibuat pada:</div>
                            <div class="small fw-semibold text-dark">{{ $project->created_at ? $project->created_at->format('d M Y, H:i') : '-' }}</div>

                            <div class="small text-muted mt-2 mb-1">Terakhir diubah:</div>
                            <div class="small fw-semibold text-dark">{{ $project->updated_at ? $project->updated_at->format('d M Y, H:i') : '-' }}</div>
                        </div>
                    </div>

                    <div class="col-12 col-md-7">
                        <h3 class="fw-bold text-dark mb-2">{{ $project->title ?? 'Tanpa Judul' }}</h3>

                        <div class="mb-4">
                            <span class="small text-muted d-block mb-1">Teknologi yang Digunakan:</span>
                            @if($project->teknologi)
                                @foreach(explode(',', $project->teknologi) as $tech)
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle me-1 mb-1">
                                        {{ trim($tech) }}
                                    </span>
                                @endforeach
                            @else
                                <span class="text-muted small">Belum ada data teknologi.</span>
                            @endif
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-dark border-bottom pb-2">Deskripsi Lengkap</h6>
                            <p class="text-secondary lh-lg" style="white-space: pre-line;">
                                {{ $project->description ?? 'Belum ada deskripsi yang ditambahkan untuk project ini.' }}
                            </p>
                        </div>

                        <div class="border-top pt-3 d-flex justify-content-between align-items-center">
                            <a href="{{ route('project.show', $project->id) }}" target="_blank" class="btn btn-outline-info btn-sm">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Lihat Tampilan Publik
                            </a>

                            <button type="button"
                                    class="btn btn-outline-danger btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">
                                <i class="bi bi-trash me-1"></i> Hapus Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-danger" id="deleteModalLabel">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> Konfirmasi Hapus
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start py-3">
                Apakah Anda yakin ingin menghapus project <strong>"{{ $project->title }}"</strong>? Tindakan ini tidak dapat dibatalkan.
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('admin.project.destroy', $project->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus Project</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

