<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Efm extends Model
{
    use HasFactory;

    protected $table = 'efms';

    protected $fillable = [
        'codemodule',
        'note',
        'coef',
        'etudiant_id'
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'etudiant_id');
    }
}
