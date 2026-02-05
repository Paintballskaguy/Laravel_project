@extends('layouts.app')

@section('content')
<div class="container py-4">
    {{-- Main Archive Card --}}
    <div class="card shadow border-0 rounded-3 overflow-hidden">
        <div class="card-header bg-royal p-3 d-flex justify-content-between align-items-center">
            <h4 class="mb-0 text-white fw-bold">
                <i class="fas fa-database me-2"></i>BAXTER BUILDING ARCHIVES
            </h4>
            @auth
                <a href="/posts/create" class="btn btn-baby-blue btn-sm rounded-pill px-3 fw-bold">
                    + NEW ENTRY
                </a>
            @endauth
        </div>

        <div class="card-body bg-light">
            <p class="text-muted small mb-4">Scanning all known superhuman-civilian encounters across the Tulsa area.</p>
            
            <div class="table-responsive">
                <table id="archivesTable" class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-royal">MISSION TITLE</th>
                            <th class="text-royal">SUBMITTING HERO</th>
                            <th class="text-royal">LOG ENTRY (PARTIAL)</th>
                            <th class="text-royal text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td class="fw-bold text-dark">{{ $post->title }}</td>
                                <td>
                                    <span class="badge bg-royal-outline text-royal border border-primary px-2 py-1">
                                        {{ $post->user->name ?? 'Unknown Hero' }}
                                    </span>
                                </td>
                                <td class="text-muted italic">
                                    "{{ Str::limit(strip_tags($post->body), 60) }}"
                                </td>
                                <td class="text-center">
                                    <a href="/posts/{{$post->id}}" class="btn btn-sm btn-royal rounded-pill px-3">
                                        Scan Log
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- DataTables Script --}}
<script>
    $(document).ready(function() {
        $('#archivesTable').DataTable({
            "language": {
                "search": "FILTER BY TITLE/HERO/LOG:",
                "lengthMenu": "SHOW _MENU_ RECORDS",
                "info": "Displaying _START_ to _END_ of _TOTAL_ mission logs"
            },
            "order": [[0, "asc"]],
            "pageLength": 10
        });
    });
</script>
@endsection