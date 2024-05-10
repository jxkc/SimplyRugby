<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'dob' => 'required|date',
            'address' => 'required',
            'postcode' => 'required',
            'email' => 'required|email|unique:members',
            'phone' => 'required',
        ]);

        Member::create($request->all());

        return redirect()->route('members.index')
                         ->with('success', 'Member created successfully.');
    }

    public function manager()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
