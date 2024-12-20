<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Subject;
use App\Models\Level;
use App\Models\Major;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::with(['subjectLevel.level', 'subjectLevel.major'])->get();


        return view('subject.index', [
            'page' => 'Subjects',
            'active' => 'subject',
            'subjects' => $subjects,
            'title' => 'Subjects'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels = Level::all();
        $majors = Major::all();

        return view('subject.create', [
            'page' => 'Add Subject',
            'active' => 'subject',
            'levels' => $levels,
            'majors' => $majors,
            'title' => 'Subjects'
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
            'levels' => 'required|array',
            'levels.*' => 'exists:levels,id',
            'majors' => 'nullable|array',
            'majors.*' => 'exists:majors,id',
            'title' => 'Subjects'
        ]);
    
        // Buat Subject baru dan pastikan disimpan terlebih dahulu
        $subject = Subject::create([
            'subject_name' => $validatedData['subject_name'],
            'subject_abb' => $validatedData['subject_abb'],
        ]);
        
        $subjectId = $subject->id;
        $levelsJson = json_encode($validatedData['levels']);
        $majorsJson = json_encode($validatedData['majors'] ?? []);

        DB::statement('CALL insert_subject_levels_procedure(?, ?, ?)', [$levelsJson, $majorsJson, $subjectId]);

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
        $levels = Level::all(); // Semua level (SMP, SMA, SMK)
        $majors = Major::all();
        $subjectLevels = $subject->levels()->pluck('subject_levels.level_id')->toArray();

        return view('subject.edit', [
            'page' => 'Edit Subject',
            'active' => 'subject',
            'subject' => $subject,
            'levels' => $levels,
            'majors' => $majors,
            'subjectLevels' => $subjectLevels,
            'title' => 'Subjects'
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
            'levels' => 'nullable|array',
            'levels.*' => 'exists:levels,id',
            'majors' => 'nullable|array',
            'majors.*' => 'exists:majors,id',
            'title' => 'Subjects'
        ]);

        // Update Subject
        $subject->subject_name = $validatedData['subject_name'];
        $subject->subject_abb = $validatedData['subject_abb'];
        $subject->save();
    
        // Contoh untuk levels
        $levelsJson = json_encode($validatedData['levels']); // Mengubah array levels menjadi JSON
        $majorsJson = json_encode($validatedData['majors']); // Mengubah array majors menjadi JSON

        // Panggil stored procedure untuk update
        DB::statement('CALL update_subject_level_and_major(?, ?, ?)', [
            $subject->id,
            $levelsJson,
            $majorsJson
        ]);
        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully');

}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $count = $subject->subjectLevel->flatMap(function ($subjectLevel) {
            return $subjectLevel->schedule;
        })->count();

        if ($count > 0) {
            return redirect()->route('subjects.index')->with('error', 'Cannot delete subject because it is still used in schedule.');
        }

        $subject->delete();
    
        return redirect()->route('subjects.index')->with('success', 'Subject successfully deleted.');
    }
}
