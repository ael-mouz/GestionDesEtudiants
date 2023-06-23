<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashbordController extends Controller
{
    public function PV($filiere){
        $etudiants = DB::table('etudiants')
             ->join('modules', 'etudiants.id', '=', 'modules.etudiant')
             ->select('etudiants.id','etudiants.nom', 'etudiants.prenom',DB::raw('AVG(modules.note) as Moyenne'))
             ->where('etudiants.filiere', '=', $filiere)
             ->groupBy('etudiants.id','etudiants.nom', 'etudiants.prenom')
             ->get();
 
         return response()->json([
             'etudiants'  => $etudiants,
         ], 200);
     }
 
    public function MoyenneGenerale(){
     $filiere = DB::table('etudiants')
             ->join('filieres', 'filieres.codefiliere', '=', 'etudiants.filiere')
             ->join('modules', 'etudiants.id', '=', 'modules.etudiant')
            ->select('filieres.codefiliere','filieres.libellefilier',DB::raw('AVG(modules.note) as Moyenne'))
              ->groupBy('filieres.codefiliere','filieres.libellefilier')
             ->get();
          return response()->json([
             'Filieres'  => $filiere,
         ], 200);
     }

}
