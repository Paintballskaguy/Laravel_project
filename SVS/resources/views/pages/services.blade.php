@extends('layouts.app')

@section('content')
        <h1>{{ $title }}</h1>
        <div class="card mb-3">
        @if(count($services) > 0)
            <ul class="list-group">
                @foreach($services as $service)
                    <li class="list-group-item">{{ $service }}</li>
                @endforeach
            </ul>
            </div>
            @endif
@endsection
