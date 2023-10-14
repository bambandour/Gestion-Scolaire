<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipantRequest extends FormRequest
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
            "data"=> "required|array",
            "data.*.event_id" => "required|exists:events,id",
            "data.*.classe_id" => "required|exists:classes,id",
        ];
    }

    public function messages(){
        return[
            "data.event_id.exists" =>"l'identifiant de l'evenement n'existe pas",
            "data.event_id.required" =>"l'identifiant de l'evenement est obligatoire",
            "classe_id.required" =>"l'identifiant de la classe est obligatoire",
            "classe_id.exists" =>"l'identifiant de la classe n'existe pas",
        ];
    }
}
