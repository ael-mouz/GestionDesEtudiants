<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inscriptions = Inscription::with('etudiant', 'filiere')->get();
        return view('inscriptions.index', compact('inscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $etudiants = Etudiant::all();
        $filieres = Filiere::all();
        return view('inscriptions.create', compact('etudiants', 'filieres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dateinscription' => 'required|date',
            'filiere_id' => 'required',
            'etudiant_id' => 'required',
        ]);

        $inscription = new Inscription();

        $inscription->dateinscription = $request->input('dateinscription');
        $inscription->filiere_id = $request->input('filiere_id');
        $inscription->etudiant_id = $request->input('etudiant_id');

        $inscription->save();

        return redirect()->route('inscriptions.index')->with('success', 'Inscription created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inscription $inscription)
    {
        $ins = Inscription::with('etudiant', 'filiere')->find($inscription)->first();
        return view('inscriptions.show', compact('ins'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inscription $inscription)
    {
        $etudiants = Etudiant::all();
        $filieres = Filiere::all();
        return view('inscriptions.edit', compact('inscription', 'etudiants', 'filieres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inscription $inscription)
    {
        $request->validate([
            'dateinscription' => 'required',
            'filiere_id' => 'required',
            'etudiant_id' => 'required',
        ]);

        $inscription->update([
            "dateinscription" => $request->input('dateinscription'),
            "filiere_id" => $request->input('filiere_id'),
            "etudiant_id" => $request->input('etudiant_id'),
        ]);

        return redirect()->route('inscriptions.index')->with('success', 'Inscription updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inscription $inscription)
    {
        $inscription->delete();

        return redirect()->route('inscriptions.index')->with('success', 'Inscription deleted successfully.');
    }
}
