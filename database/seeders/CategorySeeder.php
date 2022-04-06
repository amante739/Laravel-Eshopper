<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'cat_name' => 'Category One',
            'cat_slug' => 'category-one',
            'cat_description' => 'This is demo category description',
            'cat_order' => '0',
            'cat_image' => '',
            'cat_is_featured' => 1,
            'cat_status' => 1
        ]);
    }
}
