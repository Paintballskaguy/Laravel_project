<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SVS') }}</title>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('./img/favicon.ico') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}?v={{ filemtime(public_path('css/app.css')) }}" rel="stylesheet">

    <style>    
    /* 1. Make the Navbar Royal Blue */
    .navbar {
        background-color: var(--bs-primary) !important;
        border-bottom: 4px solid var(--bs-info); /* Baby blue cosmic highlight */
    }
    
    .navbar-brand, .nav-link {
        color: white !important;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* 2. The Fantastic 4 Dashboard Headers */
    .card-header {
        background: linear-gradient(45deg, var(--bs-primary), var(--bs-info)) !important;
        color: white !important;
        font-weight: 900;
        border: none;
    }

    /* 3. The Central Circular Button Style (The "4" Logo feel) */
    .btn-primary {
        background-color: var(--bs-primary) !important;
        border: 2px solid var(--bs-info) !important;
        border-radius: 50px !important;
        padding: 8px 25px;
        transition: 0.3s;
    }

    .btn-primary:hover {
        background-color: var(--bs-info) !important;
        color: var(--bs-primary) !important;
        box-shadow: 0 0 15px rgba(158, 180, 221, 0.5);
    }

    /* 4. Page Background */
    body {
        background-color: #f0f2f5;
    }
</style>
   
</head>
<body>
    <div id="app">
        @include('inc.navbar')

        <main class="container py-4">
            @include('inc.messages')
            @yield('content')
        </main>
    </div>
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

        <script>
            // 'DOMContentLoaded' runs as soon as the HTML is ready, without waiting for images
            document.addEventListener("DOMContentLoaded", function() {
                console.log("DOM ready. Checking for article-ckeditor...");
                
                var editorElement = document.getElementById('article-ckeditor');
                
                if (editorElement) {
                    console.log("ID found. Initializing CKEditor...");
                    // Extra check to ensure the library is loaded
                    if (typeof CKEDITOR !== 'undefined') {
                        CKEDITOR.replace('article-ckeditor');
                    } else {
                        console.error("CKEDITOR library not found. Check your CDN link.");
                    }
                } else {
                    console.log("No CKEditor textarea on this page.");
                }
            });
        </script>
</body>
</html>
