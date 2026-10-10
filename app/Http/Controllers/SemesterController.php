<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::where('user_id', auth()->id())
            ->orderBy('semester')
            ->get();

        return view('semesters.index', compact('semesters'));
    }

    public function create()
    {
        return view('semesters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'semester' => 'required|integer|min:1|max:8',
            'tahun_ajaran' => 'required|string|max:20',
        ]);

        Semester::create([
            'user_id' => auth()->id(),
            'semester' => $request->semester,
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);

        return redirect('/semesters');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $semester = Semester::where('user_id', auth()->id())
            ->findOrFail($id);

        return view('semesters.edit', compact('semester'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'semester' => 'required|integer|min:1|max:8',
            'tahun_ajaran' => 'required|string|max:20',
        ]);

        $semester = Semester::where('user_id', auth()->id())
            ->findOrFail($id);

        $semester->update([
            'semester' => $request->semester,
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);

        return redirect('/semesters');
    }

    public function destroy(string $id)
    {
        $semester = Semester::where('user_id', auth()->id())
            ->findOrFail($id);

        $semester->delete();

        return redirect('/semesters');
    }
}