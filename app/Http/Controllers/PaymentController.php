<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\PaymentHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $employees = Employee::select('id', 'employee_name')->get();

        return view ('payment.index', compact('employees'));
    }


    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        if ($employee->account_number != null) {
            $employee->account_number = decrypt($employee->account_number);
        }

        $paymentHistory = PaymentHistory::where('employee_id', $id)->latest()->first();
    
        $data = DB::table('lesson_count_view')
            ->join('employee_jobs', 'lesson_count_view.employee_job_id', '=', 'employee_jobs.id')
            ->join('employees', 'employee_jobs.employee_id', '=', 'employees.id')
            ->join('subject_levels', 'lesson_count_view.subject_level_id', '=', 'subject_levels.id')
            ->join('subjects', 'subject_levels.subject_id', '=', 'subjects.id')
            ->join('levels', 'subject_levels.level_id', '=', 'levels.id')
            ->where('employees.id', '=', $employee->id) // Filter berdasarkan ID karyawan
            ->select(
                'levels.level_name',
                'subjects.subject_name',
                'lesson_count_view.lesson_count',
                'levels.rates_per_lesson',
                DB::raw('lesson_count_view.lesson_count * levels.rates_per_lesson as total')
            )
            ->get();
    
        // Ambil data posisi pekerjaan (jobs) terkait karyawan
        $dataJobs = DB::table('employee_jobs')
            ->join('jobs', 'employee_jobs.job_id', '=', 'jobs.id')
            ->where('employee_jobs.employee_id', '=', $employee->id)
            ->select('jobs.job_name', 'jobs.salary', 'employee_jobs.job_id')
            ->get();
    
        $TeacherSalary = $data->sum('total');
    
        $totalSalary = $dataJobs->sum('salary');

        $totalPayment = $TeacherSalary + $totalSalary;
    
        // Return view dengan data
        return view('payment.show', [
            'employee' => $employee,
            'data' => $data,
            'dataJobs' => $dataJobs,
            'TeacherSalary' => $TeacherSalary,
            'totalSalary' => $totalSalary,
            'totalPayment' => $totalPayment,
            'paymentHistory' => $paymentHistory,
        ]);
    }

    public function uploadTransfer(Request $request, $id)
    {
        // Validasi file upload
        $request->validate([
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Ambil file gambar yang di-upload
        $file = $request->file('bukti_transfer');
        
        // Simpan gambar ke folder storage/public/bukti-transfer dan dapatkan path-nya
        $filePath = $file->store('public/bukti-transfer'); // akan disimpan di storage/app/public/bukti-transfer
    
        // Ambil total pembayaran dan tanggal
        $totalPayment = $request->totalPayment;
        $paymentDate = now();
    
        // Simpan data pembayaran ke dalam tabel payment_histories
        $paymentHistory = new PaymentHistory();
        $paymentHistory->employee_id = $id; // ID karyawan yang bersangkutan
        $paymentHistory->total = $totalPayment; // Total pembayaran
        $paymentHistory->date = $paymentDate; // Tanggal pembayaran
        $paymentHistory->image = $filePath; // Path file gambar bukti transfer
        $paymentHistory->save();
    
        // Kembalikan response ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Bukti transfer berhasil diunggah!');
    }    
    
}
