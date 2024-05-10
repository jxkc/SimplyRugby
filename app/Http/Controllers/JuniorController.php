<?php

namespace App\Http\Controllers;

use App\Models\JuniorMember;
use App\Models\Doctor;
use App\Models\Guardian;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JuniorController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the form input
        $validated = $request->validate([
            'sru_number' => 'required',
            'doctorid' => 'required|exists:doctors,doctorid', // Ensure the doctor exists in the doctors table
            'guardianid_1' => 'required|exists:guardians,guardianid', // Ensure the first guardian exists in the guardians table
            'guardianid_2' => 'required|exists:guardians,guardianid', // Ensure the second guardian exists in the guardians table
            'position' => 'required',
        ]);

        // Create a new SeniorMember instance with the validated data
        JuniorMember::create($validated);

        // Redirect to the route for managing senior members
        return redirect()->route('junior-members.manager')->with('success', 'Junior member added successfully!');
    }

    public function manager()
    {
        $juniorMembers = JuniorMember::all();
        $doctors = Doctor::all();
        $guardians = Guardian::all();
        return view('players.junior.manager', compact('juniorMembers', 'doctors', 'guardians'));
    }
}
