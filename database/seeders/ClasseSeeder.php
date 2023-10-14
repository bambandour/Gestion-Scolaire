<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use \App\Models\Niveaux;
use \App\Models\Classe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $niveauxClasses = [
            'Elementaire' => ['CI', 'CP', 'CE1', 'CE2', 'CM1', 'CM2'],
            'Moyen' => ['6e', '5e', '4e','3e'],
            'Secondaire' => ['2nd', '1er', 'Tle'],
        ];

        foreach ($niveauxClasses as $niveauNom => $classes) {
            $niveau = Niveaux::where('libelle', $niveauNom)->first();

            if ($niveau) {
                // Créer les classes pour le niveau
                foreach ($classes as $classeNom) {
                    DB::table('classes')->insert([
                        'niveaux_id' => $niveau->id,
                        'libelle' => $classeNom,
                    ]);
                }
            }
        }
    }
}
