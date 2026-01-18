@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card">
            <div class="card-body">

                <h4 class="fw-semibold mb-4">✏️ Edit Lagu</h4>

                <form action="{{ route('lagu.update', $lagu->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Judul -->
                    <div class="mb-3">
                        <label class="form-label fw-medium">Judul Lagu</label>
                        <input
                            type="text"
                            name="judul"
                            class="form-control"
                            value="{{ old('judul', $lagu->judul) }}"
                            required
                        >
                    </div>

                    <!-- Penyanyi -->
                    <div class="mb-3">
                        <label class="form-label fw-medium">Penyanyi</label>
                        <input
                            type="text"
                            name="penyanyi"
                            class="form-control"
                            value="{{ old('penyanyi', $lagu->penyanyi) }}"
                            required
                        >
                    </div>

                    <!-- Tahun -->
                    <div class="mb-3">
                        <label class="form-label fw-medium">Tahun</label>
                        <input
                            type="number"
                            name="tahun"
                            class="form-control"
                            value="{{ old('tahun', $lagu->tahun) }}"
                            required
                        >
                    </div>

                    <!-- File -->
                    <div class="mb-4">
                        <label class="form-label fw-medium">Ganti File Lagu (MP3)</label>
                        <input type="file" name="file_audio" class="form-control">

                        @if($lagu->file_audio)
                            <small class="text-muted d-block mt-2">
                                File saat ini:
                            </small>
                            <audio controls class="mt-1" style="width: 100%">
                                <source src="{{ asset('storage/' . $lagu->file_audio) }}">
                            </audio>
                        @endif
                    </div>

                    <!-- Button -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('lagu.index') }}" class="btn btn-outline-secondary">
                            Kembali
                        </a>

                        <button class="btn btn-primary">
                            Update Lagu
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection
