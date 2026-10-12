<?php

namespace App\Http\Controllers;

use App\Models\SemesterIpkEntry;
use Illuminate\Http\Request;

class PlannedCourseController extends Controller
{
    private function getAcademicData(): array
    {
        $entries = SemesterIpkEntry::where('user_id', auth()->id())
            ->get();

        $totalSks = $entries->sum('total_sks');

        $totalNilai = $entries->sum(function ($entry) {
            return (float) $entry->ip * $entry->total_sks;
        });

        $ipk = $totalSks > 0
            ? $totalNilai / $totalSks
            : 0;

        return [
            'totalSks' => $totalSks,
            'totalNilai' => $totalNilai,
            'ipk' => $ipk,
        ];
    }

    public function index()
    {
        return view(
            'planned_courses.index',
            $this->getAcademicData()
        );
    }

    public function calculate(Request $request)
    {
        $data = $request->validate([
            'target_ipk' => 'required|numeric|min:0|max:4',
            'sks_rencana' => 'required|integer|min:1|max:200',
            'ip_rencana' => 'required|numeric|min:0|max:4',
        ]);

        $academicData = $this->getAcademicData();

        $totalSks = $academicData['totalSks'];
        $totalNilai = $academicData['totalNilai'];
        $ipk = $academicData['ipk'];

        $targetIpk = (float) $data['target_ipk'];
        $sksRencana = (int) $data['sks_rencana'];
        $ipRencana = (float) $data['ip_rencana'];

        $nilaiRencana = $sksRencana * $ipRencana;

        $totalSksSimulasi = $totalSks + $sksRencana;
        $totalNilaiSimulasi = $totalNilai + $nilaiRencana;

        $ipkSimulasi = $totalSksSimulasi > 0
            ? $totalNilaiSimulasi / $totalSksSimulasi
            : 0;

        $selisihIpk = $ipkSimulasi - $ipk;

        if ($selisihIpk > 0.000001) {
            $analisisIpk = 'naik';
        } elseif ($selisihIpk < -0.000001) {
            $analisisIpk = 'turun';
        } else {
            $analisisIpk = 'tetap';
        }

        $selisihTarget = $ipkSimulasi - $targetIpk;

        if ($selisihTarget > 0.000001) {
            $statusTarget = 'tercapai';
        } elseif ($selisihTarget < -0.000001) {
            $statusTarget = 'belum';
        } else {
            $statusTarget = 'pas';
        }

        return view('planned_courses.index', compact(
            'totalSks',
            'totalNilai',
            'ipk',
            'targetIpk',
            'sksRencana',
            'ipRencana',
            'nilaiRencana',
            'totalSksSimulasi',
            'totalNilaiSimulasi',
            'ipkSimulasi',
            'selisihIpk',
            'analisisIpk',
            'selisihTarget',
            'statusTarget'
        ));
    }
}
