<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DogResource extends JsonResource
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
            'dog_slug' => $this->dog_slug,
            'dog_name' => $this->dog_name,
            'dog_type' => $this->dog_type,
            'dog_breed' => $this->dog_breed,
            'dog_age' => $this->dog_age,
            'dog_gender' => $this->dog_gender,
            'dog_weight' => $this->dog_weight,
            'dog_price' => $this->dog_price,
            'dog_image' => $this->dog_image ?: null,
            'dog_size' => $this->dog_size,
            'dog_color' => $this->dog_color,
            'dog_description' => $this->dog_description,
            'created_at' => (new \DateTime($this->created_at))->format('Y-m-d H:i:s'),
            'updated_at' => (new \DateTime($this->updated_at))->format('Y-m-d H:i:s'),
        ];
    }
}