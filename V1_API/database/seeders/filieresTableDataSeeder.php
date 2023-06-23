<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Filiere;

class filieresTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Filiere::create([
            'codefiliere' => 'DDOFS',
            'libellefilier' => 'Developpement digital option full stack',
            'eff'=> '10'
        ]);
        Filiere::create([
            'codefiliere' => 'ID',
            'libellefilier' => 'Infrastructure Digital',
            'eff'=> '34'
        ]);
        Filiere::create([
            'codefiliere' => 'DDOAM',
            'libellefilier' => 'Developpement digital option application mobile',
            'eff'=> '34'
        ]);
        Filiere::create([
            'codefiliere' => 'VR',
            'libellefilier' => 'Vertuel Reality',
            'eff'=> '34'
        ]);
        Filiere::create([
            'codefiliere' => 'GE',
            'libellefilier' => 'Gestion Entreprise',
            'eff'=> '34'
        ]);
    }
}
