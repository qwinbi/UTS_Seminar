@extends('layouts.app')

@section('title', 'Tentang - BincangKlasik')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="vintage-card p-5" data-aos="fade-up">
                <div class="text-center mb-5">
                    <h1 class="vintage-header">👤 Tentang Developer</h1>
                    <p class="lead">Profil pengembang website BincangKlasik</p>
                </div>

                @if($about)
                <div class="row align-items-center">
                    <div class="col-md-5 text-center">
                        @if($about->photo)
                        <img src="{{ asset('storage/' . $about->photo) }}" class="profile-image rounded-circle mb-4" alt="{{ $about->name }}">
                        @else
                        <div class="profile-image rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto mb-4">
                            <span class="text-muted display-4">👤</span>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-7">
                        <h2 class="vintage-header">{{ $about->name }}</h2>
                        <div class="mb-3">
                            <strong>🎓 NIM:</strong> {{ $about->nim }}
                        </div>
                        <div class="mb-3">
                            <strong>📧 Role:</strong> Full Stack Developer
                        </div>
                        <div>
                            <strong>📝 Deskripsi:</strong>
                            <p class="mt-2">{{ $about->description }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <h4 class="vintage-header mb-3">🛠️ Teknologi yang Digunakan</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li>✅ Laravel 10</li>
                                <li>✅ Bootstrap 5</li>
                                <li>✅ MySQL</li>
                                <li>✅ Blade Template</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li>✅ AOS Animation</li>
                                <li>✅ File Upload System</li>
                                <li>✅ Authentication System</li>
                                <li>✅ Responsive Design</li>
                            </ul>
                        </div>
                    </div>
                </div>
                @else
                <div class="text-center py-4">
                    <div class="display-1 mb-3">📝</div>
                    <h4 class="vintage-header">Data About Belum Tersedia</h4>
                    <p class="text-muted">Admin belum mengisi data about. Silakan hubungi administrator.</p>
                </div>
                @endif

                <div class="text-center mt-5">
                    <a href="{{ route('home') }}" class="btn btn-vintage">🏠 Kembali ke Beranda</a>
                    @auth
                        @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.about') }}" class="btn btn-vintage-outline">✏️ Edit Data About</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection