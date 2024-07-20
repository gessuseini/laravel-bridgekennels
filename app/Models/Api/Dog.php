<?php

namespace App\Models\Api;

class Dog extends \App\Models\Dog
{
    public function getRouteKeyName()
    {
        return 'id';
    }
}
