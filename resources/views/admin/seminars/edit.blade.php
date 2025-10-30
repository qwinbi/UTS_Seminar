@extends('layouts.app')

@section('title', 'Edit Seminar - BincangKlasik')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="vintage-card p-5" data-aos="fade-up">
                <div class="text-center mb-4">
                    <h1 class="vintage-header">✏️ Edit Seminar</h1>
                    <p class="text-muted">Perbarui informasi seminar</p>
                </div>

                @if($seminar->image)
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/' . $seminar->image) }}" alt="{{ $seminar->title }}" 
                         class="img-fluid rounded" style="max-height: 200px;">
                    <p class="text-muted mt-2">Gambar saat ini</p>
                </div>
                @endif

                <form method="POST" action="{{ route('admin.seminars.update', $seminar) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">📝 Judul Seminar</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title', $seminar->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">📖 Deskripsi Seminar</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="4" required>{{ old('description', $seminar->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="date" class="form-label">📅 Tanggal & Waktu</label>
                            <input type="datetime-local" class="form-control @error('date') is-invalid @enderror" 
                                   id="date" name="date" value="{{ old('date', $seminar->date->format('Y-m-d\TH:i')) }}" required>
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="zoom_link" class="form-label">🔗 Link Zoom Meeting</label>
                            <input type="url" class="form-control @error('zoom_link') is-invalid @enderror" 
                                   id="zoom_link" name="zoom_link" value="{{ old('zoom_link', $seminar->zoom_link) }}" required>
                            @error('zoom_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="image" class="form-label">🖼️ Gambar Seminar Baru (Opsional)</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                               id="image" name="image" accept="image/*">
                        <div class="form-text">
                            Biarkan kosong jika tidak ingin mengubah gambar. 
                            Format: JPEG, PNG, JPG, GIF. Maksimal 2MB.
                        </div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-vintage flex-fill py-2">💾 Update Seminar</button>
                        <a href="{{ route('admin.seminars') }}" class="btn btn-vintage-outline">↩️ Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection