<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Presence;

class PresenceController extends Controller
{
    public function index()
    {
        $employee_id = auth()->user()->employee->id;
        $today = Carbon::today();

        $presenceToday = Presence::where('employee_id', $employee_id)
                                ->whereDate('created_at', $today)
                                ->exists()
        ;

        $history = Presence::where('employee_id', $employee_id)->get()->sortByDesc('created_at');

        return view('presence.index', [
            'present' => $presenceToday,
            'histories' => $history
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required',
            'present' => 'required|boolean',
        ]);

        Presence::create($validated);

        return redirect()->route('presences.index')->with('success', 'Presence submitted successfully.');
    }
}
