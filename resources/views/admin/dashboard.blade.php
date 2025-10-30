@extends('layouts.app')

@section('title', 'Dashboard Admin - BincangKlasik')

@section('content')
<div class="container py-5">
    <!-- Welcome Section -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="vintage-card p-4" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="vintage-header">👑 Dashboard Administrator</h1>
                        <p class="lead mb-0">Selamat datang, {{ auth()->user()->name }}! Kelola website BincangKlasik dengan mudah.</p>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="stat-card">
                            <h3>{{ $stats['seminars'] }}</h3>
                            <p class="mb-0">Total Seminar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-5">
        <div class="col-md-4 mb-3" data-aos="fade-up">
            <div class="vintage-card p-4 text-center h-100">
                <div class="display-4 text-primary mb-3">📚</div>
                <h3>{{ $stats['seminars'] }}</h3>
                <p class="mb-3">Seminar</p>
                <a href="{{ route('admin.seminars') }}" class="btn btn-vintage btn-sm">Kelola Seminar</a>
            </div>
        </div>
        <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="100">
            <div class="vintage-card p-4 text-center h-100">
                <div class="display-4 text-success mb-3">👥</div>
                <h3>{{ $stats['registrations'] }}</h3>
                <p class="mb-3">Pendaftaran</p>
                <a href="{{ route('admin.registrations') }}" class="btn btn-vintage btn-sm">Lihat Pendaftaran</a>
            </div>
        </div>
        <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="200">
            <div class="vintage-card p-4 text-center h-100">
                <div class="display-4 text-warning mb-3">🔐</div>
                <h3>{{ $stats['users'] }}</h3>
                <p class="mb-3">Pengguna Guest</p>
                <span class="badge bg-success">Sistem</span>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-12 mb-4">
            <h2 class="vintage-header" data-aos="fade-up">⚡ Aksi Cepat</h2>
        </div>
        
        <div class="col-md-3 mb-3" data-aos="fade-up">
            <div class="vintage-card p-4 text-center h-100">
                <div class="display-4 mb-3">➕</div>
                <h5 class="vintage-header">Tambah Seminar</h5>
                <p class="mb-3">Buat seminar baru</p>
                <a href="{{ route('admin.seminars.create') }}" class="btn btn-vintage btn-sm w-100">Buat Baru</a>
            </div>
        </div>
        
        <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="100">
            <div class="vintage-card p-4 text-center h-100">
                <div class="display-4 mb-3">📋</div>
                <h5 class="vintage-header">Lihat Pendaftaran</h5>
                <p class="mb-3">Kelola pendaftaran seminar</p>
                <a href="{{ route('admin.registrations') }}" class="btn btn-vintage btn-sm w-100">Lihat Semua</a>
            </div>
        </div>
        
        <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="200">
            <div class="vintage-card p-4 text-center h-100">
                <div class="display-4 mb-3">👤</div>
                <h5 class="vintage-header">Data About</h5>
                <p class="mb-3">Edit profil developer</p>
                <a href="{{ route('admin.about') }}" class="btn btn-vintage btn-sm w-100">Edit About</a>
            </div>
        </div>
        
        <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="300">
            <div class="vintage-card p-4 text-center h-100">
                <div class="display-4 mb-3">🏠</div>
                <h5 class="vintage-header">Halaman Utama</h5>
                <p class="mb-3">Kunjungi website</p>
                <a href="{{ route('home') }}" class="btn btn-vintage-outline btn-sm w-100" target="_blank">Lihat Website</a>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="vintage-card p-4" data-aos="fade-up">
                <h4 class="vintage-header mb-4">📊 Aktivitas Terkini</h4>
                <div class="row text-center">
                    <div class="col-md-3">
                        <div class="p-3">
                            <div class="display-6 text-primary">✅</div>
                            <h5>Sistem Aktif</h5>
                            <p class="text-muted">Semua fitur berjalan normal</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3">
                            <div class="display-6 text-success">🔒</div>
                            <h5>Keamanan</h5>
                            <p class="text-muted">Authentication aktif</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3">
                            <div class="display-6 text-warning">💾</div>
                            <h5>Database</h5>
                            <p class="text-muted">MySQL connected</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3">
                            <div class="display-6 text-info">📁</div>
                            <h5>Storage</h5>
                            <p class="text-muted">Upload aktif</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection