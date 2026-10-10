<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\StudentCourse;

class GradeController extends Controller
{
    public function semester(string $semesterId)
    {
        $semester = Semester::where('user_id', auth()->id())
            ->findOrFail($semesterId);

        $studentCourses = StudentCourse::where('user_id', auth()->id())
            ->whereHas('course', function ($query) use ($semester) {
                $query->where('semester_id', $semester->id);
            })
            ->with('course')
            ->get();

        $totalSks = 0;
        $totalNilai = 0;

        foreach ($studentCourses as $studentCourse) {
            if ($studentCourse->nilai !== null) {
                $sks = $studentCourse->course->sks;
                $bobot = (float) $studentCourse->bobot;

                $totalSks += $sks;
                $totalNilai += $sks * $bobot;
            }
        }

        $ip = $totalSks > 0
            ? $totalNilai / $totalSks
            : 0;

        return view('grades.semester', compact(
            'semester',
            'studentCourses',
            'totalSks',
            'totalNilai',
            'ip'
        ));
    }

    public function ipk()
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

    return view('grades.ipk', compact(
        'studentCourses',
        'totalSks',
        'totalNilai',
        'ipk'
    ));
}
}