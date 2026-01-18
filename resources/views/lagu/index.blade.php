@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-semibold mb-0">🎶 Data Lagu</h4>

            <a href="{{ route('lagu.create') }}" class="btn btn-primary">
                + Tambah Lagu
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle table-hover">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Penyanyi</th>
                        <th>Tahun</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lagus as $lagu)
                        <tr>
                            <td>{{ $lagu->judul }}</td>
                            <td>{{ $lagu->penyanyi }}</td>
                            <td>{{ $lagu->tahun }}</td>
                            <td class="text-center">
                                @if($lagu->file_audio)
                                    <audio controls style="width: 200px;">
                                        <source src="{{ asset('storage/' . $lagu->file_audio) }}">
                                    </audio>
                                    <br>
                                @endif

                                <a href="{{ route('lagu.edit', $lagu->id) }}" class="btn btn-warning btn-sm mt-2">
                                    Edit
                                </a>

                                <form action="{{ route('lagu.destroy', $lagu->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm mt-2"
                                        onclick="return confirm('Hapus lagu ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                Belum ada data lagu
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $lagus->links('pagination::bootstrap-5') }}
        </div>

    </div>
</div>
@endsection
