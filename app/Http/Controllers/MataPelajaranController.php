<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    public function index()
    {
        $mataPelajarans = MataPelajaran::all();
        return view('mata_pelajarans.index', compact('mataPelajarans'));
    }

    public function create()
    {
        return view('mata_pelajarans.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'name_mapel' => 'required|string|max:255',
        ]);

        MataPelajaran::create($validatedData);

        return redirect()->route('mata_pelajarans.index')->with('success', 'Mata Pelajaran created successfully');
    }

    public function show(MataPelajaran $mataPelajaran)
    {
        return view('mata_pelajarans.show', compact('mataPelajaran'));
    }

    public function edit(MataPelajaran $mataPelajaran)
    {
        return view('mata_pelajarans.edit', compact('mataPelajaran'));
    }

    public function update(Request $request, MataPelajaran $mataPelajaran)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'name_mapel' => 'required|string|max:255',
        ]);

        $mataPelajaran->update($validatedData);

        return redirect()->route('mata_pelajarans.index')->with('success', 'Mata Pelajaran updated successfully');
    }

    public function destroy(MataPelajaran $mataPelajaran)
    {
        $mataPelajaran->delete();
        return redirect()->route('mata_pelajarans.index')->with('success', 'Mata Pelajaran deleted successfully');
    }
}