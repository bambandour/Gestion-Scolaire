<?php

namespace Database\Seeders;

use App\Models\Discipline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $disciplines = [
            ['libelle' => 'Activite Numerique', 'code' => 'ACN'],
            ['libelle' => 'Activite De Mesure', 'code' => 'ADM'],
            ["libelle" => "Observation",'code' => 'OBS'] ,
            ["libelle"  => "Geographie",'code' => 'GEO'],
            ["libelle"  => "Geometrie",'code' => null],
        ];

        foreach ($disciplines as $disciplineData) {
            Discipline::create($disciplineData);
        }
       
    }
}
