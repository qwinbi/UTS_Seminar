@extends('layouts.app')

@section('title', 'Dashboard Guest - BincangKlasik')

@section('content')
<div class="container py-5">
    <!-- Welcome Section -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="vintage-card p-4" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="vintage-header">👋 Selamat Datang, {{ auth()->user()->name }}!</h1>
                        <p class="lead mb-0">Mari jelajahi seminar menarik yang tersedia untuk Anda</p>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="stat-card">
                            <h3>{{ auth()->user()->registrations->count() }}</h3>
                            <p class="mb-0">Seminar Terdaftar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Available Seminars -->
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="vintage-header mb-4" data-aos="fade-up">🎯 Seminar Tersedia</h2>
        </div>
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
                    <p class="mb-3">{{ Str::limit($seminar->description, 100) }}</p>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('guest.seminar.show', $seminar) }}" class="btn btn-vintage btn-sm">Lihat Detail & Daftar</a>
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
                <h3 class="vintage-header">Tidak Ada Seminar Tersedia</h3>
                <p class="text-muted">Saat ini belum ada seminar yang tersedia. Silakan kembali lagi nanti.</p>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Quick Actions -->
    <div class="row mt-5">
        <div class="col-md-6 mb-3" data-aos="fade-up">
            <div class="vintage-card p-4 text-center h-100">
                <div class="display-4 mb-3">📝</div>
                <h4 class="vintage-header">Pendaftaran Saya</h4>
                <p class="mb-3">Lihat semua seminar yang sudah Anda daftar</p>
                <a href="{{ route('guest.my-registrations') }}" class="btn btn-vintage">Lihat Pendaftaran</a>
            </div>
        </div>
        <div class="col-md-6 mb-3" data-aos="fade-up" data-aos-delay="100">
            <div class="vintage-card p-4 text-center h-100">
                <div class="display-4 mb-3">👤</div>
                <h4 class="vintage-header">Profil Saya</h4>
                <p class="mb-3">Informasi akun dan data pribadi Anda</p>
                <div class="small">
                    <strong>Nama:</strong> {{ auth()->user()->name }}<br>
                    <strong>Email:</strong> {{ auth()->user()->email }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection