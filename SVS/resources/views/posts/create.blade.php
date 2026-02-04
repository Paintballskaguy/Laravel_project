@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h1>Create Post</h1>
            
            {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
                <div class="mb-3">
                    {{ Form::label('title', 'Title', ['class' => 'form-label']) }}
                    {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('body', 'Body', ['class' => 'form-label']) }}
                    {{-- Only keep ONE textarea with this ID --}}
                    {{ Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text']) }}
                </div>
                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection