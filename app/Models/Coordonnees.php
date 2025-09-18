<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coordonnees extends Model
{
    protected $table = 'coordonnees';
    protected $fillable = [
        'idpays',
        'telephone',
        'email',
        'adresse',
        'ville',
        'codepostal',
    ];
}
