@extends('layouts.app')

@section('content')
<div class="container py-4">
    {{-- Header Section --}}
    <div class="card shadow-lg border-0 rounded-3 overflow-hidden mb-4">
        <div class="card-header bg-royal text-white p-3">
            <h4 class="mb-0 fw-bold"><i class="fas fa-rocket me-2"></i>MISSION BRIEFING: THE 1961 INCIDENT</h4>
        </div>
        
        <div class="card-body bg-white p-0">
            <div class="row g-0">
                {{-- Text Content --}}
                <div class="col-md-7 p-5">
                    <h2 class="display-6 fw-bold text-royal mb-3">From Cosmic Rays to Heroes</h2>
                    <p class="lead">In November 1961, Dr. Reed Richards led a crew—Sue Storm, Johnny Storm, and Ben Grimm—on a desperate mission to beat the USSR in the space race.</p>
                    
                    <div class="origin-details bg-light p-3 border-start border-4 border-primary rounded">
                        <p class="small mb-0"><strong>Technical Log:</strong> Bombarded by high-frequency cosmic radiation after their experimental rocket lacked sufficient shielding. The result was a genetic rewrite that transformed four humans into "Marvel's First Family."</p>
                    </div>

                    <p class="mt-4">This platform is the secure digital extension of the <strong>Baxter Building</strong>. Every entry in our archive is a piece of history. Whether you've seen a flare in the sky or been saved from a Subterranean collapse, your story matters here.</p>
                    
                    <div class="mt-4">
                        <a href="/register" class="btn btn-royal rounded-pill px-4 me-2">Join the Resistance</a>
                        <a href="/posts" class="btn btn-outline-primary rounded-pill px-4">Scan Archives</a>
                    </div>
                </div>

                {{-- Image Placeholder --}}
                <div class="col-md-5 d-none d-md-block" 
                     style="background: url('https://w.wallhaven.cc/full/8o/wallhaven-8o9m9j.jpg') center/cover no-repeat; min-height: 400px;">
                    {{-- This creates a professional 'Hero' image area --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection