<?php

namespace Database\Seeders;

use \App\Models\Niveaux;
use \App\Models\Classe;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            NiveauxSeeder::class,
            ClasseSeeder::class
        ]);
    }
}
