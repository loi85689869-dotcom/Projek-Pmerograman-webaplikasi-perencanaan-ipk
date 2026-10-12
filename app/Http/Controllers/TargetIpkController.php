<?php

namespace App\Http\Controllers;

use App\Models\SemesterIpkEntry;
use Illuminate\Http\Request;

class TargetIpkController extends Controller
{
    private function getAcademicData(): array
    {
        $entries = SemesterIpkEntry::where('user_id', auth()->id())
            ->get();

        $totalSks = $entries->sum('total_sks');

        $totalNilai = $entries->sum(function ($entry) {
            return (float) $entry->ip * $entry->total_sks;
        });

        $ipk = $totalSks > 0 ? $totalNilai / $totalSks : 0;

        return [
            'totalSks' => $totalSks,
            'totalNilai' => $totalNilai,
            'ipk' => $ipk,
        ];
    }

    public function index()
    {
        $academicData = $this->getAcademicData();

        return view('target_ipk.index', $academicData);
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'target_ipk' => 'required|numeric|min:0|max:4',
            'sks_mendatang' => 'required|integer|min:1|max:200',
        ]);

        $academicData = $this->getAcademicData();

        $totalSks = $academicData['totalSks'];
        $totalNilai = $academicData['totalNilai'];
        $ipk = $academicData['ipk'];

        $targetIpk = (float) $validated['target_ipk'];
        $sksMendatang = (int) $validated['sks_mendatang'];

        $totalSksAkhir = $totalSks + $sksMendatang;

        $nilaiDibutuhkan = ($targetIpk * $totalSksAkhir) - $totalNilai;

        $rataRataDibutuhkan = $nilaiDibutuhkan / $sksMendatang;

        $ipkMaksimal = $totalSksAkhir > 0
            ? ($totalNilai + (4 * $sksMendatang)) / $totalSksAkhir
            : 0;

        $targetBisaDicapai =
            $targetIpk <= $ipkMaksimal
            && $rataRataDibutuhkan <= 4
            && $rataRataDibutuhkan >= 0;

        return view('target_ipk.index', compact(
            'totalSks',
            'totalNilai',
            'ipk',
            'targetIpk',
            'sksMendatang',
            'nilaiDibutuhkan',
            'rataRataDibutuhkan',
            'ipkMaksimal',
            'targetBisaDicapai'
        ));
    }
}
