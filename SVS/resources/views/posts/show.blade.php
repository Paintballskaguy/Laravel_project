@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-secondary mb-3">Go Back</a>
    
    {{-- Image Collapse Toggle --}}
    @if($post->cover_image != 'noimage.jpg')
        <div class="mb-3">
            <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#imageCollapse" aria-expanded="false">
                Show/Hide Image
            </button>
            <div class="collapse show mt-2" id="imageCollapse">
                <div class="card card-body p-0 border-0">
                    <img src="{{ asset('storage/cover_images/'.$post->cover_image) }}" 
                    class="rounded shadow-sm"
                    style="width:100%; max-height: 400px; object-fit: cover; cursor: zoom-in !important; pointer-events: auto;"
                    onclick="showFullImage('{{ asset('storage/cover_images/'.$post->cover_image) }}')">
                </div>
            </div>
        </div>
    @endif

    <h1>{{ $post->title }}</h1>
    
    <div class="card mb-3">
        <div class="card-body">
            {!! $post->body !!}
        </div>
    </div>
    <hr>
    <div class="text-muted">
        <p><strong>Original Post:</strong> {{ $post->created_at->format('M j, Y \a\t g:i a') }}</p>
        
        @if($post->updated_at->gt($post->created_at))
            <p class="text-primary">
                <strong>Last Edited:</strong> {{ $post->updated_at->diffForHumans() }} 
                ({{ $post->updated_at->format('M j, Y \a\t g:i a') }})
            </p>
        @endif
    </div>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a>

            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-end']) !!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close() !!}
        @endif
    @endif
    <script>
    function showFullImage(imageUrl) {
        Swal.fire({
            imageUrl: imageUrl,
            imageAlt: 'Post Image',
            width: 'auto',
            padding: '5px',
            showConfirmButton: false, // Removes the "OK" button
            showCloseButton: true,    // Adds an "X" in the corner
            background: 'rgba(0,0,0,0.8)', // Darker background to make image pop
            backdrop: `rgba(0,0,0,0.6)`
        });
    }
    </script>
@endsection