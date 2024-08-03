<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BreedingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            'breeding_male_dog_name' => ['nullable', 'max:100'],
            'breeding_female_dog_name' => ['nullable', 'max:100'],
            'breeding_description' => ['nullable', 'string'],
            'breeding_price' => ['nullable', 'numeric'],
            'breeding_male_dog_image' => ['nullable', 'image'],
            'breeding_female_dog_image' => ['nullable', 'image'],
        ];
    }
}
