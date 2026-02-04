@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-secondary">Go Back</a>
    <h1>{{ $post->title }}</h1>
    
    <div class="card mb-3">
        <div class="card-body">
            {{ $post->body }}
        </div>
    </div>
    <hr>
    <small>Written on {{ $post->created_at }}</small>
@endsection