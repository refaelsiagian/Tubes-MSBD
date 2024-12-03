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
        $rooms = Room::with('level')->get();

        return view('schedule.index', [
            'page' => 'Schedule',
            'active' => 'schedule',
            'rooms' => $rooms
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
                    'semester', 
                    'scheduleTimes'])
                        ->filterSchedules($room->id, $day) 
                        ->orderBy('lesson_id', 'asc')
                        ->get()
                        ->groupBy(function ($schedule) {
                            return $schedule->scheduleTimes->first()?->start_time . '|' . 
                                   $schedule->scheduleTimes->first()?->end_time . '|' . 
                                   $schedule->lesson_id;
                        });
        ;

        // dd($schedules->toJson()); 

        $className = $room->class_name;

        return view('schedule.show', [
            'page' => $className,
            'active' => 'schedule',
            'schedules' => $schedules
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
            'active' => 'schedule',
            'schedule' => $schedule,
            'subjects' => $subjects,
            'teachers' => $teachers
        ]);
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validatedData = $request->validate([
            'subject_level_id' => 'required',
            'teacher_id' => 'required',
            'day' => 'required',
        ]);

        $day = strtolower($validatedData['day']);

        unset($validatedData['day']);

        Schedule::where('id', $schedule->id)->update($validatedData);

        return redirect('admin/schedules/' . $schedule->room_id . '?day=' . $day)->with('success', 'Schedule updated successfully.');
    }
}
