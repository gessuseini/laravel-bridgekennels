<?php

namespace App\Models\Api;

class TeamMember extends \App\Models\TeamMember
{
    public function getRouteKeyName()
    {
        return 'id';
    }
}
