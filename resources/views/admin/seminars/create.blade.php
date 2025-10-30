@extends('layouts.app')

@section('title', 'Tambah Seminar - BincangKlasik')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="vintage-card p-5" data-aos="fade-up">
                <div class="text-center mb-4">
                    <h1 class="vintage-header">➕ Tambah Seminar Baru</h1>
                    <p class="text-muted">Isi formulir berikut untuk membuat seminar baru</p>
                </div>

                <form method="POST" action="{{ route('admin.seminars.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">📝 Judul Seminar</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title') }}" required 
                               placeholder="Masukkan judul seminar yang menarik">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">📖 Deskripsi Seminar</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="4" required 
                                  placeholder="Jelaskan detail tentang seminar ini">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="date" class="form-label">📅 Tanggal & Waktu</label>
                            <input type="datetime-local" class="form-control @error('date') is-invalid @enderror" 
                                   id="date" name="date" value="{{ old('date') }}" required>
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="zoom_link" class="form-label">🔗 Link Zoom Meeting</label>
                            <input type="url" class="form-control @error('zoom_link') is-invalid @enderror" 
                                   id="zoom_link" name="zoom_link" value="{{ old('zoom_link') }}" required 
                                   placeholder="https://zoom.us/j/...">
                            @error('zoom_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="image" class="form-label">🖼️ Gambar Seminar (Opsional)</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                               id="image" name="image" accept="image/*">
                        <div class="form-text">Format: JPEG, PNG, JPG, GIF. Maksimal 2MB.</div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-vintage flex-fill py-2">💾 Simpan Seminar</button>
                        <a href="{{ route('admin.seminars') }}" class="btn btn-vintage-outline">↩️ Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Set min datetime to current time
    document.getElementById('date').min = new Date().toISOString().slice(0, 16);
</script>
@endpush
@endsection