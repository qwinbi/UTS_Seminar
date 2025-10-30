@extends('layouts.app')

@section('title', 'Seminar - BincangKlasik')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5" data-aos="fade-up">
        <h1 class="vintage-header display-4">📚 Daftar Seminar</h1>
        <p class="lead">Temukan seminar menarik yang sesuai dengan minat Anda</p>
    </div>

    <div class="row">
        @forelse($seminars as $seminar)
        <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
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
                    <p class="text-muted mb-2">
                        <strong>📅:</strong> {{ \Carbon\Carbon::parse($seminar->date)->format('d M Y, H:i') }}
                    </p>
                    <p class="mb-3">{{ Str::limit($seminar->description, 120) }}</p>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        @auth
                            @if(auth()->user()->isGuest())
                            <a href="{{ route('guest.seminar.show', $seminar) }}" class="btn btn-vintage btn-sm">Daftar Seminar</a>
                            @else
                            <span class="badge bg-success">Admin</span>
                            @endif
                        @else
                        <a href="{{ route('login') }}" class="btn btn-vintage-outline btn-sm">Login untuk Daftar</a>
                        @endauth
                        
                        <small class="text-muted">
                            {{ $seminar->date > now() ? '🔜 Akan datang' : '✅ Selesai' }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12" data-aos="fade-up">
            <div class="vintage-card text-center p-5">
                <div class="display-1 mb-3">📭</div>
                <h3 class="vintage-header">Belum Ada Seminar</h3>
                <p class="text-muted mb-4">Saat ini belum ada seminar yang tersedia. Silakan kembali lagi nanti.</p>
                <a href="{{ route('home') }}" class="btn btn-vintage">Kembali ke Beranda</a>
            </div>
        </div>
        @endforelse
    </div>

    @auth
        @if(auth()->user()->isGuest())
        <div class="text-center mt-5" data-aos="fade-up">
            <div class="vintage-card p-4">
                <h4 class="vintage-header mb-3">📋 Pendaftaran Saya</h4>
                <p>Lihat semua seminar yang sudah Anda daftar</p>
                <a href="{{ route('guest.my-registrations') }}" class="btn btn-vintage">Lihat Pendaftaran Saya</a>
            </div>
        </div>
        @endif
    @endauth
</div>
@endsection