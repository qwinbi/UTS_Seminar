@extends('layouts.app')

@section('title', 'Akses Ditolak - BincangKlasik')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="vintage-card p-5" data-aos="fade-up">
                <div class="display-1 text-warning mb-4">🚫</div>
                <h1 class="vintage-header display-4">403</h1>
                <h3 class="mb-4">Akses Ditolak</h3>
                <p class="text-muted mb-4">Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.</p>
                <div class="d-flex gap-2 justify-content-center flex-wrap">
                    <a href="{{ route('home') }}" class="btn btn-vintage">🏠 Kembali ke Beranda</a>
                    <a href="javascript:history.back()" class="btn btn-vintage-outline">↩️ Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection