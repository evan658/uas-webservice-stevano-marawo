@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">🎵 Daftar Lagu</h3>

    <a href="{{ route('lagu.create') }}" class="btn btn-primary mb-3">+ Tambah Lagu</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Penyanyi</th>
                <th>Audio</th>
                <th width="160">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lagu as $item)
                <tr>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->penyanyi }}</td>
                    <td>
                        @if($item->file_audio)
                            <audio controls>
                                <source src="{{ asset('storage/'.$item->file_audio) }}">
                            </audio>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('lagu.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('lagu.destroy', $item) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus lagu?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Data lagu kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $lagu->links() }}
</div>
@endsection
