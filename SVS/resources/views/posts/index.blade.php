@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts) > 1)
        @foreach($posts as $post)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                    <small class="text-muted">Written on {{ $post->created_at }}</small>
                </div>
            </div>
        @endforeach
    @else
        <p>No posts found</p>
    @endif

@endsection