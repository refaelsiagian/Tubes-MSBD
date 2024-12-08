<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ClassAdvisor;
use App\Models\EmployeeJob;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

class ClassAdvisorController extends Controller
{
    public function index() {
        $classAdvisors = ClassAdvisor::with('employeeJob')
                        ->with('room')
                        ->get()
        ;

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
        ]);

        $result = DB::select('CALL update_class_advisor(?, ?, ?)', [
            $room->employeeJob->isEmpty() ? null : $room->employeeJob[0]->id ?? null,
            $validated['employee_id'] ?? null,
            $room->id,
        ]);
    
        // Ambil pesan dari hasil stored procedure
        $status = $result[0]->status ?? 'Unknown status';
    
        return redirect()->route('class-advisors.index')->with('success', $status);
    }
}
