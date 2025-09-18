<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class personne extends Model
{
    protected $fillable = [
        // 'idcoordonnees',
        'prenom',
        'nom',
        'sexe',
        'datenaissance',
        'lieunaissance',
        'numeropiece',
    ];
}
