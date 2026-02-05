@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="jumbotron shadow-lg p-5 mb-4 bg-white rounded border-top border-4 border-primary">
        <div class="row align-items-center">
            <div class="col-md-8 text-start">
                <h1 class="display-4 fw-bold text-royal">TECH SUPPORT TERMINAL</h1>
                <p class="lead text-muted">Directives and Technical Solutions for the Modern Ally.</p>
            </div>
            <div class="col-md-4 text-end">
                <i class="fas fa-microchip fa-5x text-baby-blue"></i>
            </div>
        </div>
        
        <hr class="my-4">

        <div class="row mt-5">
            <div class="col-md-6">
                <h3 class="text-royal mb-4"><i class="fas fa-tools me-2"></i>Active Directives</h3>
                @if(count($services) > 0)
                    <ul class="list-group list-group-flush shadow-sm rounded">
                        @foreach($services as $service)
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-check-circle text-primary me-3"></i>
                                <span class="fw-bold text-dark">{{ $service }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            
            <div class="col-md-6">
                <div class="p-4 bg-light border rounded">
                    <h4 class="text-royal fw-bold">Request Technical Aid</h4>
                    <p class="small text-muted">For urgent infrastructure needs or hospital-grade IT deployment, contact the Baxter Building lead.</p>
                    <a href="mailto:jwilson@example.com" class="btn btn-royal w-100 rounded-pill mt-3">SUBMIT SUPPORT TICKET</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection