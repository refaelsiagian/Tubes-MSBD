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
        $user = auth()->user();
        $loggedInEmployee = $user->employee;
    
        // Pastikan ada employee yang login
        if ($loggedInEmployee) {
            // Ambil job_id dari jobs yang dimiliki oleh employee
            $jobIds = $loggedInEmployee->jobs->pluck('id')->toArray();
    
            // Cek apakah employee memiliki job Kepala/Wakil Kepala Sekolah (job_id 2 atau 3)
            if (in_array(2, $jobIds) || in_array(3, $jobIds)) {
                // Filter berdasarkan level yang sesuai
                $classAdvisors = ClassAdvisor::with('employeeJob', 'room')
                    ->whereHas('room', function ($query) use ($loggedInEmployee) {
                        // Ambil level_id yang ada di pivot tabel untuk job yang login
                        $levelIds = $loggedInEmployee->jobs->pluck('pivot.level_id')->toArray();
                        $query->whereIn('level_id', $levelIds); // Cek apakah level_id ada dalam list level_id
                    })
                    ->get();
            } else {
                // Tampilkan semua data classAdvisor jika bukan Kepala/Wakil Kepala Sekolah
                $classAdvisors = ClassAdvisor::with('employeeJob', 'room')->get();
            }
        } else {
            // Jika tidak ada employee yang login, tampilkan semua classAdvisors
            $classAdvisors = ClassAdvisor::with('employeeJob', 'room')->get();
        }
    
        // Ambil data teacher (guru)
        $teachers = EmployeeJob::with('employee')
                        ->where('job_id', 5) // Guru
                        ->get()
                        ->sortBy('employee.employee_name');
    
        return view('class-advisor.index', [
            'page' => 'Class Advisors',
            'classAdvisors' => $classAdvisors,
            'teachers' => $teachers,
            'active' => 'class-advisors',
            'title' => 'Class Advisors'
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
