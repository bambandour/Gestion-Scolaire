<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClasseResource;
use App\Http\Resources\EleveResource;
use App\Http\Resources\InscriptionResource;
use App\Models\AnneeScolaire;
use App\Models\Classe;
use Illuminate\Http\Request;
use \App\Models\Eleve;
use App\Models\Inscription;

class InscriptionController extends Controller
{
    public function GetElevesByClasse($classeId)
    {
        $anneeScolaireId=1;
        $eleves = Inscription::where('classe_id', $classeId)
            ->where('annee_scolaire_id', $anneeScolaireId)
            ->with('eleves')
            ->get();
            // ->pluck('eleves'); 
        return InscriptionResource::collection($eleves);


        // $classe = Classe::findOrFail($classeId);

        // $eleves = $classe->eleves()->get();

        // // return response()->json($eleves);

        // return EleveResource::collection($eleves);
  
    }
}
