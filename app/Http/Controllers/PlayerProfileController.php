<?php

namespace App\Http\Controllers;

use App\Models\PlayerProfile;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PlayerProfileController extends Controller
{
    //
    public function index()
    {
        $playerProfiles = PlayerProfile::all();
        $skills = Skill::all();
        return view('players.playerprofile.index', compact('playerProfiles', 'skills'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'sru_number' => ['required', 'string', 'max:255'],
            'squad' => ['required', 'string', 'max:255'],
            'comment' => ['nullable', 'string'],
            'medical_note' => ['nullable', 'string'],
            // Add more validation rules as needed for other fields
        ]);
        

        // Create a new skill
        $skill = Skill::create([
            'passing_standard' => $request->passing_standard,
            'passing_spin' => $request->passing_spin,
            'passing_pop' => $request->passing_pop,
            'tackling_front_rear' => $request->tackling_front_rear,
            'tackling_rear_side' => $request->tackling_rear_side,
            'tackling_side' => $request->tackling_side,
            'tackling_scrabble' => $request->tackling_scrabble,
            'kicking_drop_punt' => $request->kicking_drop_punt,
            'kicking_drop_grubber' => $request->kicking_drop_grubber,
            'kicking_drop_goal' => $request->kicking_drop_goal,
        ]);

        // Create a new PlayerProfile instance
        $playerProfile = new PlayerProfile([
            'sru_number' => $validatedData['sru_number'],
            'skillid' => $skill->id,
            'squad' => $validatedData['squad'],
            'comment' => $validatedData['comment'],
            'medical_note' => $validatedData['medical_note'],
            // Add more fields here if needed
        ]);

        $playerProfile->skillid = $skill->id;
        $playerProfile->save();

        // Redirect the user to a relevant page, such as the index page
        return redirect()->route('players.playerprofile.index')->with('success', 'Player profile created successfully!');
    }
}
