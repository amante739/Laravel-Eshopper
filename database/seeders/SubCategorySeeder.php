<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategory::create([
            'subcat_name' => 'Subcategory One',
            'subcat_slug' => 'subcategory-one',
            'cat_id' => 1,
            'subcat_description' => 'This is demo subcategroy description',
            'subcat_order' => '0',
            'subcat_image' => '',
            'subcat_is_featured' => 0,
            'subcat_status' => 1
        ]);
    }
}
