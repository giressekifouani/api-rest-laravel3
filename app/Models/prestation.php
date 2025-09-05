<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class prestation extends Model
{
    protected $fillable = [
        'utilisateur_id',
        'service_id',
    ] ;
}
