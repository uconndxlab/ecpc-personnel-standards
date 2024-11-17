<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use Illuminate\Http\Request;
use App\Models\Discipline;
use App\Models\State;

class StandardController extends Controller
{
    // Display a list of Standards
    public function index()
    {
        $standards = Standard::all();
        return view('standards.index', compact('standards'));
    }

    public function create()
    {
        $disciplines = Discipline::all();  // Fetch all disciplines
        $states = State::all();  // Fetch all states
        return view('standards.create', compact('disciplines', 'states'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'discipline_id' => 'required',
            'state_id' => 'required',
            'license_certificate' => 'required',
            'state_department' => 'required',
            'type_of_license_certificate' => 'required',
            'degree_level_requirement' => 'required',
            'age_range' => 'required',
            'licensure_specific_coursework' => 'required',
            'licensure_dependent_on_exam' => 'required',
            'additional_req_part_c' => 'required',
            'additional_req_schools' => 'required',
        ]);


        Standard::create($request->all());

        return redirect()->route('standards.index')
                         ->with('success', 'Standard created successfully.');
    }

    public function update(Request $request, Standard $standard)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'discipline_id' => 'required',
            'state_id' => 'required',
            'license_certificate' => 'required',
            'state_department' => 'required',
            'type_of_license_certificate' => 'required',
            'degree_level_requirement' => 'required',
            'age_range' => 'required',
            'licensure_specific_coursework' => 'required',
            'licensure_dependent_on_exam' => 'required',
            'additional_req_part_c' => 'required',
            'additional_req_schools' => 'required',
        ]);

        $standard->update($request->all());

        return redirect()->route('standards.index')
                         ->with('success', 'Standard updated successfully');
    }

    public function edit(Standard $standard)
    {
        $disciplines = Discipline::all();  // Fetch all disciplines
        $states = State::all();  // Fetch all states
        return view('standards.edit', compact('standard', 'disciplines', 'states'));
    }

    public function destroy(Standard $standard)
    {
        $standard->delete();

        return redirect()->route('standards.index')
                         ->with('success', 'Standard deleted successfully');
    }
}
