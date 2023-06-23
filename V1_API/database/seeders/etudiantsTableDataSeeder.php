<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Etudiant;

class etudiantsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Etudiant::create([
            'id'=>'1',
            'nom'=>'Allaoui',
            'prenom'=>'Sarah',
            'email'=>'allaoui@gmail.com',
            'photo'=>'images\img1.jpg',
            'cv'=>'docs\cv1.pdf',
            'ville'=>'Casa',
            'datenaissance'=>'2000-12-22',
            'filiere'=>'DDOFS',
        ]);

        Etudiant::create([
            'id'=>'2',
            'nom'=>'Fadili',
            'prenom'=>'Ahmed',
            'email'=>'AA@gmail.com',
            'photo'=>'images\img2.jpg',
            'cv'=>'docs\cv2.pdf',
            'ville'=>'Casa',
            'datenaissance'=>'2000-10-16',
            'filiere'=>'DDOFS',
        ]);
        Etudiant::create([
            'id'=>'3',
            'nom'=>'Hamdaoui',
            'prenom'=>'Kamal',
            'email'=>'hamdaoui@gmail.com',
            'photo'=>'images\img3.jpg',
            'cv'=>'docs\cv3.pdf',
            'ville'=>'Casa',
            'datenaissance'=>'1999-12-05',
            'filiere'=>'VR',
        ]);

        Etudiant::create([
            'id'=>'4',
            'nom'=>'Fahmaoui',
            'prenom'=>'Said',
            'email'=>'fahmaoui@gmail.com',
            'photo'=>'images\img4.jpg',
            'cv'=>'docs\cv4.pdf',
            'ville'=>'Casa',
            'datenaissance'=>'1998-06-22',
            'filiere'=>'GE',
        ]);
        Etudiant::create([
            'id'=>'5',
            'nom'=>'Kandour',
            'prenom'=>'Rachid',
            'email'=>'kandour@gmail.com',
            'photo'=>'images\img5.jpg',
            'cv'=>'docs\cv5.pdf',
            'ville'=>'Rabat',
            'datenaissance'=>'1997-02-03',
            'filiere'=>'ID',
        ]);

        Etudiant::create([
            'id'=>'6',
            'nom'=>'Farid',
            'prenom'=>'Dalila',
            'email'=>'farid@gmail.com',
            'photo'=>'images\img6.jpg',
            'cv'=>'docs\cv6.pdf',
            'ville'=>'Rabat',
            'datenaissance'=>'2000-12-22',
            'filiere'=>'DDOAM',
        ]);
    Etudiant::create([
            'id'=>'7',
            'nom'=>'Hamdoun',
            'prenom'=>'Saad',
            'email'=>'hamdoun@gmail.com',
            'photo'=>'images\img7.jpg',
            'cv'=>'docs\cv7.pdf',
            'ville'=>'Fes',
            'datenaissance'=>'1999-11-22',
            'filiere'=>'DDOFS',
        ]);
      Etudiant::create([
            'id'=>'8',
            'nom'=>'Fadili',
            'prenom'=>'Soukina',
            'email'=>'fadili@gmail.com',
            'photo'=>'images\img8.jpg',
            'cv'=>'docs\cv8.pdf',
            'ville'=>'Fes',
            'datenaissance'=>'1998-01-22',
            'filiere'=>'VR',
        ]);

    }
}
