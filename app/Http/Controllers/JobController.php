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
            'active' => 'jobs',
            'title' => 'Job',
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
            'active' => 'jobs',
            'title' => 'Add Job'
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
            'active' => 'jobs',
            'job' => $job,
            'title' => 'Edit Job'
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
        try {
            // Validasi hanya job dengan id >= 6 yang bisa dihapus
            if ($job->id < 6) {
                return redirect()->route('jobs.index')->with('error', 'This job cannot be deleted.');
            }
    
            // Hapus job jika validasi terpenuhi
            $job->delete();
    
            return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
        
        } catch (\Illuminate\Database\QueryException $e) {
            // Tangani error jika job masih digunakan oleh employee (trigger akan membuang error)
            if ($e->getCode() == '45000') {
                return redirect()->route('jobs.index')->with('error', 'Cannot delete job: Job is still assigned to employees.');
            }
    
            // Jika ada error lain, lemparkan exception
            throw $e;
        }
}
}