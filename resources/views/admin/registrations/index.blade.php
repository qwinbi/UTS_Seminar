@extends('layouts.app')

@section('title', 'Kelola Pendaftaran - BincangKlasik')

@section('content')
<div class="container py-5">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="vintage-header" data-aos="fade-up">📋 Kelola Pendaftaran Seminar</h1>
            <p class="text-muted" data-aos="fade-up" data-aos-delay="100">Lihat dan kelola semua pendaftaran seminar dari peserta</p>
        </div>
    </div>

    <!-- Registrations List -->
    <div class="row">
        <div class="col-12">
            @if($registrations->count() > 0)
            <div class="vintage-card p-4" data-aos="fade-up">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Peserta</th>
                                <th>Seminar</th>
                                <th>Email</th>
                                <th>Catatan</th>
                                <th>Tanggal Daftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registrations as $registration)
                            <tr data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong>{{ $registration->user->name }}</strong>
                                </td>
                                <td>
                                    <strong>{{ $registration->seminar->title }}</strong><br>
                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($registration->seminar->date)->format('d M Y, H:i') }}
                                    </small>
                                </td>
                                <td>{{ $registration->user->email }}</td>
                                <td>
                                    @if($registration->note)
                                    <span title="{{ $registration->note }}">
                                        {{ Str::limit($registration->note, 30) }}
                                    </span>
                                    @else
                                    <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($registration->created_at)->format('d M Y') }}<br>
                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($registration->created_at)->format('H:i') }}
                                    </small>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('admin.registrations.destroy', $registration) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus pendaftaran ini?')">
                                            🗑️ Hapus
                                        </button>
                                    </form>
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
                <h3 class="vintage-header">Belum Ada Pendaftaran</h3>
                <p class="text-muted">Belum ada peserta yang mendaftar seminar.</p>
            </div>
            @endif
        </div>
    </div>

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
                <h3>{{ $registrations->unique('user_id')->count() }}</h3>
                <p class="mb-0">Peserta Unik</p>
            </div>
        </div>
        <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="200">
            <div class="stat-card text-center">
                <h3>{{ $registrations->unique('seminar_id')->count() }}</h3>
                <p class="mb-0">Seminar Terdaftar</p>
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