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

    public function showImportForm()
    {
        $states = State::all();
        $disciplines = Discipline::all();

        return view('standards.import', compact('states', 'disciplines'));
    }

    public function importStandard(Request $request)
    {
        $stateAbbreviation = $request->input('state');
        $rawData = $request->input('data');
        
        // Split the raw data into sections by 'Discipline' (ignores tabs, just looks for 'Discipline')
        $sections = preg_split('/\n(?=Discipline)/', $rawData); // Split at each occurrence of "Discipline" preceded by a newline
        
        $createdStandards = [];
    
        // Process each section separately
        foreach ($sections as $section) {
            // Trim leading and trailing whitespace
            $section = trim($section);
    
            // Skip empty sections
            if (empty($section)) {
                continue;
            }
    
            // Split the section into lines by new lines
            $lines = explode("\n", $section);
    
            $fields = [];
            $disciplineName = null;
    
            foreach ($lines as $line) {
                // Trim the line and skip empty lines
                $line = trim($line);
                if (empty($line)) {
                    continue;
                }
    
                // Split the line into key-value pairs by tab
                $parts = preg_split('/\t+/', $line, 2);
    
                if (count($parts) === 2) {
                    $key = trim($parts[0]);
                    $value = trim($parts[1]);
    
                    // If the key is 'Discipline', assign it to disciplineName
                    if (strtolower($key) === 'discipline') {
                        $disciplineName = $value;
                    }
    
                    // Add the field to the array
                    $fields[$key] = $value;
                }
            }
    
            // Skip if no discipline name was found
            if (!$disciplineName) {
                continue;
            }
    
            // Create and save the standard for this discipline
            $standard = new Standard();
            $standard->name = $disciplineName;
            $standard->state_id = State::where('abbreviation', $stateAbbreviation)->value('id');
            $standard->discipline_id = Discipline::firstOrCreate(['name' => $disciplineName])->id;
            $standard->license_certificate = $fields['License/Certificate'] ?? "NA";
            $standard->state_department = $fields['State Department'] ?? "NA";
            $standard->state_department_hyperlink = $fields['State Department Hyperlink'] ?? "NA";
            $standard->type_of_license_certificate = $fields['Type of License/Certificate'] ?? "NA";
            $standard->age_range = $fields['Age Range'] ?? "NA";
            $standard->degree_level_requirement = $fields['Degree Level Requirement'] ?? "NA";
            $standard->licensure_specific_coursework = $fields['Licensure Require Specific Field or Clinical Work?'] ?? null;
            $standard->licensure_dependent_on_exam = $fields['Licensure Dependent on an Exam?'] ?? null;
            $standard->additional_req_part_c = $fields['Additoinal requirements specific to Part C?'] ?? null;
            $standard->additional_req_schools = $fields['Additional requirements specific for schools?'] ?? null;
    
            $standard->save();
            $createdStandards[] = $standard->name;
        }
    
        return redirect()->route('standards.index')->with('success', 'Standards imported: ' . implode(', ', $createdStandards));
    }
}
