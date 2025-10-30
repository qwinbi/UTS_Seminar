@extends('layouts.app')

@section('title', $seminar->title . ' - BincangKlasik')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <div class="vintage-card p-4 mb-4" data-aos="fade-up">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('guest.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('seminars') }}">Seminar</a></li>
                        <li class="breadcrumb-item active">{{ Str::limit($seminar->title, 30) }}</li>
                    </ol>
                </nav>

                @if($seminar->image)
                <img src="{{ asset('storage/' . $seminar->image) }}" class="img-fluid rounded mb-4" alt="{{ $seminar->title }}" style="width: 100%; height: 300px; object-fit: cover;">
                @endif

                <h1 class="vintage-header mb-3">{{ $seminar->title }}</h1>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-2">
                            <span class="me-2">📅</span>
                            <strong>Tanggal & Waktu:</strong>
                        </div>
                        <p class="ms-4">{{ \Carbon\Carbon::parse($seminar->date)->format('d F Y, H:i') }}</p>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-2">
                            <span class="me-2">🔗</span>
                            <strong>Link Zoom:</strong>
                        </div>
                        <p class="ms-4">
                            <a href="{{ $seminar->zoom_link }}" target="_blank" class="text-decoration-none">
                                Join Zoom Meeting
                            </a>
                        </p>
                    </div>
                </div>

                <div class="mb-4">
                    <h4 class="vintage-header">📖 Deskripsi Seminar</h4>
                    <p class="mb-0">{{ $seminar->description }}</p>
                </div>

                <div class="alert alert-info vintage-card">
                    <div class="d-flex align-items-center">
                        <span class="me-3">💡</span>
                        <div>
                            <strong>Informasi Penting:</strong>
                            <p class="mb-0">Pastikan Anda telah menginstal aplikasi Zoom dan memiliki koneksi internet yang stabil sebelum seminar dimulai.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <!-- Registration Form -->
            <div class="vintage-card p-4" data-aos="fade-up" data-aos-delay="200">
                <h4 class="vintage-header text-center mb-4">📝 Pendaftaran Seminar</h4>

                @if($isRegistered)
                <div class="text-center">
                    <div class="display-1 text-success mb-3">✅</div>
                    <h5 class="vintage-header">Anda Sudah Terdaftar!</h5>
                    <p class="text-muted mb-4">Anda telah berhasil mendaftar pada seminar ini.</p>
                    <a href="{{ route('guest.my-registrations') }}" class="btn btn-vintage">Lihat Pendaftaran Saya</a>
                </div>
                @else
                <form method="POST" action="{{ route('guest.seminar.register', $seminar) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label for="seminar" class="form-label">Seminar</label>
                        <input type="text" class="form-control" value="{{ $seminar->title }}" readonly>
                    </div>
                    
                    <div class="mb-4">
                        <label for="note" class="form-label">Catatan Tambahan (Opsional)</label>
                        <textarea class="form-control" id="note" name="note" rows="3" placeholder="Masukkan catatan atau pertanyaan Anda...">{{ old('note') }}</textarea>
                        <div class="form-text">Maksimal 500 karakter.</div>
                    </div>
                    
                    <button type="submit" class="btn btn-vintage w-100 py-2">🎯 Daftar Sekarang</button>
                </form>
                @endif

                <hr class="my-4">

                <div class="text-center">
                    <small class="text-muted">
                        📞 Butuh bantuan?<br>
                        Hubungi administrator untuk pertanyaan lebih lanjut.
                    </small>
                </div>
            </div>

            <!-- Quick Info -->
            <div class="vintage-card p-3 mt-3" data-aos="fade-up" data-aos-delay="300">
                <div class="d-flex align-items-center mb-2">
                    <span class="me-2">⏰</span>
                    <strong>Status:</strong>
                </div>
                <p class="ms-4 mb-2">
                    @if($seminar->date > now())
                    <span class="badge bg-success">Akan Datang</span>
                    @else
                    <span class="badge bg-secondary">Selesai</span>
                    @endif
                </p>

                <div class="d-flex align-items-center mb-2">
                    <span class="me-2">👥</span>
                    <strong>Peserta Terdaftar:</strong>
                </div>
                <p class="ms-4 mb-0">{{ $seminar->registrations->count() }} orang</p>
            </div>
        </div>
    </div>
</div>
@endsection