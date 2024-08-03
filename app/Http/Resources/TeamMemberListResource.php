<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamMemberListResource extends JsonResource
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
            'member_name' => $this->member_name,
            'member_image' => $this->member_image ?: null,
            'member_role' => $this->member_role,
            'member_facebook' => $this->member_facebook,
            'member_twitter' => $this->member_twitter,
            'member_linkedin' => $this->member_linkedin,
            'member_google_plus' => $this->member_google_plus,
            'updated_at' => (new \DateTime($this->updated_at))->format('Y-m-d H:i:s'),
        ];
    }
}
