<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    public function index()
    {
        $states = State::all(); // Fetch all states
        return view('states.index', compact('states'));
    }
    public function show($abbreviation)
    {
        // convert the abbreviation to uppercase to match the database
        $abbreviation = strtoupper($abbreviation);
        $state = State::where('abbreviation', $abbreviation)->firstOrFail();

        // Load associated standards with discipline for display
        $standards = $state->standards()->with('discipline')->get();

        return view('states.show', compact('state', 'standards'));
    }
}
