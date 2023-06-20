<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlatRequest extends FormRequest
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
            'libelle' => ['required', 'numeric', 'min:1'],
            'description' => ['required', 'string'],
            'prix' => ['required', 'integer'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'created_by' => 'required|exists:users,id'
        ];
    }
}
