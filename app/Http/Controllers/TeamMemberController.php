<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $team_members = TeamMember::orderBy('updated_at', 'desc')->get();
        return view('our-team', compact('team_members'));
    }
}
