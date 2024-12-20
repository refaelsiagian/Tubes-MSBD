<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\PaymentHistory;
use App\Models\Penalty;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $employees = Employee::whereNotIn('id', ['EU001', 'EU002', 'EU003', 'EU004'])->select('id', 'employee_name')->get();

        return view ('payment.index', [
            'page' => 'Payment',
            'employees' => $employees,
            'active' => 'payments',
            'title' => 'Payment'
        ]);
    }


    public function show($id)
    {
        $paymentDetails = $this->getPaymentDetails($id);
        return view('payment.show', array_merge($paymentDetails, [
            'page' => 'Payment',
            'active' => 'payments',
            'title' => 'Payment'
        ]));
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
    
        $paymentDetails = $this->getPaymentDetails($id);

        // Ambil total pembayaran dan tanggal
        $totalPayment = $request->totalPayment;
        $paymentDate = $paymentDetails['date'];
    
        // Simpan data pembayaran ke dalam tabel payment_histories
        $paymentHistory = new PaymentHistory();
        $paymentHistory->employee_id = $id; // ID karyawan yang bersangkutan
        $paymentHistory->total = $totalPayment; // Total pembayaran
        $paymentHistory->date = $paymentDate; // Tanggal pembayaran
        $paymentHistory->image = $filePath; // Path file gambar bukti transfer

        $paymentHistory->detail = json_encode($paymentDetails);

        $paymentHistory->save();
    
        // Kembalikan response ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Bukti penggajian'. ' ' . $paymentDetails['date']->format('F Y') . ' berhasil diunggah!');
    }

    public function history($id){

        $paymentHistories = PaymentHistory::where('employee_id', $id)->get();

        return view('payment.history', [
            'paymentHistories' => $paymentHistories,
            'page' => 'Payment',
            'active' => 'payments',
            'title' => 'Payment'
        ]);
    }

    private function getPaymentDetails($employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        if ($employee->account_number != null) {
            $employee->account_number = decrypt($employee->account_number);
        }

        $currentDate = now();
        $lastMonth = $currentDate->copy()->subMonth();

        $paymentHistory = PaymentHistory::where('employee_id', $employeeId)->latest()->first();

        $hasLastMonthPayment = PaymentHistory::where('employee_id', $employeeId)
            ->whereYear('date', $lastMonth->year)
            ->whereMonth('date', $lastMonth->month)
            ->exists();

        $date = !$hasLastMonthPayment ? $lastMonth : $currentDate;

        $penalties = Penalty::where('employee_id', $employeeId)
            ->when(!$hasLastMonthPayment, function ($query) use ($lastMonth) {
                return $query->whereYear('created_at', $lastMonth->year)
                            ->whereMonth('created_at', $lastMonth->month);
            }, function ($query) use ($currentDate) {
                return $query->whereYear('created_at', $currentDate->year)
                            ->whereMonth('created_at', $currentDate->month);
            })
            ->get();

        $data = DB::table('lesson_count_view')
            ->join('employee_jobs', 'lesson_count_view.employee_job_id', '=', 'employee_jobs.id')
            ->join('employees', 'employee_jobs.employee_id', '=', 'employees.id')
            ->join('subject_levels', 'lesson_count_view.subject_level_id', '=', 'subject_levels.id')
            ->join('subjects', 'subject_levels.subject_id', '=', 'subjects.id')
            ->join('levels', 'subject_levels.level_id', '=', 'levels.id')
            ->where('employees.id', '=', $employeeId)
            ->select(
                'levels.level_name',
                'subjects.subject_name',
                'lesson_count_view.lesson_count',
                'levels.rates_per_lesson',
                DB::raw('lesson_count_view.lesson_count * levels.rates_per_lesson as total')
            )
            ->get();

        $dataJobs = DB::table('employee_jobs')
            ->join('jobs', 'employee_jobs.job_id', '=', 'jobs.id')
            ->where('employee_jobs.employee_id', '=', $employeeId)
            ->select('jobs.job_name', 'jobs.salary', 'employee_jobs.job_id')
            ->get();

        $TeacherSalary = $data->sum('total');
        $totalSalary = $dataJobs->sum('salary');
        $totalPenalty = $penalties->sum('amount');
        $totalPayment = $TeacherSalary + $totalSalary - $totalPenalty;

        return compact(
            'employee', 'data', 'dataJobs', 'TeacherSalary',
            'totalSalary', 'totalPayment', 'totalPenalty',
            'paymentHistory', 'penalties', 'date'
        );
    }

    
}
