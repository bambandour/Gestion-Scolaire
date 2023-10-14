<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
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
            // "classe_discipline_id" => "required|exists:classe_disciplines,id",
            // "inscription_id" => "required|exists:inscriptions,id",
            'note' => 'nullable|numeric|',
        ];
    }
    public function messages(){
        return[

            "inscription_id.exists" =>"l\'identifiant de l\'inscription n\'existe pas",
            "inscription_id.required" =>"l\'identifiant de l\'inscription est obligatoire",
            "classe_discipline_id.required" =>"l\'identifiant de la classe est obligatoire",
            "classe_discipline_id.exists" =>"l\'identifiant de la classe n'existe pas",
        ];
    }
}
// classes/{id}/bultins/{id}/
