@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg border-0 rounded-3">
        {{-- Royal Blue Header --}}
        <div class="card-header bg-royal text-white p-3 d-flex justify-content-between align-items-center">
            <h4 class="mb-0 fw-bold">
                <i class="fas fa-shield-alt me-2"></i>BAXTER BUILDING ARCHIVES
            </h4>
            @auth
                <a href="/posts/create" class="btn btn-baby-blue btn-sm rounded-pill fw-bold px-3">
                    + NEW MISSION LOG
                </a>
            @endauth
        </div>

        <div class="card-body bg-light">
            <div class="table-responsive">
                <table id="archivesTable" class="table table-hover align-middle">
                    <thead class="table-secondary">
                        <tr>
                            <th>MISSION TITLE</th>
                            <th>SUBMITTING HERO</th>
                            <th>LOG ENTRY</th>
                            <th class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td class="fw-bold text-royal">{{ $post->title }}</td>
                                        <td>
                                        <span class="badge rounded-pill border border-primary bg-white hero-name text-dark px-3 py-2">
                                                {{ $post->user->name ?? 'Unknown Hero' }}
                                        </span>
                                        </td>
                                <td class="text-muted small">
                                    {{ Str::limit(strip_tags($post->body), 75) }}
                                </td>
                                <td class="text-center">
                                    <a href="/posts/{{$post->id}}" class="btn btn-sm btn-royal rounded-pill">
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

<script>
    $(document).ready(function() {
        $('#archivesTable').DataTable({
            "language": {
                "search": "SCAN ARCHIVES:",
                "lengthMenu": "SHOW _MENU_ RECORDS",
                "info": "Displaying _START_ to _END_ of _TOTAL_ mission logs"
            },
            "order": [[0, "desc"]],
            "pageLength": 10
        });
    });
</script>
@endsection