<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("services")->updateOrInsert([
            'nom'=> 'KM Service',
            'description'=> 'developpement',
            'categorie'=> 'informatique',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
