@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts) > 1)
        @foreach($posts as $post)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                    <small class="text-muted">
                @if($post->updated_at->gt($post->created_at))
                    <span class="text-primary">Updated on {{ $post->updated_at->format('M d, Y') }}</span>
                @else
                    Written on {{ $post->created_at->format('M d, Y') }}
                @endif
            </small>
                </div>
            </div>
        @endforeach
    @else
        <p>No posts found</p>
    @endif

@endsection