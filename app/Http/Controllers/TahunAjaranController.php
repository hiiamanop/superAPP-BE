<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    public function index()
    {
        $tahunAjarans = TahunAjaran::all();
        return view('tahun_ajarans.index', compact('tahunAjarans'));
    }

    public function create()
    {
        return view('tahun_ajarans.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tahun_ajaran' => 'required|string|max:255|unique:tahun_ajarans',
        ]);

        TahunAjaran::create($validatedData);

        return redirect()->route('tahun_ajarans.index')->with('success', 'Tahun Ajaran created successfully');
    }

    public function show(TahunAjaran $tahunAjaran)
    {
        return view('tahun_ajarans.show', compact('tahunAjaran'));
    }

    public function edit(TahunAjaran $tahunAjaran)
    {
        return view('tahun_ajarans.edit', compact('tahunAjaran'));
    }

    public function update(Request $request, TahunAjaran $tahunAjaran)
    {
        $validatedData = $request->validate([
            'tahun_ajaran' => 'required|string|max:255|unique:tahun_ajarans,tahun_ajaran,' . $tahunAjaran->id,
        ]);

        $tahunAjaran->update($validatedData);

        return redirect()->route('tahun_ajarans.index')->with('success', 'Tahun Ajaran updated successfully');
    }

    public function destroy(TahunAjaran $tahunAjaran)
    {
        $tahunAjaran->delete();
        return redirect()->route('tahun_ajarans.index')->with('success', 'Tahun Ajaran deleted successfully');
    }
}