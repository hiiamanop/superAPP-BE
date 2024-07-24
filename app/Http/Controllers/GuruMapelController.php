<?php

namespace App\Http\Controllers;

use App\Models\GuruMapel;
use App\Models\User;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class GuruMapelController extends Controller
{
    public function index()
    {
        $guruMapels = GuruMapel::with(['guru', 'mataPelajaran'])->get();
        return view('guru_mapels.index', compact('guruMapels'));
    }

    public function create()
    {
        $gurus = User::where('role_id', 2)->get(); // Assuming role_id 2 is for teachers
        $mataPelajarans = MataPelajaran::all();
        return view('guru_mapels.create', compact('gurus', 'mataPelajarans'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'guru_id' => 'required|exists:users,id',
            'mapel_id' => 'required|exists:mata_pelajarans,id',
        ]);

        GuruMapel::create($validatedData);

        return redirect()->route('guru_mapels.index')->with('success', 'Guru Mapel created successfully');
    }

    public function show(GuruMapel $guruMapel)
    {
        return view('guru_mapels.show', compact('guruMapel'));
    }

    public function edit(GuruMapel $guruMapel)
    {
        $gurus = User::where('role_id', 2)->get();
        $mataPelajarans = MataPelajaran::all();
        return view('guru_mapels.edit', compact('guruMapel', 'gurus', 'mataPelajarans'));
    }

    public function update(Request $request, GuruMapel $guruMapel)
    {
        $validatedData = $request->validate([
            'guru_id' => 'required|exists:users,id',
            'mapel_id' => 'required|exists:mata_pelajarans,id',
        ]);

        $guruMapel->update($validatedData);

        return redirect()->route('guru_mapels.index')->with('success', 'Guru Mapel updated successfully');
    }

    public function destroy(GuruMapel $guruMapel)
    {
        $guruMapel->delete();
        return redirect()->route('guru_mapels.index')->with('success', 'Guru Mapel deleted successfully');
    }
}