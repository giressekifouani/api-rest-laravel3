<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UtilisateursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          DB::table("utilisateurs")->updateOrInsert([
            'prenom'=> 'giresse',
            'nom'=> 'mignon',
            'sexe'=> 'Masculin',
            'adresse'=> 'Medina',
            'ville'=> 'Dakar',
            'pays'=> 'Senegal',
            'telephone'=> '76908568',
            'email'=> 'mignon@gmail.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
