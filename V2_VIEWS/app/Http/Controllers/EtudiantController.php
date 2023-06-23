<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('etudiants.index', compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('etudiants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cne' => 'required|integer',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'photo' => 'required',
            'cv' => 'required',
            'daten' => 'required|date',
            'email' => 'required|string|unique:etudiants,email,',
        ]);

        $etudiant = new Etudiant();

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo');
            $photo = time() . '.' . $photoPath->getClientOriginalExtension();
            $photoPath->move(public_path('photos'), $photo);
            $etudiant->photo = $photo;
        }

        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv');
            $cv = time() . '.' . $cvPath->getClientOriginalExtension();
            $cvPath->move(public_path('cv'), $cv);
            $etudiant->cv = $cv;
        }

        $etudiant->cne = $request->input('cne');
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->daten = $request->input('daten');
        $etudiant->email = $request->input('email');

        $etudiant->save();

        return redirect()->route('etudiants.index')->with('success', 'Etudiant created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        return view('etudiants.show', compact('etudiant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        return view('etudiants.edit', compact('etudiant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            'cne' => 'required|integer',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'cv' => 'nullable|mimes:pdf|max:2048',
            'daten' => 'required|date',
            'email' => 'required|string',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo');
            $photo = time() . '.' . $photoPath->getClientOriginalExtension();
            $photoPath->move(public_path('photos'), $photo);
        }

        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv');
            $cv = time() . '.' . $cvPath->getClientOriginalExtension();
            $cvPath->move(public_path('cv'), $cv);
        }

        $etudiant->update([
            "cne" => $request->input('cne'),
            "nom" => $request->input('nom'),
            "prenom" => $request->input('prenom'),
            "daten" => $request->input('daten'),
            "email" => $request->input('email'),
        ]);

        return redirect()->route('etudiants.index')->with('success', 'Etudiant updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();

        return redirect()->route('etudiants.index')->with('success', 'Etudiant deleted successfully.');
    }
}
