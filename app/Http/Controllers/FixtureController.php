<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use SebastianBergmann\Comparator\Comparator;

class FixtureController extends Controller
{
    //
   public function store(Request $request): RedirectResponse
   {
       // Validate the form input
       $validated = $request->validate([
           'opposition_name' => 'required|string',
           'dom' => 'required|date',
           'location' => 'required|string',
           'kick_off' => 'required|date_format:H:i',
           'result' => 'nullable|string',
           'score' => 'nullable|string',
       ]);

       // Create a new Fixture instance with the validated data
       Fixture::create($validated);

       // Redirect to the fixture manager route with success message
       return redirect()->route('fixtures.index')->with('success', 'Fixture added successfully!');
   }

    public function manager()
    {
        $fixtures = Fixture::all();
        return view('fixtures.index', compact('fixtures'));
    }
}
