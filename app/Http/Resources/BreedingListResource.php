<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BreedingListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'breeding_male_dog_name' => $this->breeding_male_dog_name,
            'breeding_female_dog_name' => $this->breeding_female_dog_name,
            'breeding_description' => $this->breeding_description,
            'breeding_price' => $this->breeding_price,
            'breeding_male_dog_image' => $this->breeding_male_dog_image,
            'breeding_female_dog_image' => $this->breeding_female_dog_image,
            'updated_at' => (new \DateTime($this->updated_at))->format('Y-m-d H:i:s'),
        ];
    }
}
