<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClasseDisciplinePostRequest extends FormRequest
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
            "classe_id" => "required|exists:classes,id",
            "discipline_id" => "required|exists:disciplines,id",
            "evaluation_id" => "required|exists:disciplines,id",
            // "annee_scolaire_id" => "required|exists:annee_scolaires,id",
            'note_max' => 'nullable|numeric|min:0,max:40',
        ];
    }
    public function messages(){
        return [
            "classe_id.required" =>"l'\identifiant de la classe est obligatoire",
            "classe_id.exists" =>"l'\identifiant de la classe n'existe pas !",
            "discipline_id.required" =>"l'\identifiant de la discipline est obligatoire",
            "discipline_id.exists" =>"l'\identifiant de la discipline n'existe pas !",
            "evaluation_id.required" =>"l'\identifiant de l\'evaluation est obligatoire",
            "evaluation_id.exists" =>"l'\identifiant de l\'evaluation n'existe pas !",
            // "annee_scolaire_id.required" =>"l'\identifiant de l\'annee  est obligatoire",
            // "annee_scolaire_id.exists" =>"l'\identifiant de l\'annee n'existe pas !",
            "note_max.min" =>"la note minimale est 0",
            "note_max.numeric" =>"la note est un reel",
            "note_max.max" =>"la note minimale est 20"
        ];
    }
}
