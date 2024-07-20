<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DogRequest extends FormRequest
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
            'dog_name' => ['nullable', 'max:100'],
            'dog_type' => ['nullable', 'in:adult,puppy'],
            'dog_breed' => ['nullable', 'max:100'],
            'dog_age' => ['nullable', 'numeric'],
            'dog_gender' => ['nullable', 'in:male,female'],
            'dog_weight' => ['nullable', 'numeric'],
            'dog_price' => ['nullable', 'numeric'],
            'dog_image' => ['nullable', 'image'],
            'dog_size' => ['required', 'numeric'],
            'dog_color' => ['nullable', 'string'],
            'dog_description' => ['nullable', 'string'],
        ];
    }
}
