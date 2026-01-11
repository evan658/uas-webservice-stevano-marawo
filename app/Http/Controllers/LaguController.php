<?php

namespace App\Http\Controllers;

use App\Models\Lagu;
use Illuminate\Http\Request;

class LaguController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lagus = Lagu::all();
        return view('lagu.index', compact('lagus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lagu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penyanyi' => 'required',
            'album' => 'nullable',
            'tahun' => 'nullable|digits:4'
        ]);

        Lagu::create($request->all());

        return redirect()->route('lagu.index')
            ->with('success', 'Data lagu berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lagu $lagu)
    {
        return view('lagu.edit', compact('lagu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lagu $lagu)
    {
        $request->validate([
            'judul' => 'required',
            'penyanyi' => 'required',
            'album' => 'nullable',
            'tahun' => 'nullable|digits:4'
        ]);

        $lagu->update($request->all());

        return redirect()->route('lagu.index')
            ->with('success', 'Data lagu berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lagu $lagu)
    {
        $lagu->delete();

        return redirect()->route('lagu.index')
            ->with('success', 'Data lagu berhasil dihapus');
    }
}
