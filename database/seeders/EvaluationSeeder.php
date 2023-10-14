<?php

namespace Database\Seeders;

use App\Models\Evaluation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $evaluations = [
            ['libelle' => 'Devoir'],
            ['libelle' => 'Composition'],
            ["libelle" => "Examen"] ,
            ["libelle"  => "Ressource"] ,
            
        ];

        foreach ($evaluations as $evalsData) {
            Evaluation::create($evalsData);
        }
    }
}
