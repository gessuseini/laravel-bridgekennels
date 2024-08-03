<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BreedingResource extends JsonResource
{
    public static $wrap = false;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'breeding_slug' => $this->breeding_slug,
            'breeding_male_dog_name' => $this->breeding_male_dog_name,
            'breeding_female_dog_name' => $this->breeding_female_dog_name,
            'breeding_description' => $this->breeding_description,
            'breeding_price' => $this->breeding_price,
            'breeding_male_dog_image' => $this->breeding_male_dog_image ?: null,
            'breeding_female_dog_image' => $this->breeding_female_dog_image ?: null,
            'created_at' => (new \DateTime($this->created_at))->format('Y-m-d H:i:s'),
            'updated_at' => (new \DateTime($this->updated_at))->format('Y-m-d H:i:s'),
        ];
    }
}
