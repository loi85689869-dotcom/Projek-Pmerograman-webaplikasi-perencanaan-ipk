<?php

namespace App\Http\Controllers;

use App\Models\SemesterIpkEntry;
use Illuminate\Http\Request;

class SemesterIpkEntryController extends Controller
{
    public function index()
    {
        $entries = SemesterIpkEntry::where('user_id', auth()->id())
            ->orderBy('semester')
            ->get();

        $totalSks = $entries->sum('total_sks');

        $totalNilai = $entries->sum(function ($entry) {
            return $entry->ip * $entry->total_sks;
        });

        $ipk = $totalSks > 0
            ? $totalNilai / $totalSks
            : 0;

        return view('semester_ipk.index', compact(
            'entries',
            'totalSks',
            'totalNilai',
            'ipk'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'semester' => 'required|integer|min:1|max:14',
            'ip' => 'required|numeric|min:0|max:4',
            'total_sks' => 'required|integer|min:1|max:100',
        ]);

        SemesterIpkEntry::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'semester' => $validated['semester'],
            ],
            [
                'ip' => $validated['ip'],
                'total_sks' => $validated['total_sks'],
            ]
        );

        return redirect()
            ->route('semester-ipk.index')
            ->with('success', 'Data IP semester berhasil disimpan.');
    }


public function edit(SemesterIpkEntry $semesterIpkEntry)
{
    abort_unless(
        $semesterIpkEntry->user_id === auth()->id(),
        403
    );

    $entry = $semesterIpkEntry;

    return view('semester_ipk.edit', compact('entry'));
}


public function update(Request $request, SemesterIpkEntry $semesterIpkEntry)
{
    // Pastikan data milik pengguna yang sedang login.
    abort_unless(
        $semesterIpkEntry->user_id === auth()->id(),
        403
    );

    // Periksa data yang dimasukkan.
    $validated = $request->validate([
        'semester' => 'required|integer|min:1|max:14',
        'ip' => 'required|numeric|min:0|max:4',
        'total_sks' => 'required|integer|min:1|max:100',
    ]);

    // Cegah nomor semester bertabrakan dengan data lain.
    $sudahAda = SemesterIpkEntry::where('user_id', auth()->id())
        ->where('semester', $validated['semester'])
        ->where('id', '!=', $semesterIpkEntry->id)
        ->exists();

    if ($sudahAda) {
        return back()
            ->withErrors([
                'semester' => 'Nomor semester tersebut sudah ada.'
            ])
            ->withInput();
    }

    // Simpan perubahan.
    $semesterIpkEntry->update($validated);

    return redirect()
        ->route('semester-ipk.index')
        ->with('success', 'Data semester berhasil diperbarui.');
}

    public function destroy(SemesterIpkEntry $semesterIpkEntry)
    {
        abort_unless(
            $semesterIpkEntry->user_id === auth()->id(),
            403
        );

        $semesterIpkEntry->delete();

        return redirect()
            ->route('semester-ipk.index')
            ->with('success', 'Data semester berhasil dihapus.');
    }
}