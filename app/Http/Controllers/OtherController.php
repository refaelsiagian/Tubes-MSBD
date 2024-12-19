<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeJob;
use App\Models\User;
use App\Models\Fine;
use DB;

class OtherController extends Controller
{
    public function index()
    {
        $teachers = EmployeeJob::with('employee')->where('job_id', 5) // Ambil yang job_id = 5
                        ->whereNotIn('employee_id', function ($query) {
                            $query->select('employee_id')
                                ->from('employee_jobs')
                                ->whereIn('job_id', [2, 3]); // Cari employee_id dengan job_id = 2 atau 3
                        })
                        ->get()
                        ->sortBy('employee.employee_name')
        ;

        $administrators = EmployeeJob::with('employee')->where('job_id', 6)->get()->sortBy('employee.employee_name');

        $admin = User::with('employee')->where('role_id', 3)->first();

        $inspector = User::with('employee')->where('role_id', 5)->first();

        $principals = EmployeeJob::with(['employee', 'level', 'job'])
                ->whereIn('job_id', [2, 3]) // Hanya job_id 2 atau 3
                ->get()
                ->sortBy('employee.employee_name')
        ;

        $fines = Fine::all();

        return view('other.index', [
            'page' => 'Other',
            'teachers' => $teachers,
            'admin' => $admin,
            'principals' => $principals,
            'fines' => $fines,
            'inspector' => $inspector,
            'administrators' => $administrators,
            'active' => 'others',
            'title' => 'Other'
        ]);
    }

    public function admin(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'admin_id' => 'required|exists:employees,id',
        ]);

        $admin_id = $request->input('admin_id');
        $employee_id = $request->input('employee_id');

        $result = DB::select('CALL change_admin(?, ?)', [
            $admin_id,
            $employee_id
        ]);

        return redirect()->route('others.index')->with('success', 'Admin berhasil diubah.');
    }

    public function inspector(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'inspector_id' => 'required|exists:employees,id',
        ]);

        $inspector_id = $request->input('inspector_id');
        $employee_id = $request->input('employee_id');

        $result = DB::select('CALL change_inspector(?, ?)', [
            $employee_id,
            $inspector_id,
        ]);

        return redirect()->route('others.index')->with('success', 'Pengawas berhasil diubah.');
    }

    public function principal(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'principal_id' => 'required|exists:employees,id',
            'position_id' => 'required|exists:employee_jobs,id',
        ]);

        // Ambil nilai dari inputan
        $principal_id = $request->input('principal_id');
        $employee_id = $request->input('employee_id');
        $position_id = $request->input('position_id');

        // Panggil prosedur SQL untuk mengubah data
        $result = DB::select('CALL change_principal(?, ?, ?)', [
            $principal_id,
            $employee_id,
            $position_id
        ]);        

        // Kembalikan response sukses setelah perubahan
        return redirect()->route('others.index')->with('success', 'Principal berhasil diubah.');
    }

    public function fine(Request $request)
    {
        $request->validate([
            'fine_name' => 'required|string|max:255',
            'fine_price' => 'required|integer|min:0',
        ]);
    
        $fine = Fine::find($request->input('fine_id'));
    
        // Pastikan denda ditemukan
        if ($fine) {
            // Lakukan pembaruan jika denda ditemukan
            $fine->update([
                'fine_name' => $request->input('fine_name'),
                'fine_price' => $request->input('fine_price'),
            ]);
    
            return redirect()->route('others.index')->with('success', 'Denda berhasil diubah!');
        } else {
            return redirect()->route('others.index')->with('error', 'Denda tidak ditemukan.');
        }
    }
}
