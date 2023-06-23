<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $table = 'etudiants';

    protected $fillable = [
        'cne',
        'nom',
        'prenom',
        'photo',
        'cv',
        'daten',
        'email',
    ];

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'etudiant_id');
    }
}
