<?php

namespace App\Models\Api;

class Breeding extends \App\Models\Breeding
{
    public function getRouteKeyName()
    {
        return 'id';
    }
}
