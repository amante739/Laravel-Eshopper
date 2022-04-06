<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 2; $i++) { 
            Attribute::create([
                'attribute_name' => 'attr name '.$i,
                'attribute_slug' => 'attr-name-'.$i,
                'attribute_display_layout' => 'text',
                'attribute_is_comparable' => 1,
                'attribute_order' => $i,
                'attribute_is_use_in_product_listing' => 1,
                'attribute_status' => 1
            ]);
        }
    }
}
