<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filieres = Filiere::all();
        return view('filieres.index', compact('filieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('filieres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codefiliere' => 'required|integer',
            'libelle' => 'required|string',
        ]);

        $filiere = new Filiere();

        $filiere->codefiliere = $request->input('codefiliere');
        $filiere->libelle = $request->input('libelle');

        $filiere->save();

        return redirect()->route('filieres.index')->with('success', 'Filiere created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Filiere $filiere)
    {
        return view('filieres.show', compact('filiere'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filiere $filiere)
    {
        return view('filieres.edit', compact('filiere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Filiere $filiere)
    {
        $request->validate([
            'codefiliere' => 'required|integer',
            'libelle' => 'required|string',
        ]);

        $filiere->update([
            "codefiliere" => $request->input('codefiliere'),
            "libelle" => $request->input('libelle')
        ]);

        return redirect()->route('filieres.index')->with('success', 'Filiere updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filiere $filiere)
    {
        $filiere->delete();

        return redirect()->route('filieres.index')->with('success', 'Filiere deleted successfully.');
    }
}
