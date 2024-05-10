<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuardianController extends Controller
{
    /**
     * Display a listing of the guardians.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $guardians = Guardian::all();
        return view('guardian.index', compact('guardians'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate the form input
        $validated = $request->validate([
            'guardian_name' => 'required|string',
            'guardian_address' => 'required|string',
            'guardian_postcode' => 'required|string',
            'guardian_phone' => 'required|string',
            'guardian_signature' => 'nullable|string',
        ]);

        // Create a new Guardian instance with the validated data
        Guardian::create($validated);

        // Redirect to the guardians index route with success message
        return redirect()->route('guardian.index')->with('success', 'Guardian added successfully!');
    }
}
