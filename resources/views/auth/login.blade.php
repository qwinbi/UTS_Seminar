@extends('layouts.app')

@section('title', 'Login - BincangKlasik')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="vintage-card p-5" data-aos="fade-up">
                <div class="text-center mb-4">
                    <h2 class="vintage-header">🔑 Login ke BincangKlasik</h2>
                    <p class="text-muted">Masuk ke akun Anda untuk mulai mendaftar seminar</p>
                </div>
                
                @if($errors->any())
                <div class="alert alert-danger vintage-card">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">📧 Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required placeholder="Masukkan email Anda">
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">🔒 Password</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan password Anda">
                    </div>
                    
                    <button type="submit" class="btn btn-vintage w-100 py-2">🚀 Login</button>
                </form>
                
                <div class="text-center mt-3">
                    <p>Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none">Daftar di sini</a></p>
                </div>

                <!-- Demo Accounts -->
                <div class="mt-4 p-3 vintage-card" style="background: var(--cream);">
                    <h6 class="vintage-header mb-3">👥 Akun Demo:</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Admin Account:</strong>
                            <p class="mb-1 small">Email: admin@email.com</p>
                            <p class="mb-0 small">Password: 12345</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Guest Account:</strong>
                            <p class="mb-1 small">Email: guest@email.com</p>
                            <p class="mb-0 small">Password: 54321</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection