<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'brand_name' => 'Brand One',
            'brand_description' => 'This is demo brand description',
            'brand_website' => 'www.brand.com',
            'brand_logo' => '',
            'brand_order' => '0',
            'brand_is_featured' => 1,
            'brand_status' => 1
        ]);
    }
}
