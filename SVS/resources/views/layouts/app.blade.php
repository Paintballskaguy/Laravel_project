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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
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
