<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
class SkillController extends Controller
{
    //
    public function index()
    {
        $skills = Skill::all();
        return view('skills.index', compact('skills'));
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'passing_standard' => 'required|string',
            'passing_spin' => 'required|string',
            'passing_pop' => 'required|string',
            'tackling_front_rear' => 'required|string',
            'tackling_rear_side' => 'required|string',
            'tackling_side' => 'required|string',
            'tackling_scrabble' => 'required|string',
            'kicking_drop_punt' => 'required|string',
            'kicking_drop_grubber' => 'required|string',
            'kicking_drop_goal' => 'required|string',
        ]);

        // Create a new Skill instance with the validated data
        Skill::create($validated);

        // Redirect back or wherever you prefer
        return redirect()->back()->with('success', 'Skill created successfully.');
    }
}
