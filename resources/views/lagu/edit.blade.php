@extends('layouts.app')

@section('title', 'Edit Lagu')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">✏️ Edit Lagu</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('lagu.update', $lagu->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Judul Lagu</label>
                        <input type="text" name="judul" value="{{ $lagu->judul }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Penyanyi</label>
                        <input type="text" name="penyanyi" value="{{ $lagu->penyanyi }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Album</label>
                        <input type="text" name="album" value="{{ $lagu->album }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tahun</label>
                        <input type="number" name="tahun" value="{{ $lagu->tahun }}" class="form-control">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('lagu.index') }}" class="btn btn-secondary">⬅ Kembali</a>
                        <button class="btn btn-warning text-dark">💾 Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
