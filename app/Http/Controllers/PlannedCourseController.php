<?php

namespace App\Http\Controllers;

use App\Models\StudentCourse;
use Illuminate\Http\Request;

class PlannedCourseController extends Controller
{
    private function getBobotNilai($nilai): float
    {
        if (is_numeric($nilai)) {
            return (float) $nilai;
        }

        $bobotNilai = [
            'A' => 4.0,
            'B' => 3.0,
            'C' => 2.0,
            'E' => 0.0,
        ];

        return (float) ($bobotNilai[strtoupper((string) $nilai)] ?? 0.0);
    }

    private function getTotalSksDanNilai($studentCourses): array
    {
        $totalSks = 0;
        $totalNilai = 0;

        foreach ($studentCourses as $item) {
            if (!$item->course) {
                continue;
            }

            $sks = (int) $item->course->sks;
            $bobot = $this->getBobotNilai($item->bobot ?? $item->nilai);

            $totalSks += $sks;
            $totalNilai += $sks * $bobot;
        }

        return [$totalSks, $totalNilai];
    }

    public function index()
    {
        $studentCourses = StudentCourse::where('user_id', auth()->id())
            ->whereNotNull('nilai')
            ->with('course')
            ->get();

        [$totalSks, $totalNilai] = $this->getTotalSksDanNilai($studentCourses);

        $ipk = $totalSks > 0 ? $totalNilai / $totalSks : 0;

        return view('planned_courses.index', compact(
            'totalSks',
            'totalNilai',
            'ipk'
        ));
    }

    public function calculate(Request $request)
    {
        $data = $request->validate([
            'nama_mata_kuliah' => 'required|array|min:1',
            'nama_mata_kuliah.*' => 'required|string|max:255',
            'sks' => 'required|array',
            'sks.*' => 'required|integer|min:1|max:6',
            'nilai' => 'required|array',
            'nilai.*' => 'required|in:A,B,C,E',
        ]);

        $studentCourses = StudentCourse::where('user_id', auth()->id())
            ->whereNotNull('nilai')
            ->with('course')
            ->get();

        [$totalSks, $totalNilai] = $this->getTotalSksDanNilai($studentCourses);

        $bobotNilai = [
            'A' => 4.0,
            'B' => 3.0,
            'C' => 2.0,
            'E' => 0.0,
        ];

        $rencana = [];
        $sksRencana = 0;
        $nilaiRencana = 0;

        foreach ($data['nama_mata_kuliah'] as $i => $nama) {
            $sks = (int) $data['sks'][$i];
            $nilai = $data['nilai'][$i];
            $bobot = $bobotNilai[$nilai];

            $sksRencana += $sks;
            $nilaiRencana += $sks * $bobot;

            $rencana[] = [
                'nama' => $nama,
                'sks' => $sks,
                'nilai' => $nilai,
                'bobot' => $bobot,
            ];
        }

        $totalSksSimulasi = $totalSks + $sksRencana;
        $totalNilaiSimulasi = $totalNilai + $nilaiRencana;

        $ipk = $totalSks > 0 ? $totalNilai / $totalSks : 0;

        $ipkSimulasi = $totalSksSimulasi > 0
            ? $totalNilaiSimulasi / $totalSksSimulasi
            : 0;

        return view('planned_courses.index', compact(
            'totalSks',
            'totalNilai',
            'ipk',
            'rencana',
            'sksRencana',
            'nilaiRencana',
            'totalSksSimulasi',
            'totalNilaiSimulasi',
            'ipkSimulasi'
        ));
    }
}
