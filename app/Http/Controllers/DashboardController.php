<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function foundation()
    {
        return view('dashboard.index');
    }

    public function principal()
    {
        return view('dashboard.index');
    }

    public function admin()
    {
        return view('dashboard.index');
    }

    public function teacher()
    {
        return view('dashboard.index');
    }

    public function inspector()
    {
        return view('dashboard.index');
    }
    
    public function employee()
    {
        return view('dashboard.index');
    }
}
