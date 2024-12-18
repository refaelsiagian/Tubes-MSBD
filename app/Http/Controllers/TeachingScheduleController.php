<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherAllLessons;

class TeachingScheduleController extends Controller
{
    public function index()
    {
        $day = request('day') ?? 'Senin';

        $schedules = TeacherAllLessons::with([
                        'employeeJob.employee', 
                        'subjectLevel.subject',
                        'subjectLevel.level',
                        'room', 
                        'lesson'
                    ])
                    ->whereIn('employee_job_id', function ($query) {
                        $query->select('id')
                            ->from('employee_jobs')
                            ->where('employee_id', auth()->user()->employee->id) // Ganti 'EU008' dengan nilai dinamis jika diperlukan
                            ->where('job_id', 5);
                    })
                    ->whereHas('lesson', function ($query) use ($day) {
                        $query->where('day', $day);
                    })
                    ->orderBy('lesson_id') // Sorting langsung di database
                    ->orderBy('room_id')
                    ->get()
        ;

        // dd($schedules->toJson());

        return view ('teaching-schedule.index', [
            'page' => 'Schedule',
            'schedules' => $schedules
        ]);
    }
}
