<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light text-dark d-flex flex-column min-vh-100 p-3">
        <header class="container mb-4">
            @php
                use Illuminate\Support\Facades\Route;
            @endphp
            @if (Route::has('login'))
                <nav class="d-flex justify-content-end gap-2">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-dark">
                            Dashboard
                        </a>
                        @if (Route::has('pendaftaran'))
                            <a href="{{ route('pendaftaran.create') }}" class="btn btn-outline-dark">
                                Register Student
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-dark">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-dark">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        @if (session('error'))
    <div class="container d-flex justify-content-center mt-3">
        <div class="alert alert-danger text-center w-50">
            {{ session('error') }}
        </div>
    </div>
@endif
<!-- Form Pencarian NISN -->
<div class="container d-flex justify-content-center">
    <div class="card shadow p-4 w-50">
        <h2 class="text-center mb-3">Cek Status Pendaftaran</h2>
        <form method="GET" action="{{ route('pendaftaran.search') }}">
            <div class="mb-3">
                <label for="nisn" class="form-label">Masukkan NISN</label>
                <input type="text" id="nisn" name="nisn" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Cek Status</button>
        </form>
    </div>
</div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>