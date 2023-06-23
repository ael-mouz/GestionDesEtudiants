<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;
use Validator;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filieres = Filiere::all();
        if ($filieres == null) {
          return response()->json([
                'message'  => "Aucune filiere (s) trouvé(s)!",
            ], 422);
       } else{
          return response()->json($filieres, 201);
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
            'codefiliere' => 'required',
            'libellefilier' => 'required',
            'eff' => 'required',
        ]);
        if ($validator->fails())
        {   
             return response()->json(['error'=>$validator->errors()], 401);     
        }
        else
        {
            $filiere = Filiere::create($request->all());
            return response()->json([
                'msg' =>'Filiere bien ajoutée',
                'Filiere'  => $filiere,
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
        $filiere = Filiere::where("codefiliere"  , "=" , $id)->first();
        if ($filiere == null)
        {
            return response()->json([
                    'message'  => "Filiere introuvable!",
            ], 422);
        }
        else
        {
            return response()->json([
                'Filiere'  => $filiere,
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
        $filiere = Filiere::where("codefiliere"  , "=" , $id)->first();
        if ($filiere == null)
        {
            return response()->json([
                    'message'  => "filiere introuvable!",
              ], 422);
        } 
        else{
            $filiere->update($request->all());
            return response()->json([
                'msg' =>'Filiere bien modifiée',
                'Filiere'  => $filiere,
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
        $filiere = Filiere::where("codefiliere"  , "=" , $id)->first();
        if ($filiere == null)
        {
            return response()->json([
                    'message'  => "Filiere introuvable!",
              ], 422);
        }
        else
        {
            $filiere = Filiere::where("codefiliere"  , "=" , $id)->delete();
            return response()->json([
                'msg' =>'Filiere bien supprimé',
            ], 200);
        }

    }
}
