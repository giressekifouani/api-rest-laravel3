<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class clientele extends Model
{
    protected $fillable = [
        'idpersonne',
        'idcoordonnees',
        'secteuractivite',
        'typeclient',
    ];
}
