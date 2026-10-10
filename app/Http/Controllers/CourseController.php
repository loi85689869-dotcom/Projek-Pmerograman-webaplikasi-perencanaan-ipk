<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(string $blockId)
    {
        $block = Block::whereHas('semester', function ($query) {
            $query->where('user_id', auth()->id());
        })->findOrFail($blockId);

        $courses = $block->courses()
            ->with(['studentCourses' => function ($query) {
                $query->where('user_id', auth()->id());
            }])
            ->orderBy('kode_mata_kuliah')
            ->get();

        return view('courses.index', compact('block', 'courses'));
    }

    public function create(string $blockId)
    {
        $block = Block::whereHas('semester', function ($query) {
            $query->where('user_id', auth()->id());
        })->findOrFail($blockId);

        return view('courses.create', compact('block'));
    }

    public function store(Request $request, string $blockId)
    {
        $block = Block::whereHas('semester', function ($query) {
            $query->where('user_id', auth()->id());
        })->findOrFail($blockId);

        $request->validate([
            'kode_mata_kuliah' => 'required|string|max:255',
            'nama_mata_kuliah' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:6',
        ]);

        Course::create([
            'semester_id' => $block->semester_id,
            'block_id' => $block->id,
            'kode_mata_kuliah' => $request->kode_mata_kuliah,
            'nama_mata_kuliah' => $request->nama_mata_kuliah,
            'sks' => $request->sks,
        ]);

        return redirect("/blocks/{$block->id}/courses");
    }

    public function edit(string $courseId)
    {
        $course = Course::whereHas('block.semester', function ($query) {
            $query->where('user_id', auth()->id());
        })->findOrFail($courseId);

        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, string $courseId)
    {
        $course = Course::whereHas('block.semester', function ($query) {
            $query->where('user_id', auth()->id());
        })->findOrFail($courseId);

        $request->validate([
            'kode_mata_kuliah' => 'required|string|max:255',
            'nama_mata_kuliah' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:6',
        ]);

        $course->update([
            'kode_mata_kuliah' => $request->kode_mata_kuliah,
            'nama_mata_kuliah' => $request->nama_mata_kuliah,
            'sks' => $request->sks,
        ]);

        return redirect("/blocks/{$course->block_id}/courses");
    }

    public function destroy(string $courseId)
    {
        $course = Course::whereHas('block.semester', function ($query) {
            $query->where('user_id', auth()->id());
        })->findOrFail($courseId);

        $blockId = $course->block_id;

        $course->delete();

        return redirect("/blocks/{$blockId}/courses");
    }
}