@extends('layouts.app')

@section('content')
<div class="container py-4">
    @include('inc.messages')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-3">
                {{-- Themed Header --}}
                <div class="card-header bg-baby-blue text-royal d-flex justify-content-between align-items-center p-3">
                    <h4 class="mb-0 fw-bold"><i class="fas fa-user-shield me-2"></i>{{ __('Hero Dashboard') }}</h4>
                    <a href="/posts/create" class="btn btn-royal btn-sm rounded-pill px-4">
                        <i class="fas fa-plus me-1"></i>Create Post
                    </a>
                </div>

                <div class="card-body bg-light">
                    <h3 class="text-royal mb-4 border-bottom pb-2">Your Mission Logs</h3>
                    
                    @if (count($posts) > 0)
                        <div class="table-responsive">
                            <table id="postsTable" class="table table-hover align-middle bg-white rounded shadow-sm">
                                <thead class="table-secondary">
                                    <tr>
                                        <th style="width: 100px;">VISUAL</th>
                                        <th>MISSION TITLE</th>
                                        <th style="width: 100px;" class="text-center">EDIT</th>
                                        <th style="width: 120px;" class="text-end">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>
                                                <img style="width: 80px; height: 60px; object-fit: cover;" src="/storage/cover_images/{{$post->cover_image}}" class="rounded border">
                                            </td>
                                            <td>
                                                <a href="/posts/{{$post->id}}" class="text-decoration-none fw-bold text-royal">
                                                    {{$post->title}}
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                {{-- Force visibility with inline styles --}}
                                                <a href="/posts/{{$post->id}}/edit" 
                                                class="btn btn-sm fw-bold px-3" 
                                                style="background-color: #9eb4dd !important; color: #13274C !important; display: inline-block !important; visibility: visible !important;">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                            </td>
                                            <td class="text-end">
                                                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'delete-form']) !!}
                                                    {{ Form::hidden('_method', 'DELETE') }}
                                                    <button type="button" class="btn btn-outline-danger btn-sm rounded-pill confirm-delete">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info border-0 shadow-sm">
                            <i class="fas fa-info-circle me-2"></i>You have no active mission logs in the archive.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Initialize DataTable with Baxter Building styling
    $('#postsTable').DataTable({
        "pageLength": 5,
        "order": [[1, "asc"]],
        "language": {
            "search": "SCAN YOUR LOGS:",
            "lengthMenu": "SHOW _MENU_",
            "info": "Displaying _START_ to _END_ of _TOTAL_ entries"
        }
    });

    // Handle Delete Confirmation with Themed SweetAlert
    $('.confirm-delete').on('click', function(e) {
        let form = $(this).closest('form');
        Swal.fire({
            title: "DELETING ARCHIVE?",
            text: "This technician's post will be permanently removed from the Baxter Building database!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#13274C", // Royal Blue
            cancelButtonColor: "#9eb4dd",  // Baby Blue
            confirmButtonText: "YES, DELETE IT",
            cancelButtonText: "ABORT",
            background: "#f8fafc",
            color: "#13274C"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>
@endsection