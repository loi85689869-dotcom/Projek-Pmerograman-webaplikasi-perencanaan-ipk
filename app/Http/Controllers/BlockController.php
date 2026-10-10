<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Semester;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function index(string $semesterId)
    {
        $semester = Semester::where('user_id', auth()->id())
            ->findOrFail($semesterId);

        $blocks = Block::where('semester_id', $semester->id)
            ->orderBy('blok')
            ->get();

        return view('blocks.index', compact('semester', 'blocks'));
    }

    public function create(string $semesterId)
    {
        $semester = Semester::where('user_id', auth()->id())
            ->findOrFail($semesterId);

        return view('blocks.create', compact('semester'));
    }

public function store(Request $request, string $semesterId)
{
    $semester = Semester::where('user_id', auth()->id())
        ->findOrFail($semesterId);

    $request->validate([
        'blok' => 'required|integer|min:1|max:2',
        'nama_blok' => 'nullable|string|max:255',
    ]);

    $sudahAda = Block::where('semester_id', $semester->id)
        ->where('blok', $request->blok)
        ->exists();

    if ($sudahAda) {
        return back()->withErrors([
            'blok' => 'Blok tersebut sudah ada di semester ini.',
        ])->withInput();
    }

    Block::create([
        'semester_id' => $semester->id,
        'blok' => $request->blok,
        'nama_blok' => $request->nama_blok,
    ]);

    return redirect("/semesters/{$semester->id}/blocks");
}

}