<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all();

        return view('job.index', [
            'page' => 'Job',
            'active' => 'job',
            'jobs' => $jobs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('job.create', [
            'page' => 'Add Job',
            'active' => 'job'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_name' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
        ]);

        Job::create($validated);

        return redirect()->route('jobs.index')->with('success', 'Job has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return view('job.edit', [
            'page' => 'Edit Job',
            'active' => 'job',
            'job' => $job
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            'job_name' => 'required|string|max:255',
            'salary' => 'required|numeric',
        ]);
    
        $job->update($validated);
    
        return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
    
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        if ($job->employees()->exists()) {
            return redirect()->route('jobs.index')->with('error', 'Job cannot be deleted because it is associated with employees.');
        }
    
        // Validasi hanya job dengan id >= 6 yang bisa dihapus
        if ($job->id < 6) {
            return redirect()->route('jobs.index')->with('error', 'This job cannot be deleted.');
        }
    
        // Hapus job jika validasi terpenuhi
        $job->delete();
    
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }
}
