@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="container mb-3 mt-3">
                    <a href="/posts/create" class="btn btn-primary mb-3">Create Post</a>
                    <h3>Your Blog Posts</h3>
                </div>
                <div class="card-body">
                    @if (count($posts) > 0)
                        <table class="table table-striped mt-3">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td><a href="/posts/{{$post->id}}" class="text-decoration-none fw-bold">
                                        {{$post->title}}
                                    </a></td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-end'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no posts.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
