<?php

namespace App\Http\Resources;

use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "inscription"=> new InscriptionResource($this->inscriptions),
            "Ponderation"=> new ClasseDisciplineResource($this->classeDiscipline),
            "note" =>$this->note,
            "semestre"=>$this->semestre_id
        ];
    }
}
