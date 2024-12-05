<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
{
    public function index()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil data pelajaran terkait user login
        $data = DB::table('lesson_count_view')
            ->join('employee_jobs', 'lesson_count_view.employee_job_id', '=', 'employee_jobs.id')
            ->join('employees', 'employee_jobs.employee_id', '=', 'employees.id')
            ->join('subject_levels', 'lesson_count_view.subject_level_id', '=', 'subject_levels.id')
            ->join('subjects', 'subject_levels.subject_id', '=', 'subjects.id')
            ->join('levels', 'subject_levels.level_id', '=', 'levels.id')
            ->where('employees.id', '=', $user->employee->id)
            ->select(
                'levels.level_name',
                'subjects.subject_name',
                'lesson_count_view.lesson_count',
                'levels.rates_per_lesson',
                DB::raw('lesson_count_view.lesson_count * levels.rates_per_lesson as total')
            )
            ->get();

        // Ambil data posisi pekerjaan (jobs) terkait user login
        $dataJobs = DB::table('employee_jobs')
            ->join('jobs', 'employee_jobs.job_id', '=', 'jobs.id')
            ->where('employee_jobs.employee_id', '=', $user->employee->id)
            ->select('jobs.job_name', 'jobs.salary', 'employee_jobs.job_id')
            ->get();

        // Hitung total gaji dari lesson_count (gaji berdasarkan pelajaran)
        $TeacherSalary = $data->sum('total'); // Total gaji berdasarkan pelajaran

        // Hitung total gaji berdasarkan posisi pekerjaan (guru, wali kelas, kepala sekolah)
        $totalSalary = $dataJobs->sum('salary'); // Gaji berdasarkan posisi pekerjaan

        // Return view dengan data
        return view('salary.index', compact('data', 'dataJobs', 'TeacherSalary', 'totalSalary'));
    }   
}
