<?php

namespace App\Http\Controllers;

use App\Models\TrainingSession;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TrainingSessionController extends Controller
{
    //

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
{
    // Validate the form input
    $validated = $request->validate([
        'dos' => 'required|date', // Date of session
        'location' => 'required|string',
        'time' => 'required|date_format:H:i',
        'session_note' => 'nullable|string',
        'medical_report' => 'nullable|string',
    ]);

    // Create a new TrainingSession instance with the validated data
    TrainingSession::create($validated);

    // Redirect to the training session manager route with success message
    return redirect()->route('trainingsessions.index')->with('success', 'Training session added successfully!');
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function manager(): View
    {
        $trainingsessions = TrainingSession::all();
        return view('trainingsessions.index', compact('trainingsessions'));
    }
}
