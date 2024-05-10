<?php

namespace App\Http\Controllers;

use App\Models\NextOfKin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class KinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all Next of Kin records
        $kin = NextOfKin::all();
        
        // Pass the data to the view
        return view('kin.index', compact('kin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'kin_name' => 'required|string|max:255',
            'kin_address' => 'required|string|max:255',
            'kin_phone' => 'required|string|max:20',
        ]);

        // Create a new NextOfKin instance with the validated data
        NextOfKin::create($validatedData);

        // Redirect back with a success message
        return redirect()->route('kin.index')->with('success', 'Next of Kin added successfully!');
    }
}
