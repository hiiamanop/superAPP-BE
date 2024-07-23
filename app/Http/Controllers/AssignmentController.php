<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::all();
        return view('assignments.index', compact('assignments'));
    }

    public function create()
    {
        return view('assignments.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mapel_id' => 'required|exists:mata_pelajarans,id',
            'jenis_penilaian_id' => 'required|exists:jenis_penilaians,id',
            'code_assignment' => 'required|string|max:255',
        ]);

        Assignment::create($validatedData);

        return redirect()->route('assignments.index')->with('success', 'Assignment created successfully');
    }

    public function show(Assignment $assignment)
    {
        return view('assignments.show', compact('assignment'));
    }

    public function edit(Assignment $assignment)
    {
        return view('assignments.edit', compact('assignment'));
    }

    public function update(Request $request, Assignment $assignment)
    {
        $validatedData = $request->validate([
            'mapel_id' => 'required|exists:mata_pelajarans,id',
            'jenis_penilaian_id' => 'required|exists:jenis_penilaians,id',
            'code_assignment' => 'required|string|max:255',
        ]);

        $assignment->update($validatedData);

        return redirect()->route('assignments.index')->with('success', 'Assignment updated successfully');
    }

    public function destroy(Assignment $assignment)
    {
        $assignment->delete();
        return redirect()->route('assignments.index')->with('success', 'Assignment deleted successfully');
    }
}