@extends('layouts.app')

@section('title', 'Register - BincangKlasik')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="vintage-card p-5" data-aos="fade-up">
                <div class="text-center mb-4">
                    <h2 class="vintage-header">📝 Daftar Akun Baru</h2>
                    <p class="text-muted">Bergabunglah dengan BincangKlasik untuk mulai mendaftar seminar</p>
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

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">👤 Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required placeholder="Masukkan nama lengkap Anda">
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">📧 Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required placeholder="Masukkan email Anda">
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">🔒 Password</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Minimal 5 karakter">
                    </div>
                    
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">✅ Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Ketik ulang password Anda">
                    </div>
                    
                    <button type="submit" class="btn btn-vintage w-100 py-2">🎉 Daftar Sekarang</button>
                </form>
                
                <div class="text-center mt-3">
                    <p>Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none">Login di sini</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection