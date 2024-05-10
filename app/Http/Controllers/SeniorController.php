<?php

namespace App\Http\Controllers;

use App\Models\SeniorMember;
use App\Models\Doctor;
use App\Models\NextOfKin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SeniorController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        // Validate the form input
        $validated = $request->validate([
            'sru_number' => 'required|exists:members',
            'doctorid' => 'required|exists:doctors,doctorid',
            'kinid' => 'required|exists:next_of_kin,kinid',
            'position' => 'required',
        ]);

        // Create a new SeniorMember instance with the validated data
        SeniorMember::create($validated);

        // Redirect to the route for managing senior members
        return redirect()->route('senior-members.manager')->with('success', 'Senior member added successfully!');
    }

    public function manager()
    {
        $seniorMembers = SeniorMember::all();
        //dd($seniorMembers->first());
        $doctors = Doctor::all();
        $kins = NextOfKin::all();
        return view('players.senior.manager', compact('seniorMembers', 'doctors', 'kins'));
    }
}
