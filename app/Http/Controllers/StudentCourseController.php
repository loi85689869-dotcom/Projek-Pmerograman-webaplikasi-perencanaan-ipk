<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Course;
use App\Models\GradeScale;
use App\Models\StudentCourse;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    public function edit(string $courseId)
    {
        $course = Course::whereHas('block.semester', function ($query) {
            $query->where('user_id', auth()->id());
        })->findOrFail($courseId);

        $studentCourse = StudentCourse::where('user_id', auth()->id())
            ->where('course_id', $course->id)
            ->first();

        return view('student_courses.edit', compact(
            'course',
            'studentCourse'
        ));
    }

    public function update(Request $request, string $courseId)
    {
        $course = Course::whereHas('block.semester', function ($query) {
            $query->where('user_id', auth()->id());
        })->findOrFail($courseId);

        $request->validate([
            'nilai' => 'required|string|in:A,B,C,E',
        ]);

        $gradeScale = GradeScale::where('nilai', $request->nilai)
            ->firstOrFail();

        StudentCourse::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'course_id' => $course->id,
            ],
            [
                'nilai' => $gradeScale->nilai,
                'bobot' => $gradeScale->bobot,
            ]
        );

        return redirect("/blocks/{$course->block_id}/courses");
    }
}