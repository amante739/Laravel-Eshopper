<?php

namespace Database\Seeders;

use App\Models\AttributeSet;
use Illuminate\Database\Seeder;

class AttributeSetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 5; $i++) { 
            AttributeSet::create([
                'attribute_id' => 1,
                'attribute_set_name' => 'set name '.$i,
                'attribute_set_slug' => 'set-name-'.$i,
                'attribute_set_color' => '#FFFFFF',
                'attribute_set_image' => '',
                'attribute_set_order' => $i,
                'attribute_set_is_default' => 0,
                'attribute_set_status' => 1
            ]);
        }
        for ($i=6; $i <= 10; $i++) { 
            AttributeSet::create([
                'attribute_id' => 2,
                'attribute_set_name' => 'set name '.$i,
                'attribute_set_slug' => 'set-name-'.$i,
                'attribute_set_color' => '#FFFFFF',
                'attribute_set_image' => '',
                'attribute_set_order' => $i,
                'attribute_set_is_default' => 0,
                'attribute_set_status' => 1
            ]);
        }
    }
}
