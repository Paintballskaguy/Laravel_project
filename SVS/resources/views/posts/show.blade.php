@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-secondary">Go Back</a>
    <h1>{{ $post->title }}</h1>
    
    <div class="card mb-3">
        <div class="card-body">
            {!! $post->body !!}
        </div>
    </div>
    <hr>
    <div class="text-muted">
        <p><strong>Original Post:</strong> {{ $post->created_at->format('M j, Y \a\t g:i a') }}</p>
        
        {{-- Using Laravel's 'gt' (greater than) helper is more reliable than '!=' --}}
        @if($post->updated_at->gt($post->created_at))
                <p class="text-primary">
                    <strong>Last Edited:</strong> {{ $post->updated_at->diffForHumans() }} 
                    ({{ $post->updated_at->format('M j, Y \a\t g:i a') }})
                </p>
            @endif
        </div>
    <hr>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a>

    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-end']) !!}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
    {!! Form::close() !!}
@endsection