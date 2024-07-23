<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'guru_id' => 'required|exists:users,id',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id',
            'grade' => 'required|string|max:255',
            'token_id' => 'required|exists:tokens,id',
        ]);

        Kelas::create($validatedData);

        return redirect()->route('kelas.index')->with('success', 'Kelas created successfully');
    }

    public function show(Kelas $kela)
    {
        return view('kelas.show', compact('kela'));
    }

    public function edit(Kelas $kela)
    {
        return view('kelas.edit', compact('kela'));
    }

    public function update(Request $request, Kelas $kela)
    {
        $validatedData = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'guru_id' => 'required|exists:users,id',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id',
            'grade' => 'required|string|max:255',
            'token_id' => 'required|exists:tokens,id',
        ]);

        $kela->update($validatedData);

        return redirect()->route('kelas.index')->with('success', 'Kelas updated successfully');
    }

    public function destroy(Kelas $kela)
    {
        $kela->delete();
        return redirect()->route('kelas.index')->with('success', 'Kelas deleted successfully');
    }
}