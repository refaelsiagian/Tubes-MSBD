<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Schedule;
use App\Models\SubjectLevel;
use App\Models\EmployeeJob;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $loggedInEmployee = $user->employee;

        // Pastikan ada employee yang login
        if ($loggedInEmployee) {
            // Ambil job_id dari jobs yang dimiliki oleh employee
            $jobIds = $loggedInEmployee->jobs->pluck('id')->toArray();

            // Cek apakah employee memiliki job Kepala/Wakil Kepala Sekolah (job_id 2 atau 3)
            if (in_array(2, $jobIds) || in_array(3, $jobIds)) {
                // Filter berdasarkan level yang sesuai
                $rooms = Room::with('level')
                    ->whereIn('level_id', $loggedInEmployee->jobs->pluck('pivot.level_id')->toArray())
                    ->get();
            } else {
                // Tampilkan semua data rooms jika bukan Kepala/Wakil Kepala Sekolah
                $rooms = Room::with('level')->get();
            }
        } else {
            // Jika tidak ada employee yang login, tampilkan semua rooms
            $rooms = Room::with('level')->get();
        }

        return view('schedule.index', [
            'page' => 'Schedule',
            'active' => 'schedules',
            'rooms' => $rooms,
            'title' => 'Schedule'
        ]);
    }
    

    public function show(Room $room)
    {
        $day = request('day') ?? 'Senin';

        $schedules = Schedule::with([
                    'room', 
                    'subjectLevel.subject', 
                    'lesson.lessonType', 
                    'teacher.employee',
                    'teacher2.employee', 
                    'scheduleTimes'])
                        ->filterSchedules($room->id, $day) 
                        ->orderBy('lesson_id', 'asc')
                        ->get()
        ;

        $className = $room->class_name;

        return view('schedule.show', [
            'page' => $className,
            'active' => 'schedule',
            'schedules' => $schedules,
            'title' => 'Schedule'
        ]);
    }

    public function edit(Schedule $schedule)
    {
        $subjects = SubjectLevel::where('level_id', $schedule->room->level_id)
                    ->where('major_id', $schedule->room->major_id)
                    ->with('subject')
                    ->get()
                    ->sortBy('subject.subject_name')
        ;

        $teachers = EmployeeJob::where('job_id', 5)
                    ->with('employee')
                    ->get()
                    ->sortBy('employee.employee_name')
        ;

        return view('schedule.edit', [
            'page' => 'Schedule',
            'active' => 'schedules',
            'title' => 'Edit Schedule',
            'schedule' => $schedule,
            'subjects' => $subjects,
            'teachers' => $teachers
        ]);
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validatedData = $request->validate([
            'subject_level_id' => 'required|exists:subject_levels,id',
            'teacher_id' => 'required|exists:employee_jobs,id',
            'teacher2_id' => 'nullable|exists:employee_jobs,id',
            'day' => 'required',
        ]);

        // dd($validatedData);

        $day = strtolower($validatedData['day']);

        $subject = SubjectLevel::find($validatedData['subject_level_id'])->subject->subject_name;
        
        $validatedData['teacher2_id'] = $subject == 'Agama' ? $validatedData['teacher2_id'] : NULL;

        unset($validatedData['day']);

        Schedule::where('id', $schedule->id)->update($validatedData);

        return redirect('admin/schedules/' . $schedule->room_id . '?day=' . $day)->with('success', 'Schedule updated successfully.');
    }
}
