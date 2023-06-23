<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use Validator;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $etudiants = Etudiant::all();
        if ($etudiants == null)
        {
            return response()->json([
                'message'  => "Aucun etudiant(s) trouvé(s)!",
            ], 422);
        }
        else
        {
            return response()->json($etudiants, 201);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'photo'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nom'       => 'required',
            'email'     => 'required|email',
            'filiere'   => 'required',
        ]);
        if ($validator->fails())
        {   
             return response()->json(['error'=>$validator->errors()], 401);     
        }
        else
        {
            $photo = time().'.'.$request->photo->extension();  
            $request->photo->move(public_path('images'), $photo);
            $cv = "CV".time().'.'.$request->cv->extension();  
            $request->cv->move(public_path('docs'), $cv);
            $input = array(
                'nom'           => $request->nom,
                'prenom'        => $request->prenom,
                'email'         => $request->email,
                'photo'         => 'images\\'.$photo,
                'cv'            => 'docs\\'.$cv,
                'ville'         => $request->ville,
                'datenaissance' => $request->datenaissance,
                'filiere'       => $request->filiere,
            );
            $etudiant = Etudiant::create($input);
            return response()->json([
                'msg'       => 'Etudiant bien ajouté',
                'etudiant'  => $etudiant,
            ], 200);
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etudiant = Etudiant::find($id);
        if ($etudiant == null)
        {
            return response()->json([
                'message'  => "Etudiant introuvable!",
            ], 422);
        } 
        else
        {
            return response()->json([
            'etudiant'  => $etudiant,
            ], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $etudiant = Etudiant::find($id);
        if ($etudiant == null)
        {
            return response()->json([
                'message'  => "Etudiant introuvable!",
          ], 400);
        }
        else
        {
            $etudiant->update($request->all());
            return response()->json([
                'msg' =>'Etudiant bien modifié',
                'etudiant'  => $etudiant,
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etudiant = Etudiant::find($id);
        if ($etudiant == null)
        {
            return response()->json([
                    'message'  => "Etudiant introuvable!",
              ], 422);
        } 
        else
        {
            Etudiant::destroy($id);
            return response()->json([
                'msg' =>'Etudiant bien supprimé',
            ], 200);
        }
    }
}
