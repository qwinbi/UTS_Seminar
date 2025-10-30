@extends('layouts.app')

@section('title', 'Kelola About - BincangKlasik')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="vintage-card p-5" data-aos="fade-up">
                <div class="text-center mb-4">
                    <h1 class="vintage-header">👤 Kelola Data About</h1>
                    <p class="text-muted">Edit informasi developer yang ditampilkan di halaman about</p>
                </div>

                @if($about)
                <!-- Current Photo -->
                @if($about->photo)
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/' . $about->photo) }}" alt="{{ $about->name }}" 
                         class="profile-image rounded-circle">
                    <p class="text-muted mt-2">Foto saat ini</p>
                </div>
                @endif

                <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">👤 Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $about->name) }}" required 
                               placeholder="Masukkan nama lengkap">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="nim" class="form-label">🎓 NIM</label>
                        <input type="text" class="form-control @error('nim') is-invalid @enderror" 
                               id="nim" name="nim" value="{{ old('nim', $about->nim) }}" required 
                               placeholder="Masukkan NIM">
                        @error('nim')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">📝 Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="5" required 
                                  placeholder="Tulis deskripsi singkat tentang diri Anda">{{ old('description', $about->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="photo" class="form-label">🖼️ Foto Profil (Opsional)</label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" 
                               id="photo" name="photo" accept="image/*">
                        <div class="form-text">
                            @if($about->photo)
                            Biarkan kosong jika tidak ingin mengubah foto. 
                            @endif
                            Format: JPEG, PNG, JPG, GIF. Maksimal 2MB.
                        </div>
                        @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-vintage flex-fill py-2">💾 Simpan Perubahan</button>
                        <a href="{{ route('about') }}" target="_blank" class="btn btn-vintage-outline">👀 Lihat Halaman</a>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-vintage-outline">↩️ Kembali</a>
                    </div>
                </form>
                @else
                <div class="text-center py-4">
                    <div class="display-1 mb-3">📝</div>
                    <h4 class="vintage-header">Data About Belum Ada</h4>
                    <p class="text-muted mb-4">Silakan isi data about untuk pertama kali.</p>
                    
                    <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">👤 Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" required 
                                   placeholder="Masukkan nama lengkap" value="Syarifatul Azkiya Alganjari">
                        </div>
                        
                        <div class="mb-3">
                            <label for="nim" class="form-label">🎓 NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" required 
                                   placeholder="Masukkan NIM" value="241011701321">
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">📝 Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="5" required 
                                      placeholder="Tulis deskripsi singkat tentang diri Anda">Mahasiswa yang antusias dalam pengembangan web dan teknologi. Senang menciptakan pengalaman digital yang bermakna dan estetik.</textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label for="photo" class="form-label">🖼️ Foto Profil (Opsional)</label>
                            <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                            <div class="form-text">Format: JPEG, PNG, JPG, GIF. Maksimal 2MB.</div>
                        </div>
                        
                        <button type="submit" class="btn btn-vintage w-100 py-2">💾 Buat Data About</button>
                    </form>
                </div>
                @endif

                <!-- Preview Info -->
                <div class="mt-4 p-3 vintage-card" style="background: var(--cream);">
                    <h6 class="vintage-header mb-3">👀 Informasi Preview:</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Nama:</strong> {{ $about->name ?? 'Syarifatul Azkiya Alganjari' }}<br>
                            <strong>NIM:</strong> {{ $about->nim ?? '241011701321' }}
                        </div>
                        <div class="col-md-6">
                            <strong>Status:</strong> {{ $about ? 'Data Tersedia' : 'Data Baru' }}<br>
                            <strong>Update Terakhir:</strong> {{ $about ? $about->updated_at->format('d M Y') : 'Sekarang' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection