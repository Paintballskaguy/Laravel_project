@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h1>Create Post</h1>
            
            {{-- 1. Added 'enctype' => 'multipart/form-data' --}}
            {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="mb-3">
                    {{ Form::label('title', 'Title', ['class' => 'form-label']) }}
                    {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('body', 'Body', ['class' => 'form-label']) }}
                    {{ Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text']) }}
                </div>

                {{-- 2. Added the file upload input --}}
                <div class="mb-3">
                    {{ Form::label('cover_image', 'Post Image', ['class' => 'form-label']) }}
                    {{ Form::file('cover_image', ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection