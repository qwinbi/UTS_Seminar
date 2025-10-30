@extends('layouts.app')

@section('title', 'Pendaftaran Saya - BincangKlasik')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="vintage-header" data-aos="fade-up">📋 Pendaftaran Seminar Saya</h1>
                <a href="{{ route('guest.dashboard') }}" class="btn btn-vintage-outline" data-aos="fade-up">Kembali ke Dashboard</a>
            </div>
        </div>
    </div>

    @if($registrations->count() > 0)
    <div class="row">
        @foreach($registrations as $registration)
        <div class="col-12 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
            <div class="vintage-card p-4">
                <div class="row align-items-center">
                    <div class="col-md-2 text-center">
                        @if($registration->seminar->image)
                        <img src="{{ asset('storage/' . $registration->seminar->image) }}" class="img-fluid rounded" alt="{{ $registration->seminar->title }}" style="width: 100px; height: 100px; object-fit: cover;">
                        @else
                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                            <span class="text-muted">📷</span>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <h5 class="vintage-header mb-2">{{ $registration->seminar->title }}</h5>
                        <p class="text-muted mb-1">
                            <strong>📅:</strong> {{ \Carbon\Carbon::parse($registration->seminar->date)->format('d M Y, H:i') }}
                        </p>
                        <p class="text-muted mb-1">
                            <strong>🔗 Zoom:</strong> 
                            <a href="{{ $registration->seminar->zoom_link }}" target="_blank" class="text-decoration-none">Join Meeting</a>
                        </p>
                        @if($registration->note)
                        <p class="mb-0">
                            <strong>📝 Catatan:</strong> {{ $registration->note }}
                        </p>
                        @endif
                    </div>
                    <div class="col-md-2 text-center">
                        @if($registration->seminar->date > now())
                        <span class="badge bg-success">Akan Datang</span>
                        @else
                        <span class="badge bg-secondary">Selesai</span>
                        @endif
                    </div>
                    <div class="col-md-2 text-end">
                        <small class="text-muted">
                            Didaftar pada:<br>
                            {{ \Carbon\Carbon::parse($registration->created_at)->format('d M Y') }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="row">
        <div class="col-12" data-aos="fade-up">
            <div class="vintage-card text-center p-5">
                <div class="display-1 mb-3">📭</div>
                <h3 class="vintage-header">Belum Ada Pendaftaran</h3>
                <p class="text-muted mb-4">Anda belum mendaftar pada seminar apapun. Yuk, daftar seminar pertama Anda!</p>
                <a href="{{ route('guest.dashboard') }}" class="btn btn-vintage">Jelajahi Seminar</a>
            </div>
        </div>
    </div>
    @endif

    <!-- Statistics -->
    @if($registrations->count() > 0)
    <div class="row mt-5">
        <div class="col-md-3 mb-3" data-aos="fade-up">
            <div class="stat-card text-center">
                <h3>{{ $registrations->count() }}</h3>
                <p class="mb-0">Total Pendaftaran</p>
            </div>
        </div>
        <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="100">
            <div class="stat-card text-center">
                <h3>{{ $registrations->where('seminar.date', '>', now())->count() }}</h3>
                <p class="mb-0">Akan Datang</p>
            </div>
        </div>
        <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="200">
            <div class="stat-card text-center">
                <h3>{{ $registrations->where('seminar.date', '<', now())->count() }}</h3>
                <p class="mb-0">Selesai</p>
            </div>
        </div>
        <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="300">
            <div class="stat-card text-center">
                <h3>{{ $registrations->where('note', '!=', null)->count() }}</h3>
                <p class="mb-0">Dengan Catatan</p>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection