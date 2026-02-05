@extends('layouts.app') 

@section('content')
    <div class="card shadow-sm mt-3">
        <div class="card-body">
            <h1>Edit Post</h1>

            {{-- 1. Added 'files' => true (This adds the multipart/form-data for you) --}}
            {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
                <div class="mb-3">
                    {{ Form::label('title', 'Title', ['class' => 'form-label']) }}
                    {{ Form::text('title', null, ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('body', 'Body', ['class' => 'form-label']) }}
                    {{ Form::textarea('body', null, ['id' => 'article-ckeditor', 'class' => 'form-control']) }}
                </div>

                {{-- 2. Added Current Image Preview --}}
                <div class="mb-3">
                    <label class="form-label d-block">Current Image</label>
                    <img style="width:150px" src="{{ asset('storage/cover_images/'.$post->cover_image) }}" class="img-thumbnail mb-2">
                </div>

                {{-- 3. Added the File Input --}}
                <div class="mb-3">
                    {{ Form::label('cover_image', 'Change Post Image', ['class' => 'form-label']) }}
                    {{ Form::file('cover_image', ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Submit', ['class' => 'btn btn-success']) }}
                <a href="/posts/{{$post->id}}" class="btn btn-secondary ms-2">Go Back</a>
            {!! Form::close() !!}
        </div>
    </div>
@endsection