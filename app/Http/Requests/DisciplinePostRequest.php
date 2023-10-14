<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisciplinePostRequest extends FormRequest
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
            "libelle" => "required",
            "code" => "min:3|max:4",
        ];
    }
    public function messages(){
        return [
            "libelle.required" =>"le libelle de la discipline est obligatoire! ",
            "code.min" =>"le code de la discipline doit avoir au minimum 3 lettres majuscules ! ",
            "code.max" =>"le code de la discipline doit etre au minimum 4 lettres majuscules ! ",
        ];
    } 
}
