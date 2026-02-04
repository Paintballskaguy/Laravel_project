<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach
@endif

@if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                timer: 3000
            });
        });
    </script>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('status'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: 'Welcome back, {{ Auth::user()->name }}!',
                text: "{{ session('status') }}",
                icon: 'success',
                timer: 4000,
                showConfirmButton: false
            });
        });
    </script>
@endif