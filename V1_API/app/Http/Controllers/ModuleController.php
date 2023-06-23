<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use Validator;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::all();
        if ($modules == null)
        {
          return response()->json([
                  'message'  => "Aucune Note (s) trouvé(s)!",
            ], 422);
        }
        else
        {
          return response()->json($modules, 201);
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
        $module = Module::create($request->all());
        return response()->json([
            'msg' =>'Module bien ajoutée',
            'Module'  => $module,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        $module = Module::find($id);
        if ($module == null)
        {
            return response()->json([
                    'message'  => "Module introuvable!",
              ], 422);
        }
        else
        {
            return response()->json([
                'Module'  => $module,
            ], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $module = Module::find($id);
        if ($module == null)
        {
            return response()->json([
                    'message'  => "Module introuvable!",
              ], 422);
        }
        else
        {
            $module->update($request->all());
            return response()->json([
                'msg' =>'Module bien modifiée',
                'Module'  => $module,
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $module = Module::find($id);
        if ($module == null)
        {
            return response()->json([
                    'message'  => "Module introuvable!",
            ], 422);
        }
        else
        {
            Module::destroy($id);
             return response()->json([
                'msg' =>'Module bien supprimé',
            ], 200);
        }
    }
}
