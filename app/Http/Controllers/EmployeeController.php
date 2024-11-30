<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\EmployeeJob;
use Illuminate\Support\Facades\Crypt;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('EmployeeJob')->get();

        foreach ($employees as $employee) {
            try {
                if ($employee->account_number != null) {
                    $employee->account_number = decrypt($employee->account_number);
                }
            } catch (\Exception $e) {
                $employee->account_number = 'Invalid payload';
            }
        }
        
        return view('employee.index', [
            'page' => 'Employees',
            'active' => 'employees',
            'employees' => $employees
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create', [
            'page' => 'Add Employee',
            'active' => 'employees'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|string|unique:employees,id',
            'employee_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'account_number' => 'required|string|max:20',
            'bank_name' => 'required|string|max:100',
        ]);

        $validatedData['account_number'] = Crypt::encrypt($request->input('account_number'));
    
        Employee::create($validatedData);
    
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', [
            'page' => 'Edit Employee',
            'active' => 'employees',
            'employee' => $employee
        ]); 
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
{
    if ($request->has('status')) {
        $validated = $request->validate([
            'status' => 'required|in:inactive',
        ]);

        $employee->status = $validated['status'];
        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee status updated to inactive.');
    }

    $validatedData = $request->validate([
        'employee_name' => 'required|string|max:255',
        'phone_number' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'account_number' => 'required|string|max:20',
        'bank_name' => 'required|string|max:100',
    ]);

    $employee->update($validatedData);

    return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }

}
