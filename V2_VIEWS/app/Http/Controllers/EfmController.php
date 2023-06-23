<?php

namespace App\Http\Controllers;

use App\Models\Efm;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EfmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $efms = Efm::with('etudiant')->get();
        return view('efms.index', compact('efms'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $etudiants = Etudiant::all();
        return view('efms.create', compact('etudiants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codemodule' => 'required',
            'note' => 'required',
            'coef' => 'required',
            'etudiant_id' => 'required',
        ]);

        $efm = new Efm();

        $efm->codemodule = $request->input('codemodule');
        $efm->note = $request->input('note');
        $efm->coef = $request->input('coef');
        $efm->etudiant_id = $request->input('etudiant_id');

        $efm->save();

        return redirect()->route('efms.index')->with('success', 'Efm created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Efm $efm)
    {
        $ef = Efm::with('etudiant')->find($efm)->first();
        return view('efms.show', compact('ef'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Efm $efm)
    {
        $etudiants = Etudiant::all();
        return view('efms.edit', compact('efm', 'etudiants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Efm $efm)
    {
        $request->validate([
            'codemodule' => 'required',
            'note' => 'required',
            'coef' => 'required',
            'etudiant_id' => 'required',
        ]);

        $efm->update([
            "codemodule" => $request->input('codemodule'),
            "note" => $request->input('note'),
            "coef" => $request->input('coef'),
            "etudiant_id" => $request->input('etudiant_id'),
        ]);

        return redirect()->route('efms.index')->with('success', 'Efm updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Efm $efm)
    {
        $efm->delete();

        return redirect()->route('efms.index')->with('success', 'Efm deleted successfully.');
    }
}
