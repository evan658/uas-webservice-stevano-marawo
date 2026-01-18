@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white/5 backdrop-blur rounded-2xl shadow-xl p-8 border border-white/10">
    <h2 class="text-xl font-semibold mb-6">Tambah Lagu</h2>

    <form action="{{ route('lagu.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <div>
            <label class="block text-sm mb-1">Judul Lagu</label>
            <input type="text" name="judul"
                   class="w-full rounded-lg bg-black/40 border border-gray-600 px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-600">
        </div>

        <div>
            <label class="block text-sm mb-1">Penyanyi</label>
            <input type="text" name="penyanyi"
                   class="w-full rounded-lg bg-black/40 border border-gray-600 px-4 py-2">
        </div>

        <div>
            <label class="block text-sm mb-1">File Lagu</label>
            <input type="file" name="file_audio"
                   class="w-full text-sm text-gray-300">
        </div>

        <div class="flex justify-end space-x-3 pt-4">
            <a href="{{ route('lagu.index') }}"
               class="px-4 py-2 rounded bg-gray-600 hover:bg-gray-700 text-sm">
                Batal
            </a>
            <button class="px-5 py-2 rounded bg-indigo-600 hover:bg-indigo-700 text-sm font-semibold">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
