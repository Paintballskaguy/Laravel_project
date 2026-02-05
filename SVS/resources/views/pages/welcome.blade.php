@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
    <div class="jumbotron shadow-lg p-5 mb-4 bg-white rounded border-top border-4 border-primary">
        <h1 class="display-4 fw-bold text-royal">The Baxter Building Portal</h1>
        <p class="lead mt-3">From the Cosmic Rays to the Heroic Days.</p>
        <hr class="my-4">
        
        <div class="row align-items-center text-start">
            <div class="col-md-6">
                <h3 class="text-royal">The Fantastic Origin</h3>
                <p>Four brave souls—Reed Richards, Sue Storm, Johnny Storm, and Ben Grimm—ventured into the unknown of outer space. Bombarded by cosmic radiation, they returned to Earth transformed, possessing incredible powers. But they didn't just become superheroes; they became a family.</p>
                <p><strong>The Fantastic Four</strong> have spent years protecting our world from the Negative Zone, Dr. Doom, and Galactus. Now, we want to hear <em>your</em> story.</p>
            </div>
            <div class="col-md-6 text-center">
                <div class="p-4 border rounded bg-light">
                     <h4 class="mb-4 text-royal">Access Central Interface</h4>
                @if (Route::has('login'))
                    @auth
                        {{-- Use btn-royal for the main action --}}
                        <a href="{{ url('/dashboard') }}" class="btn btn-royal btn-lg w-100 mb-2 rounded-pill">Return to Terminal</a>
                    @else
                        {{-- Use btn-royal for Login --}}
                        <a href="{{ route('login') }}" class="btn btn-royal btn-lg w-100 mb-3 rounded-pill">Login to Archives</a>
                        
                        @if (Route::has('register'))
                            <p class="mb-1 text-dark fw-bold">New Ally?</p>
                            {{-- Use btn-outline-primary for the secondary action --}}
                            <a href="{{ route('register') }}" class="btn btn-outline-primary w-100 rounded-pill">Join the Team</a>
                        @endif
                    @endauth
                @endif
            </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-5">
        <div class="col-md-12">
            <h2 class="text-royal mb-4">How have the Fantastic 4 helped you?</h2>
            <p>Our mission is to document the positive impact the team has had on the world. Register now to submit your encounter or story and help the Baxter Building keep a record of human-superhuman cooperation.</p>
        </div>
    </div>
</div>
@endsection