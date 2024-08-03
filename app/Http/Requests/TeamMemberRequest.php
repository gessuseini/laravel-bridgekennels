<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamMemberRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'member_name' => 'required|string|max:255',
            'member_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'member_role' => 'required|string|max:255',
            'member_facebook' => 'nullable|string|max:255',
            'member_twitter' => 'nullable|string|max:255',
            'member_linkedin' => 'nullable|string|max:255',
            'member_google_plus' => 'nullable|string|max:255',
        ];
    }
}
