<?php

namespace App\Http\Controllers;

use App\Models\Lagu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaguController extends Controller
{
    public function index()
    {
        $lagu = Lagu::latest()->paginate(5);
        return view('lagu.index', compact('lagu'));
    }

    public function create()
    {
        return view('lagu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penyanyi' => 'required',
            'file_audio' => 'nullable|mimes:mp3,wav,ogg',
        ]);

        $filePath = null;
        if ($request->hasFile('file_audio')) {
            $filePath = $request->file('file_audio')->store('lagu', 'public');
        }

        Lagu::create([
            'judul' => $request->judul,
            'penyanyi' => $request->penyanyi,
            'file_audio' => $filePath,
        ]);

        return redirect()->route('lagu.index')->with('success', 'Lagu berhasil ditambahkan');
    }

    public function edit(Lagu $lagu)
    {
        return view('lagu.edit', compact('lagu'));
    }

    public function update(Request $request, Lagu $lagu)
    {
        $request->validate([
            'judul' => 'required',
            'penyanyi' => 'required',
            'file_audio' => 'nullable|mimes:mp3,wav,ogg',
        ]);

        if ($request->hasFile('file_audio')) {
            if ($lagu->file_audio) {
                Storage::disk('public')->delete($lagu->file_audio);
            }

            $lagu->file_audio = $request->file('file_audio')->store('lagu', 'public');
        }

        $lagu->update([
            'judul' => $request->judul,
            'penyanyi' => $request->penyanyi,
        ]);

        return redirect()->route('lagu.index')->with('success', 'Lagu berhasil diperbarui');
    }

    public function destroy(Lagu $lagu)
    {
        if ($lagu->file_audio) {
            Storage::disk('public')->delete($lagu->file_audio);
        }

        $lagu->delete();

        return back()->with('success', 'Lagu berhasil dihapus');
    }
}
