<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InscriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "prenom" =>$this->eleves->prenom,
            "nom" =>$this->eleves->nom,
            "classe"=>$this->classes->libelle,
            "annee_scolaire"=>$this->anneeScolaires->libelle,
            "date_inscription"=>$this->date_inscription,
        ];
    }
}
