<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    public $table = "team_members";

    use HasFactory;

    protected $fillable = [
        'member_name',
        'member_image',
        'member_image_mime',
        'member_image_size',
        'member_role',
        'member_facebook',
        'member_twitter',
        'member_linkedin',
        'member_google_plus',
    ];
}
