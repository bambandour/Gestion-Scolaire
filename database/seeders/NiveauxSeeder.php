<?php

namespace Database\Seeders;


use \App\Models\Niveaux;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NiveauxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $niveaux=[
        ["libelle" => "Elementaire"] ,
        ["libelle"  => "Moyen"],
        ["libelle" => "Secondaire"] 
       ] ;
        Niveaux::insert($niveaux);
    }
}