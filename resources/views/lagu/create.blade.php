@extends('layouts.app')

@section('title', 'Tambah Lagu')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">🎵 Tambah Lagu</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('lagu.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Judul Lagu</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Penyanyi</label>
                        <input type="text" name="penyanyi" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Album</label>
                        <input type="text" name="album" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tahun</label>
                        <input type="number" name="tahun" class="form-control">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('lagu.index') }}" class="btn btn-secondary">⬅ Kembali</a>
                        <button class="btn btn-primary">💾 Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
