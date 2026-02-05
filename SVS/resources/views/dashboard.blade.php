@extends('layouts.app')

@section('content')
<div class="container">
    @include('inc.messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #9eb4dd; color: #13274C;">{{ __('Dashboard') }}</div>

                <div class="container mb-3 mt-3">
                    <a href="/posts/create" class="btn btn-primary mb-3" style="background-color: #13274C;">Create Post</a>
                    <h3>Your Blog Posts</h3>
                </div>
                <div class="card-body">
                    @if (count($posts) > 0)
                        {{-- IMPORTANT: Added id="postsTable" --}}
                        <table id="postsTable" class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th></th> 
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td style="width: 80px;">
                                            <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}" alt="Post Image">
                                        </td>
                                        <td><a href="/posts/{{$post->id}}" class="text-decoration-none fw-bold" style="color: #13274C;">
                                            {{$post->title}}
                                        </a></td>
                                        <td><a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a></td>
                                        <td>
                                            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-end delete-form']) !!}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                <button type="button" class="btn btn-danger btn-sm confirm-delete">Delete</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>You have no posts.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#postsTable').DataTable({
        "pageLength": 5,
        "order": [[1, "asc"]],
        "language": {
            "search": "Filter posts:"
        }
    });

    // Handle Delete Confirmation
    $('.confirm-delete').on('click', function(e) {
        let form = $(this).closest('form');
        Swal.fire({
            title: "Are you sure?",
            text: "This technician's post will be removed!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#13274C", // Royal Blue
            cancelButtonColor: "#9eb4dd",  // Baby Blue
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>
@endsection