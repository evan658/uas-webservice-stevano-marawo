@extends('layouts.app')

@section('title', 'Data Lagu')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold">🎵 Data Lagu</h3>
    <a href="{{ route('lagu.create') }}" class="btn btn-primary">
        + Tambah Lagu
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body">

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penyanyi</th>
                    <th>Album</th>
                    <th>Tahun</th>
                    <th width="18%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lagus as $index => $lagu)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $lagu->judul }}</td>
                        <td>{{ $lagu->penyanyi }}</td>
                        <td>{{ $lagu->album ?? '-' }}</td>
                        <td class="text-center">{{ $lagu->tahun ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('lagu.edit', $lagu->id) }}"
                               class="btn btn-sm btn-warning text-dark">
                                ✏️ Edit
                            </a>

                            <form action="{{ route('lagu.destroy', $lagu->id) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus lagu ini?')">
                                    🗑 Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Data lagu belum tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection
