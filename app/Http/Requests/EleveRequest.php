<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EleveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "nom" => "required",
            "prenom" => "required",
            "date_naissance"=>"sometimes|date|before:today - 4 years",
            "lieu_naissance"=>"sometimes",
            'sexe' => 'required|in:Masculin,Feminin',            
            "profil" => "required",
            "numero" =>"unique|numeric",
            "email" =>"required|email",
        ];
    }
    public function messages(){
        return [
            "nom.required" => "le nom est obligatoire !",
            "prenom.required" => "le prenom est obligatoire !",
            "date_naissance.date"=>"l\'eleve doit etre agé au moins 5ans !",
            "sexe.required" => "le prenom est obligatoire !",
            "sexe.in" => "Le champ sexe doit être soit masculin, soit féminin.",
            "profil.required" => "le prenom est obligatoire !",
            "numero.unique" => "the numero is only frere !",
            "numero.numeric" => "Le numero doit etre des chiffres !",
            "email.reqired" => "L\'email  est obligatoire mon cher !",
            "email.unique" => "L\'email est unique !",
            "email.email" => "L\'adresse que vous nous avez fourni est invalide !"

        ];
    }
}
