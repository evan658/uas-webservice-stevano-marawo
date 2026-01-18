@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">➕ Tambah Lagu</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('lagu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Judul Lagu -->
                    <div class="mb-3">
                        <label class="form-label">Judul Lagu</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>

                    <!-- Penyanyi -->
                    <div class="mb-3">
                        <label class="form-label">Penyanyi</label>
                        <input type="text" name="penyanyi" class="form-control" required>
                    </div>

                    <!-- Tahun -->
                    <div class="mb-3">
                        <label class="form-label">Tahun</label>
                        <input type="number" name="tahun" class="form-control" required>
                    </div>

                    <!-- File Lagu -->
                    <div class="mb-4">
                        <label class="form-label">File Lagu (MP3)</label>
                        <input type="file" name="file_audio" class="form-control" accept=".mp3" required>
                    </div>

                    <!-- Tombol -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                            ← Batal
                        </a>

                        <button type="submit" class="btn btn-success">
                            💾 Simpan
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection
