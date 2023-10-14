<?php

namespace Database\Seeders;

use App\Models\Semestre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semestres = [
            ['libelle' => 'Semestre 1', 'etat' => 1],
            ['libelle' => 'Semestre 2', 'etat' => 0],
            ["libelle" => "Semestre 3",'etat' => 0] ,
        ];

        foreach ($semestres as $semestre) {
            Semestre::create($semestre);
        }
    }
}
