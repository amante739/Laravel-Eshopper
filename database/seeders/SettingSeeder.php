<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'site_description' => "this is description",
            'site_address' => "address, address, address",
            'site_phone' => "357184387",
            'site_email' => "site@site.com",
            'site_facebook' => "www.facebook.com",
            'logo' => "logo.png",
            'site_map' => "www.map.com",
        ]);
    }
}
