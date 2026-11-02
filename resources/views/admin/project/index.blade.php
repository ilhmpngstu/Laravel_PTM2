@extends('admin.template')

@section('title', 'Admin Web Profile')

@section('content')
<div class="card-custom">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-normal text-dark mb-0" style="font-size: 1.75rem;">Data Projects</h3>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary px-3 py-2" style="font-size: 14px;">
            Tambah Project
        </a>
    </div>

    <div class="table-responsive">
        <table id="projectTable" class="table table-bordered table-striped align-middle" style="width:100%">
            <thead>
                <tr>
                    <th style="width: 40px;" class="text-center">No</th>
                    <th style="width: 75px;" class="text-center">Image</th>
                    <th>Title</th>
                    <th>Teknologi</th>
                    <th>Description</th>
                    <th style="width: 75px;">Status</th>
                    <th style="width: 80px;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center">
                            @if($item->image && file_exists(public_path('images/' . $item->image)))
                                <img src="{{ asset('images/' . $item->image) }}"
                                     alt="{{ $item->title }}"
                                     class="border rounded"
                                     style="width: 55px; height: 50px; object-fit: contain; background: #fff;">
                            @else
                                <div class="bg-light rounded text-muted text-center py-2 border" style="width: 55px; height: 50px; font-size: 10px;">
                                    No Image
                                </div>
                            @endif
                        </td>
                        <td class="text-dark">{{ $item->title }}</td>
                        <td>{{ $item->teknologi }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->status }}</td>
                        <td class="text-center">
                            <div class="d-flex flex-column gap-1">
                                <a href="{{ route('admin.projects.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm py-1 px-2 text-dark fw-normal"
                                   style="font-size: 12px; background-color: #ffc107; border-color: #ffc107;">
                                    Edit
                                </a>
                                <form action="{{ route('admin.projects.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus project ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-danger btn-sm py-1 px-2 text-white fw-normal w-100"
                                            style="font-size: 12px; background-color: #dc3545; border-color: #dc3545;">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#projectTable').DataTable({
            "language": {
                "lengthMenu": "_MENU_ entries per page",
                "search": "Search:",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "Showing 0 to 0 of 0 entries",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "zeroRecords": "Tidak ada data yang cocok",
                "paginate": {
                    "first": "&laquo;",
                    "last": "&raquo;",
                    "next": "&gt;",
                    "previous": "&lt;"
                }
            }
        });
    });
</script>
@endpush
