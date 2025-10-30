@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan - BincangKlasik')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="vintage-card p-5" data-aos="fade-up">
                <div class="display-1 text-muted mb-4">🔍</div>
                <h1 class="vintage-header display-4">404</h1>
                <h3 class="mb-4">Halaman Tidak Ditemukan</h3>
                <p class="text-muted mb-4">Maaf, halaman yang Anda cari tidak dapat ditemukan.</p>
                <div class="d-flex gap-2 justify-content-center flex-wrap">
                    <a href="{{ route('home') }}" class="btn btn-vintage">🏠 Kembali ke Beranda</a>
                    <a href="javascript:history.back()" class="btn btn-vintage-outline">↩️ Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection