<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();

        return view('subject.index', [
            'page' => 'Subjects',
            'active' => 'subject',
            'subjects' => $subjects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subject.create', [
            'page' => 'Add Subject',
            'active' => 'subject'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subject_name' => 'required|string|max:255',
            'subject_abb' => 'required|string|max:10',
        ]);

        Subject::create($validatedData);

        return redirect()->route('subjects.index')->with('success', 'Subject successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        return view('subject.edit', [
            'page' => 'Edit Subject',
            'active' => 'subject',
            'subject' => $subject
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $validatedData = $request->validate([
            'subject_name' => 'required|string|max:255',
            'subject_abb' => 'required|string|max:50',
        ]);
    
        $subject->update($validatedData);
    
        return redirect()->route('subjects.index')->with('success', 'Subject successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {

        if ($subject->schedules()->count() > 0) {
            return redirect()->route('subjects.index')->with('error', 'Cannot delete subject because it is still used in schedule.');
        }

        $subject->delete();
    
        return redirect()->route('subjects.index')->with('success', 'Subject successfully deleted.');
    }
}
