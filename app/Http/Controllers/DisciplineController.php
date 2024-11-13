<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discipline;

class DisciplineController extends Controller
{
    public function index()
    {
        $disciplines = Discipline::all();
        return view('disciplines.index', compact('disciplines'));
    }

    public function create()
    {
        return view('disciplines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:disciplines',
        ]);

        Discipline::create($request->all());

        return redirect()->route('disciplines.index')
                         ->with('success', 'Discipline created successfully.');
    }
}
