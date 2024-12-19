<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan Auth
use App\Models\Employee; // Tambahkan Model Employee
use Illuminate\Support\Facades\Crypt;

class DashboardController extends Controller
{
    // Function utama untuk menampilkan dashboard sesuai role
    public function index()
    {
        $user = Auth::user();

        $loggedInEmployee = $user->employee;
        $jobTitles = $loggedInEmployee->jobs()->pluck('job_name'); 
    
        $decryptedPhone = null;
        if ($loggedInEmployee->phone_number) {
            $decryptedPhone = unserialize(Crypt::decryptString($loggedInEmployee->phone_number));
        }
    
        return view('dashboard.index', [
            'loggedInEmployee' => $loggedInEmployee,
            'decryptedPhone' => $decryptedPhone,
            'active' => 'dashboard',
            'title' => 'Dashboard'
        ]);
    }
}