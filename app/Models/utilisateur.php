<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class utilisateur extends Model
{
    protected $fillable = [
        'prenom',
        'nom',
        'sexe',
        'adresse',
        'ville',
        'pays',
        'telephone',
        'email',
    ] ;
}
