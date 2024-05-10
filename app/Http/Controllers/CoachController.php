<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    /**
     * Function to store a Request from a form
     * @return RedirectResponse Redirects if function completed successfully.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the form input
        $validated = $request->validate([
            'coach_name' => 'required|string|max:255',
        ]);

        // Check if the coach already exists
        $existingCoach = Coach::where('coach_name', $validated['coach_name'])->first();
        if ($existingCoach) {
            return back()->withErrors(['coach_name' => 'Coach already exists.'])->withInput();
        }

        // Create a new Coach instance with the validated data
        Coach::create($validated);

        // Redirect to the coach manager route with success message
        return redirect()->route('coaches.index')->with('success', 'Coach added successfully!');
    }

    /**
     * Returns a View of the coaches page.
     */
    public function manager()
    {
        return view('coaches.index');
    }
}
