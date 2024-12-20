<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penalty;
use App\Models\Fine;
use App\Models\Employee;
use DB;


class PenaltyController extends Controller
{
    public function index()
    {
        $penalty = Penalty::with(['employee', 'fine'])->get();

        $employees = DB::table('employee_jobs')
                ->join('employees', 'employee_jobs.employee_id', '=', 'employees.id')
                ->where('employee_jobs.job_id', 5)
                ->select('employees.*', 'employee_jobs.job_id')
                ->get();

        $fine = Fine::all();

        return view('penalty.index', [
            'penalties' => $penalty,
            'page' => 'Penalty',
            'active' => 'penalty',
            'title' => 'Penalty',
            'employees' => $employees,
            'fines' => $fine
        ]);
    }

    public function store(Request $request)
    {

        $penalty = new Penalty;
        $penalty->employee_id = $request->employee_id;
        $penalty->fine_id = $request->fine_id;

        if ($request->fine_id == 1) {
            $penalty->amount = 10000;
        }

        if ($request->fine_id == 2) {
            $penalty->amount = $request->lessons * 20000;
        }

        $penalty->save();

        return redirect()->route('penalty.index')->with('success', 'Penalty added successfully');
    }
}
