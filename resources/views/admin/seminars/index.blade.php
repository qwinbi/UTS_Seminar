@extends('layouts.app')

@section('title', 'Kelola Seminar - BincangKlasik')

@section('content')
<div class="container py-5">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="vintage-header" data-aos="fade-up">📚 Kelola Seminar</h1>
                <a href="{{ route('admin.seminars.create') }}" class="btn btn-vintage" data-aos="fade-up">
                    ➕ Tambah Seminar
                </a>
            </div>
        </div>
    </div>

    <!-- Seminars List -->
    <div class="row">
        <div class="col-12">
            @if($seminars->count() > 0)
            <div class="vintage-card p-4" data-aos="fade-up">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Judul Seminar</th>
                                <th>Tanggal</th>
                                <th>Link Zoom</th>
                                <th>Pendaftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($seminars as $seminar)
                            <tr data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                                <td>
                                    @if($seminar->image)
                                    <img src="{{ asset('storage/' . $seminar->image) }}" alt="{{ $seminar->title }}" 
                                         style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                                    @else
                                    <div style="width: 60px; height: 60px; background: #f8f9fa; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                        <span class="text-muted">📷</span>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $seminar->title }}</strong><br>
                                    <small class="text-muted">{{ Str::limit($seminar->description, 50) }}</small>
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($seminar->date)->format('d M Y, H:i') }}<br>
                                    <small class="{{ $seminar->date > now() ? 'text-success' : 'text-secondary' }}">
                                        {{ $seminar->date > now() ? '🔜 Akan datang' : '✅ Selesai' }}
                                    </small>
                                </td>
                                <td>
                                    <a href="{{ $seminar->zoom_link }}" target="_blank" class="text-decoration-none">
                                        Join Zoom
                                    </a>
                                </td>
                                <td>
                                    <span class="badge bg-primary">{{ $seminar->registrations->count() }} orang</span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.seminars.edit', $seminar) }}" class="btn btn-outline-primary">✏️ Edit</a>
                                        <form method="POST" action="{{ route('admin.seminars.destroy', $seminar) }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" 
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus seminar ini?')">
                                                🗑️ Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="vintage-card text-center p-5" data-aos="fade-up">
                <div class="display-1 mb-3">📭</div>
                <h3 class="vintage-header">Belum Ada Seminar</h3>
                <p class="text-muted mb-4">Mulai dengan membuat seminar pertama Anda.</p>
                <a href="{{ route('admin.seminars.create') }}" class="btn btn-vintage">➕ Buat Seminar Pertama</a>
            </div>
            @endif
        </div>
    </div>

    <!-- Statistics -->
    @if($seminars->count() > 0)
    <div class="row mt-5">
        <div class="col-md-3 mb-3" data-aos="fade-up">
            <div class="stat-card text-center">
                <h3>{{ $seminars->count() }}</h3>
                <p class="mb-0">Total Seminar</p>
            </div>
        </div>
        <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="100">
            <div class="stat-card text-center">
                <h3>{{ $seminars->where('date', '>', now())->count() }}</h3>
                <p class="mb-0">Akan Datang</p>
            </div>
        </div>
        <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="200">
            <div class="stat-card text-center">
                <h3>{{ $seminars->where('date', '<', now())->count() }}</h3>
                <p class="mb-0">Selesai</p>
            </div>
        </div>
        <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="300">
            <div class="stat-card text-center">
                <h3>{{ $seminars->sum(function($seminar) { return $seminar->registrations->count(); }) }}</h3>
                <p class="mb-0">Total Pendaftar</p>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection