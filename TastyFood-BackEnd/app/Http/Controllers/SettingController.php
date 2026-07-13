<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = DB::table('settings')->pluck('value', 'key')->all();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'about_title'               => 'required|string|max:255',
            'about_desc_1'              => 'required|string',
            'about_desc_2'              => 'required|string',
            'visi'                      => 'required|string',
            'misi'                      => 'required|string',
            'contact_email'             => 'required|email|max:255',
            'contact_phone'             => 'required|string|max:255',
            'contact_address'           => 'required|string|max:255',
            'contact_maps'              => 'required|string',
            'contact_instagram'         => 'nullable|url|max:255',
            'contact_facebook'          => 'nullable|url|max:255',
            'contact_twitter'           => 'nullable|url|max:255',
            'home_hero_desc'            => 'required|string',
            'home_about_desc'           => 'required|string',
            'home_card1_title'          => 'required|string|max:255',
            'home_card1_desc'           => 'required|string',
            'home_card2_title'          => 'required|string|max:255',
            'home_card2_desc'           => 'required|string',
            'home_card3_title'          => 'required|string|max:255',
            'home_card3_desc'           => 'required|string',
            'home_card4_title'          => 'required|string|max:255',
            'home_card4_desc'           => 'required|string',
            'home_hero_image'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'home_card1_image'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'home_card2_image'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'home_card3_image'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'home_card4_image'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Footer & Contact Page Settings
            'footer_desc'               => 'nullable|string',
            'contact_title'             => 'nullable|string|max:255',
            'contact_banner'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'footer_useful_link_1_name' => 'nullable|string|max:100',
            'footer_useful_link_1_url'  => 'nullable|string|max:255',
            'footer_useful_link_2_name' => 'nullable|string|max:100',
            'footer_useful_link_2_url'  => 'nullable|string|max:255',
            'footer_useful_link_3_name' => 'nullable|string|max:100',
            'footer_useful_link_3_url'  => 'nullable|string|max:255',
            'footer_useful_link_4_name' => 'nullable|string|max:100',
            'footer_useful_link_4_url'  => 'nullable|string|max:255',
            'footer_privacy_link_1_name'=> 'nullable|string|max:100',
            'footer_privacy_link_1_url' => 'nullable|string|max:255',
            'footer_privacy_link_2_name'=> 'nullable|string|max:100',
            'footer_privacy_link_2_url' => 'nullable|string|max:255',
            'footer_privacy_link_3_name'=> 'nullable|string|max:100',
            'footer_privacy_link_3_url' => 'nullable|string|max:255',
            'footer_privacy_link_4_name'=> 'nullable|string|max:100',
            'footer_privacy_link_4_url' => 'nullable|string|max:255',
        ]);

        // Process standard text fields (exclude all image fields)
        $imageOnlyFields = [
            'home_hero_image', 'home_card1_image', 'home_card2_image',
            'home_card3_image', 'home_card4_image', 'contact_banner',
        ];
        $textFields = collect($validated)->except($imageOnlyFields)->all();

        foreach ($textFields as $key => $value) {
            DB::table('settings')->updateOrInsert(
                ['key' => $key],
                ['value' => $value, 'updated_at' => now()]
            );
        }

        // Process image file fields
        $imageFields = [
            'home_hero_image'   => 'settings',
            'home_card1_image'  => 'settings',
            'home_card2_image'  => 'settings',
            'home_card3_image'  => 'settings',
            'home_card4_image'  => 'settings',
            'contact_banner'    => 'contact_banners',
        ];

        foreach ($imageFields as $field => $folder) {
            if ($request->hasFile($field)) {
                // Delete old image if exists
                $oldImage = DB::table('settings')->where('key', $field)->value('value');
                if ($oldImage) {
                    $storagePath = str_replace(asset('storage/'), '', $oldImage);
                    if ($storagePath && $storagePath !== $oldImage) {
                        Storage::disk('public')->delete($storagePath);
                    }
                }

                // Store new image
                $path = $request->file($field)->store($folder, 'public');
                $absoluteUrl = asset('storage/' . $path);

                DB::table('settings')->updateOrInsert(
                    ['key' => $field],
                    ['value' => $absoluteUrl, 'updated_at' => now()]
                );
            }
        }

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
