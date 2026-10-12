<?php

namespace App\Http\Controllers;

use App\Models\StudyPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudyPlanController extends Controller
{
    public function index()
    {
        $studyPlans = StudyPlan::where('user_id', Auth::id())
            ->orderByRaw("FIELD(day, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')")
            ->orderBy('start_time')
            ->get();

        return view('study_plans.index', compact('studyPlans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_name' => 'required|string|max:255',
            'difficulty' => 'required|in:mudah,sedang,sulit',
            'day' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        StudyPlan::create([
            ...$validated,
            'user_id' => Auth::id(),
        ]);

        return redirect()
            ->route('study-plans.index')
            ->with('success', 'Jadwal belajar berhasil ditambahkan!');
    }

    public function toggleComplete(StudyPlan $studyPlan)
{
    abort_unless($studyPlan->user_id === Auth::id(), 403);

    $studyPlan->is_completed = ! $studyPlan->is_completed;
    $studyPlan->save();

    return redirect()
        ->route('study-plans.index')
        ->with('success', 'Status jadwal belajar berhasil diperbarui!');
}
    
}
