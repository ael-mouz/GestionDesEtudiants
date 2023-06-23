<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    protected $table = 'filieres';

    protected $fillable = [
        'codefiliere',
        'libelle',
    ];

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'filiere_id');
    }
}
