<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class DoctorController extends Controller
{
    /**
     * Display a listing of the doctors.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Store a newly created doctor in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'doctor_name' => 'required|string',
            'doctor_address' => 'required|string',
            'doctor_phone' => 'required|string',
        ]);

        // Create a new Doctor instance with the validated data
        Doctor::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('doctors.index')->with('success', 'Doctor added successfully.');
    }
}
