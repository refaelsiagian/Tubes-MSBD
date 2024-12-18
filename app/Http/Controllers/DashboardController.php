<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan Auth
use App\Models\Employee; // Tambahkan Model Employee
use Illuminate\Support\Facades\Crypt;

class DashboardController extends Controller
{
    // Function utama untuk menampilkan dashboard sesuai role
    public function index($role)
    {
        $user = Auth::user();

        $loggedInEmployee = $user->employee;
        $jobTitles = $loggedInEmployee->jobs()->pluck('job_name'); 
    
        $decryptedPhone = null;
        if ($loggedInEmployee->phone_number) {
            $decryptedPhone = unserialize(Crypt::decryptString($loggedInEmployee->phone_number));
        }
    
        return view('dashboard.index', compact('loggedInEmployee', 'decryptedPhone'));
    }

    public function foundation()
    {
        return $this->index('foundation');
    }

    public function principal()
    {
        return $this->index('principal');
    }

    public function admin()
    {
        return $this->index('admin');
    }

    public function teacher()
    {
        return $this->index('teacher');
    }

    public function inspector()
    {
        return $this->index('inspector');
    }

    public function employee()
    {
        return $this->index('employee');
    }
}