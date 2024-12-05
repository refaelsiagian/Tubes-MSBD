<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeJob;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

class ClassAdvisorController extends Controller
{
    public function index() {
        $classAdvisors = Room::with('employeeJob')
                        ->whereHas('employeeJob', function ($query) {
                            $query->where('job_id', 4);
                        })
                        ->get()
                        ->map(function ($room) {
                            return [
                                'room_id' => $room->id,
                                'class_name' => $room->class_name,
                                'employee_id' => $room->employeeJob[0]->employee_id ?? null,
                                'employee_name' => $room->employeeJob[0]->employee->employee_name ?? null,
                            ];
                        })
        ;

        // dd($classAdvisors);


        $teachers = EmployeeJob::with('employee')
                        ->where('job_id', 5)
                        ->get()
                        ->sortBy('employee.employee_name')
        ;

        return view('class-advisor.index', [
            'page' => 'Class Advisors',
            'classAdvisors' => $classAdvisors,
            'teachers' => $teachers
        ]);
    }

    public function update(Request $request, Room $room) {
        
        $validated = $request->validate([
            'employee_id' => 'nullable|exists:employees,id',
            'room_id' => 'nullable|exists:rooms,id',
        ]);

        // dd($room->employeeJob[0]->id);
    
        // Panggil stored procedure
        $result = DB::select('CALL update_class_advisor(?, ?, ?)', [
            $room->employeeJob[0]->id ?? null,
            $validated['employee_id'] ?? null,
            $room->id ?? null,
        ]);
    
        // Ambil pesan dari hasil stored procedure
        $status = $result[0]->status ?? 'Unknown status';
    
        return redirect()->route('class-advisors.index')->with('success', $status);
    }
}
