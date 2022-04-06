<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'pro_name' => 'Product One',
            'pro_description' => 'This is demo product description',
            'pro_content' => 'This is demo content description',
            'pro_images' => '',
            'pro_main_image' => '',
            'pro_sku' => 'PR-25',
            'pro_order' => 0,
            'pro_quantity' => 10,
            'pro_allow_checkout_when_out_of_stock' => 0,
            'pro_with_storehouse_management' => 0,
            'pro_is_featured' => 0,
            'pro_options' => Null,
            'category_id' => 1,
            'subcategory_id' => 1,
            'brand_id' => 1,
            'pro_is_variation' => 0,
            'pro_variations' => 0,
            'pro_is_searchable' => 0,
            'pro_is_show_on_list' => 0,
            'pro_sale_type' => 0,
            'pro_buy_price' => 800,
            'pro_sale_price' => 1000,
            'pro_discount' => 0,
            'pro_start_date' => '2021-12-03 03:03:23',
            'pro_end_date' => '2021-12-05 03:03:23',
            'pro_length' => 0,
            'pro_wide' => 0,
            'pro_height' => 0,
            'pro_weight' => 0,
            'pro_barcode' => null,
            'pro_length_unit' => null,
            'pro_wide_unit' => null,
            'pro_height_unit' => null,
            'pro_weight_unit' => null,
            'pro_views' => 0,
            'pro_added_by' => 1,
            'pro_stock_status' => 'in_stock',
            'pro_status' => 'published',   // published, draft, pending
        ]);
    }
}
