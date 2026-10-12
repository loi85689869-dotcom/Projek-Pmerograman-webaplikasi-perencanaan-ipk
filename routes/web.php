<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\TargetIpkController;
use App\Http\Controllers\PlannedCourseController;
use App\Http\Controllers\SemesterIpkEntryController;
use App\Http\Controllers\StudyPlanController;
use App\Http\Controllers\PushSubscriptionController;

// HALAMAN AWAL
Route::get('/', function () {
    return view('welcome');
});

// AUTH
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth');

// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth');

// SEMESTER
Route::get('/semesters', [SemesterController::class, 'index'])
    ->middleware('auth');

Route::get('/semesters/create', [SemesterController::class, 'create'])
    ->middleware('auth');

Route::post('/semesters', [SemesterController::class, 'store'])
    ->middleware('auth');

Route::get('/semesters/{id}/edit', [SemesterController::class, 'edit'])
    ->middleware('auth');

Route::put('/semesters/{id}', [SemesterController::class, 'update'])
    ->middleware('auth');

Route::delete('/semesters/{id}', [SemesterController::class, 'destroy'])
    ->middleware('auth');

// BLOK SEMESTER
Route::get('/semesters/{semesterId}/blocks', [BlockController::class, 'index'])
    ->middleware('auth');

Route::get('/semesters/{semesterId}/blocks/create', [BlockController::class, 'create'])
    ->middleware('auth');

Route::post('/semesters/{semesterId}/blocks', [BlockController::class, 'store'])
    ->middleware('auth');

// MATA KULIAH
Route::get('/blocks/{blockId}/courses', [CourseController::class, 'index'])
    ->middleware('auth');

Route::get('/blocks/{blockId}/courses/create', [CourseController::class, 'create'])
    ->middleware('auth');

Route::post('/blocks/{blockId}/courses', [CourseController::class, 'store'])
    ->middleware('auth');

Route::get('/courses/{courseId}/edit', [CourseController::class, 'edit'])
    ->middleware('auth');

Route::put('/courses/{courseId}', [CourseController::class, 'update'])
    ->middleware('auth');

Route::delete('/courses/{courseId}', [CourseController::class, 'destroy'])
    ->middleware('auth');

// INPUT NILAI
Route::get('/courses/{courseId}/nilai', [StudentCourseController::class, 'edit'])
    ->middleware('auth');

Route::post('/courses/{courseId}/nilai', [StudentCourseController::class, 'update'])
    ->middleware('auth');

// IPS SEMESTER
Route::get('/semesters/{semesterId}/grades', [GradeController::class, 'semester'])
    ->middleware('auth');

// IPK
Route::get('/ipk', [GradeController::class, 'ipk'])
    ->middleware('auth');

// TARGET IPK
Route::get('/target-ipk', [TargetIpkController::class, 'index'])
    ->middleware('auth');

Route::post('/target-ipk', [TargetIpkController::class, 'calculate'])
    ->middleware('auth');

// RENCANA MATA KULIAH DAN SIMULASI IPK
Route::get('/rencana-mata-kuliah', [PlannedCourseController::class, 'index'])
    ->middleware('auth');

Route::post('/rencana-mata-kuliah', [
    PlannedCourseController::class,
    'calculate'
])->middleware('auth');

// KALKULATOR IPK, JADWAL BELAJAR, DAN NOTIFIKASI PUSH
Route::middleware('auth')->group(function () {
    // KALKULATOR IPK
    Route::get('/kalkulator-ipk', [
        SemesterIpkEntryController::class,
        'index'
    ])->name('semester-ipk.index');

    Route::get('/kalkulator-ipk/{semesterIpkEntry}/edit', [
        SemesterIpkEntryController::class,
        'edit'
    ])->name('semester-ipk.edit');

    Route::post('/kalkulator-ipk', [
        SemesterIpkEntryController::class,
        'store'
    ])->name('semester-ipk.store');

    Route::put('/kalkulator-ipk/{semesterIpkEntry}', [
        SemesterIpkEntryController::class,
        'update'
    ])->name('semester-ipk.update');

    Route::delete('/kalkulator-ipk/{semesterIpkEntry}', [
        SemesterIpkEntryController::class,
        'destroy'
    ])->name('semester-ipk.destroy');

    // JADWAL BELAJAR
    Route::get('/jadwal-belajar', [
        StudyPlanController::class,
        'index'
    ])->name('study-plans.index');

    Route::post('/jadwal-belajar', [
        StudyPlanController::class,
        'store'
    ])->name('study-plans.store');

    Route::patch('/jadwal-belajar/{studyPlan}/selesai', [
        StudyPlanController::class,
        'toggleComplete'
    ])->name('study-plans.toggle');

    // LANGGANAN NOTIFIKASI PUSH
    Route::post('/push-subscriptions', [
        PushSubscriptionController::class,
        'store'
    ])->name('push-subscriptions.store');
});


Route::get('/push-public-key', function () {
    return response()->json([
        'publicKey' => config('webpush.public_key'),
    ]);
});

Route::view('/panduan', 'panduan.index')->middleware('auth');