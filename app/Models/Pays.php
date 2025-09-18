<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    protected $fillable = [
        'nom',
        'iso2',
        'iso3',
        'capital',
    ];
}
