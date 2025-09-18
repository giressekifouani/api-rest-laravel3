<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $json = File::get(database_path('data/apipays.json'));
        $pays = json_decode($json, true);

        foreach ($pays as $p) {
            DB::table('pays')->insert([
                'nom' => $p['nom'],
                'iso2' => $p['iso2'],
                'iso3' => $p['iso3'],
                'capitale' => $p['capitale'] ?? null,
            ]);
        }
    }
}
