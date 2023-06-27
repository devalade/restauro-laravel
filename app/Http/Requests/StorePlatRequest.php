<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlatRequest extends FormRequest
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

     protected function prepareForValidation()
     {
         $this->merge([
             'created_by' => auth()->user()->id
         ]);
     }

    public function rules(): array
    {
        return [
            'libelle' => ['required', 'string', 'min:1'],
            'description' => ['required', 'string', 'min:5'],
            'prix' => ['required', 'numeric'],
            'categorie_id' => ['required'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'created_by' => 'required|exists:users,id'
        ];
    }
}
