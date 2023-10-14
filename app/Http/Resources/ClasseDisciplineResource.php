<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClasseDisciplineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "discipline" =>$this->disciplines->libelle,
            "evaluation" =>$this->evaluations->libelle,
            "classe" =>$this->classes->libelle,
            "annee_scolaire" =>$this->annneeScolaires->libelle,
            "note_maximale" =>$this->note_max,
            "semestre" =>$this->semestres->libelle,
        ];
    }
}
