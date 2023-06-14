<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileRestaurantUpdateRequest extends FormRequest
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
            'designation' => ['required', 'string', 'max:200'],
            'description' => ['required', 'string', 'max:200'],
            'contact' => ['required', 'string', 'starts_with:+229'],
            'email' => ['required', 'email', 'string', 'max:255', Rule::unique('restaurants')->ignore(Auth::user()->restaurant)],
        ];
    }
}
