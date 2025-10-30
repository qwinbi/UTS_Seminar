@extends('layouts.app')

@section('title', 'Beranda - BincangKlasik')

@section('content')
<!-- Hero Section -->
<section class="py-5 text-center retro-border" style="background: linear-gradient(135deg, var(--pastel-blue), var(--cream)); border: 4px solid var(--vintage-brown);">
    <div class="container">
        <div data-aos="fade-up">
            <!-- Route 66 Inspired Badge -->
            <div class="route-badge d-inline-block mb-3" style="background: var(--pastel-pink); color: var(--vintage-brown);">
                🚗 ROUTE 66 STYLE
            </div>
            
            <h1 class="retro-title display-4 mb-3" style="color: var(--dark-green);">BINCANGKLASIK</h1>
            <p class="retro-subtitle lead mb-4" style="color: var(--vintage-brown); font-size: 1.2em;">SEMINAR ONLINE • VINTAGE STYLE • PREMIUM QUALITY</p>
            
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="{{ route('seminars') }}" class="btn btn-vintage btn-lg" style="background: var(--dark-green); border-color: var(--vintage-brown);">
                    🚀 JELAJAHI SEMINAR
                </a>
                @guest
                <a href="{{ route('register') }}" class="btn btn-vintage-outline btn-lg" style="border-color: var(--vintage-brown); color: var(--vintage-brown);">
                    📝 DAFTAR SEKARANG
                </a>
                @endguest
            </div>
            
            <!-- Open 24 Inspired Badge -->
            <div class="mt-4">
                <span class="route-badge" style="background: var(--cream); color: var(--vintage-brown); border: 2px solid var(--dark-green);">
                    ⏰ ONLINE 24/7
                </span>
            </div>
        </div>
    </div>
</section>

<!-- Featured Seminars -->
<section class="py-5">
    <div class="container">
        <h2 class="vintage-header text-center mb-5" data-aos="fade-up">🎯 Seminar Terbaru</h2>
        <div class="row">
            @forelse($seminars as $seminar)
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="vintage-card h-100">
                    @if($seminar->image)
                    <img src="{{ asset('storage/' . $seminar->image) }}" class="seminar-image" alt="{{ $seminar->title }}">
                    @else
                    <div class="seminar-image bg-light d-flex align-items-center justify-content-center">
                        <span class="text-muted">📷 Tidak ada gambar</span>
                    </div>
                    @endif
                    <div class="p-4">
                        <h5 class="vintage-header">{{ $seminar->title }}</h5>
                        <p class="text-muted mb-2">📅 {{ \Carbon\Carbon::parse($seminar->date)->format('d M Y, H:i') }}</p>
                        <p class="mb-3">{{ Str::limit($seminar->description, 100) }}</p>
                        <div class="d-flex gap-2">
                            <a href="{{ route('seminars') }}" class="btn btn-vintage btn-sm">Lihat Detail</a>
                            @auth
                            <a href="{{ route('guest.seminar.show', $seminar) }}" class="btn btn-vintage-outline btn-sm">Daftar</a>
                            @else
                            <a href="{{ route('login') }}" class="btn btn-vintage-outline btn-sm">Login untuk Daftar</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center" data-aos="fade-up">
                <div class="vintage-card p-5">
                    <h4 class="vintage-header">📭 Belum ada seminar</h4>
                    <p class="text-muted">Silakan kembali lagi nanti untuk melihat seminar terbaru.</p>
                </div>
            </div>
            @endforelse
        </div>
        
        @if($seminars->count() > 0)
        <div class="text-center mt-4" data-aos="fade-up">
            <a href="{{ route('seminars') }}" class="btn btn-vintage">Lihat Semua Seminar</a>
        </div>
        @endif
    </div>
</section>

<!-- About Preview -->
@if($about)
<section class="py-5" style="background: var(--pastel-pink);">
    <div class="container">
        <div class="row align-items-center" data-aos="fade-up">
            <div class="col-md-4 text-center">
                @if($about->photo)
                <img src="{{ asset('storage/' . $about->photo) }}" class="profile-image rounded-circle" alt="{{ $about->name }}">
                @else
                <div class="profile-image rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto">
                    <span class="text-muted">👤</span>
                </div>
                @endif
            </div>
            <div class="col-md-8">
                <h2 class="vintage-header">👋 Tentang Kami</h2>
                <h4>{{ $about->name }}</h4>
                <p class="text-muted">🎓 NIM: {{ $about->nim }}</p>
                <p>{{ Str::limit($about->description, 200) }}</p>
                <a href="{{ route('about') }}" class="btn btn-vintage">Baca Selengkapnya</a>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <h2 class="vintage-header text-center mb-5" data-aos="fade-up">✨ Kenapa Memilih BincangKlasik?</h2>
        <div class="row">
            <div class="col-md-4 text-center mb-4" data-aos="fade-up" data-aos-delay="0">
                <div class="vintage-card p-4 h-100">
                    <div class="display-4 mb-3">🎨</div>
                    <h4 class="vintage-header">Tema Vintage</h4>
                    <p>Pengalaman klasik yang hangat dengan desain estetik dan nyaman dipandang</p>
                </div>
            </div>
            <div class="col-md-4 text-center mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="vintage-card p-4 h-100">
                    <div class="display-4 mb-3">💻</div>
                    <h4 class="vintage-header">Seminar Online</h4>
                    <p>Ikuti seminar dari mana saja dengan koneksi Zoom yang stabil</p>
                </div>
            </div>
            <div class="col-md-4 text-center mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="vintage-card p-4 h-100">
                    <div class="display-4 mb-3">🚀</div>
                    <h4 class="vintage-header">Mudah Digunakan</h4>
                    <p>Antarmuka yang intuitif dan proses pendaftaran yang sederhana</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection