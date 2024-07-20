<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GlobalSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;

class GlobalSettingsController extends Controller
{
    public function index(): JsonResponse
    {
        $settings = Cache::remember('global_settings', 60, function() {
            return GlobalSetting::first();
        });

        return response()->json($settings);
    }

    public function store(Request $request): JsonResponse
    {
        $settings = GlobalSetting::first();

        $request->validate([
            'website_name' => 'required|string|max:255',
            'website_logo' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website_icon' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website_phone_number' => 'nullable|string|max:255',
            'website_domain' => 'nullable|string|max:255',
            'website_contact_address' => 'nullable|string|max:255',
            'website_email' => 'nullable|string|max:255|email',
            'website_facebook' => 'nullable|string|max:255',
            'website_instagram' => 'nullable|string|max:255',
            'website_linkedin' => 'nullable|string|max:255',
            'website_twitter' => 'nullable|string|max:255',
            'website_theme_color' => 'nullable|string|max:7'
        ]);

        $settings->website_name = $request->input('website_name');
        if ($request->hasFile('website_logo')) {
            if ($settings->website_logo) {
                Storage::disk('public')->delete($settings->website_logo);
            }
            $logoPath = $request->file('website_logo')->store('logos', 'public');
            $settings->website_logo = $logoPath;
        }
        if ($request->hasFile('website_icon')) {
            if ($settings->website_icon) {
                Storage::disk('public')->delete($settings->website_icon);
            }
            $iconPath = $request->file('website_icon')->store('icons', 'public');
            $settings->website_icon = $iconPath;
        }
        $settings->website_phone_number = $request->input('website_phone_number');
        $settings->website_domain = $request->input('website_domain');
        $settings->website_contact_address = $request->input('website_contact_address');
        $settings->website_facebook = $request->input('website_facebook');
        $settings->website_instagram = $request->input('website_instagram');
        $settings->website_linkedin = $request->input('website_linkedin');
        $settings->website_twitter = $request->input('website_twitter');
        $settings->website_email = $request->input('website_email');
        $settings->website_theme_color = $request->input('website_theme_color');

        $settings->save();

        Cache::put('global_settings', $settings, 60);

        return response()->json($settings);
    }
}
