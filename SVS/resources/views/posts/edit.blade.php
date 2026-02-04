@extends('layouts.app') 

@section('content')
    <div class="card shadow-sm mt-3">
        <div class="card-body">
            <h1>Edit Post</h1>

{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
    <div class="mb-3">
        {{ Form::label('title', 'Title', ['class' => 'form-label']) }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('body', 'Body', ['class' => 'form-label']) }}
        {{ Form::textarea('body', null, ['id' => 'article-ckeditor', 'class' => 'form-control']) }}
    </div>
    {{ Form::submit('Submit', ['class' => 'btn btn-success']) }}
        <a href="/posts/{{$post->id}}" class="btn btn-secondary ms-2">Go Back</a>
        {!! Form::close() !!}
        
        </div>
    </div>

@endsection
