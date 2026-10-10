<?php

namespace App\Http\Controllers;

use App\Models\StudentCourse;
use Illuminate\Http\Request;

class TargetIpkController extends Controller
{
    public function index()
    {
        $studentCourses = StudentCourse::where('user_id', auth()->id())
            ->whereNotNull('nilai')
            ->with('course')
            ->get();

        $totalSks = 0;
        $totalNilai = 0;

        foreach ($studentCourses as $studentCourse) {
            $sks = $studentCourse->course->sks;
            $bobot = (float) $studentCourse->bobot;

            $totalSks += $sks;
            $totalNilai += $sks * $bobot;
        }

        $ipk = $totalSks > 0
            ? $totalNilai / $totalSks
            : 0;

        return view('target_ipk.index', compact(
            'totalSks',
            'totalNilai',
            'ipk'
        ));
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'target_ipk' => 'required|numeric|min:0|max:4',
            'sks_mendatang' => 'required|integer|min:1|max:200',
        ]);

        $studentCourses = StudentCourse::where('user_id', auth()->id())
            ->whereNotNull('nilai')
            ->with('course')
            ->get();

        $totalSks = 0;
        $totalNilai = 0;

        foreach ($studentCourses as $studentCourse) {
            $sks = $studentCourse->course->sks;
            $bobot = (float) $studentCourse->bobot;

            $totalSks += $sks;
            $totalNilai += $sks * $bobot;
        }

        $ipk = $totalSks > 0
            ? $totalNilai / $totalSks
            : 0;

        $targetIpk = (float) $request->target_ipk;
        $sksMendatang = (int) $request->sks_mendatang;

        $nilaiDibutuhkan =
            ($targetIpk * ($totalSks + $sksMendatang))
            - $totalNilai;

        $rataRataDibutuhkan =
            $nilaiDibutuhkan / $sksMendatang;

        return view('target_ipk.index', compact(
            'totalSks',
            'totalNilai',
            'ipk',
            'targetIpk',
            'sksMendatang',
            'nilaiDibutuhkan',
            'rataRataDibutuhkan'
        ));
    }
}