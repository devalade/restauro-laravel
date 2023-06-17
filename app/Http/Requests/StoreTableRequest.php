<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTableRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'created_by' => auth()->user()->id
        ]);
    }

    public function rules(): array
    {
        return [
            'numero_table' => ['required', 'numeric', 'min:1'],
            'capacite' => ['required', 'numeric', 'min:1'],
            'image' => ['nullable'],
            'statut_table_id' => 'required|exists:statut_tables,id',
            'created_by' => 'required|exists:users,id'
        ];
    }
}
