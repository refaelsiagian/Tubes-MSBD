<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Job;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $employees = Employee::with('EmployeeJob')->get();

        $jobs = Job::whereNotIn('id', [1, 2, 3, 4])->get();

        foreach ($employees as $employee) {
            if ($employee->account_number != null) {
                $employee->account_number = decrypt($employee->account_number);
            }
            $employee->phone_number = decrypt($employee->phone_number);
        }
        

        return view('employee.index', [
            'page' => 'Employees',
            'active' => 'employees',
            'employees' => $employees,
            'jobs' => $jobs,
            'active' => 'employees',
            'title' => 'Employees'
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create', [
            'page' => 'Add Employee',
            'active' => 'employees',
            'title' => 'Add Employee'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \Log::info('Store method triggered');

        $validatedData = $request->validate([
            'id' => 'required|string|unique:employees,id',
            'employee_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'account_number' => 'required|string|max:20',
            'bank_name' => 'required|string|max:100',
        ]);

        $validatedData['phone_number'] = Crypt::encrypt($request->input('phone_number'));
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
        $employee->phone_number = decrypt($employee->phone_number);
        $employee->account_number = decrypt($employee->account_number);

        return view('employee.edit', [
            'page' => 'Edit Employee',
            'active' => 'employees',
            'employee' => $employee,
            'title' => 'Edit Employee'
        ]); 
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        // Validasi status yang dikirimkan melalui request
        if ($request->has('status') && $request->status == 'inactive') {
            try {
                // Cek apakah employee masih memiliki pekerjaan terkait
                $hasJob = DB::table('employee_jobs')->where('employee_id', $employee->id)->exists();

                // Jika masih ada pekerjaan yang terkait, maka kita tidak bisa mengubah statusnya
                if ($hasJob) {
                    return redirect()->route('employees.index')->with('error', 'Cannot deactivate employee: Employee still has assigned jobs');
                }

                // Update status menjadi inactive jika tidak ada pekerjaan yang terkait
                $employee->status = 'inactive';
                $employee->save();

                return redirect()->route('employees.index')->with('success', 'Employee status updated to inactive.');
            } catch (\Illuminate\Database\QueryException $ex) {
                // Menangkap exception error dari database (termasuk dari trigger)
                $errorMessage = $ex->getMessage();

                // Memeriksa jika error berisi pesan dari trigger
                if (str_contains($errorMessage, 'Cannot be inactivate employee')) {
                    // Menangkap pesan error dari trigger
                    $cleanMessage = preg_replace('/^SQLSTATE\[\d+\]: .*?: \d+ /', '', $errorMessage);
                    $cleanMessage = preg_replace('/\(Connection: .*?\)/', '', $cleanMessage);
                    $cleanMessage = trim($cleanMessage); // Hapus spasi berlebih di awal/akhir

                    return redirect()->route('employees.index')->with('error', $cleanMessage);
                }

                // Menangani error lainnya
                return redirect()->route('employees.index')->with('error', 'An error occurred while processing the data.');
            } catch (\Exception $ex) {
                // Menangani error umum lainnya
                return redirect()->route('employees.index')->with('error', 'Unexpected error: ' . $ex->getMessage());
            }
        }

        // Proses update data employee selain status
        $validatedData = $request->validate([
            'employee_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'account_number' => 'required|string|max:20',
            'bank_name' => 'required|string|max:100',
        ]);

        // Menyimpan data yang sudah tervalidasi
        $validatedData['account_number'] = Crypt::encrypt($request->input('account_number'));
        $validatedData['phone_number'] = Crypt::encrypt($request->input('phone_number'));

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

    public function job(Request $request, Employee $employee)
    {
        try {
            // Validate input
            $validated = $request->validate([
                'job_id' => 'nullable|exists:jobs,id',
                'employee_job_id' => 'nullable|exists:employee_jobs,id'
            ]);

            $employee_id = $employee->id;
            $job_id = $validated['job_id'];
            $employee_job_id = $validated['employee_job_id'];

            // Call the stored procedure
            $status = DB::select('CALL update_employee_job(?, ?, ?)', [
                $employee_id, 
                $job_id, 
                $employee_job_id
            ]);

            // Return the status message
            return redirect()->route('employees.index')->with('success', $status[0]->status);

        } catch (\Illuminate\Database\QueryException $ex) {
            // Tangkap error dari database
            $errorMessage = $ex->getMessage();

            // Jika error terkait trigger
            if (str_contains($errorMessage, 'Orang ini')) {
                // Bersihkan pesan error
                $cleanMessage = preg_replace('/^SQLSTATE\[\d+\]: .*?: \d+ /', '', $errorMessage);
                $cleanMessage = preg_replace('/\(Connection: .*?\)/', '', $cleanMessage);
                $cleanMessage = trim($cleanMessage); // Hapus spasi berlebih di awal/akhir

                return redirect()->route('employees.index')->with('error', $cleanMessage);
            }
        
            // Jika error lainnya
            return redirect()->route('employees.index')->with('error', 'Terjadi kesalahan saat memproses data.');
        } catch (\Exception $ex) {
            // Tangkap error umum lainnya
            return redirect()->route('employees.index')->with('error', 'Error tidak terduga: ' . $ex->getMessage());
        }        
    }


}
