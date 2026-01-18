<?php

namespace App\Http\Controllers;

use App\Models\Lagu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaguController extends Controller
{
    public function index()
    {
        $lagus = Lagu::latest()->paginate(5);
        return view('lagu.index', compact('lagus'));
    }

    public function create()
    {
        return view('lagu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penyanyi' => 'required|string|max:255',
            'tahun' => 'required|numeric',
            'file_audio' => 'nullable|mimes:mp3,wav|max:10240',
        ]);

        $filePath = null;

        if ($request->hasFile('file_audio')) {
            $filePath = $request->file('file_audio')->store('lagu', 'public');
        }

        Lagu::create([
            'judul' => $request->judul,
            'penyanyi' => $request->penyanyi,
            'tahun' => $request->tahun,
            'file_audio' => $filePath,
        ]);

        return redirect()->route('lagu.index')
            ->with('success', 'Lagu berhasil ditambahkan');
    }

    public function edit(Lagu $lagu)
    {
        return view('lagu.edit', compact('lagu'));
    }

    public function update(Request $request, Lagu $lagu)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penyanyi' => 'required|string|max:255',
            'tahun' => 'required|numeric',
        ]);

        $lagu->update($request->only('judul', 'penyanyi', 'tahun'));

        return redirect()->route('lagu.index')
            ->with('success', 'Lagu berhasil diupdate');
    }

    public function destroy(Lagu $lagu)
    {
        if ($lagu->file_audio) {
            Storage::disk('public')->delete($lagu->file_audio);
        }

        $lagu->delete();

        return redirect()->route('lagu.index')
            ->with('success', 'Lagu berhasil dihapus');
    }
}
