<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['pro_name', 'pro_slug', 'pro_description', 'pro_content', 'pro_main_image', 'pro_images', 'pro_sku', 'pro_order', 'pro_quantity', 'pro_allow_checkout_when_out_of_stock', 'pro_with_storehouse_management', 'pro_is_featured', 'pro_options', 'category_id', 'subcategory_id', 'brand_id', 'pro_is_variation', 'pro_variations', 'pro_is_searchable', 'pro_is_show_on_list', 'pro_sale_type', 'pro_buy_price', 'pro_sale_price', 'pro_discount', 'pro_start_date', 'pro_end_date', 'pro_length', 'pro_wide', 'pro_height', 'pro_weight', 'pro_barcode', 'pro_length_unit', 'pro_wide_unit', 'pro_height_unit', 'pro_weight_unit', 'tax_id', 'pro_views', 'pro_added_by', 'pro_stock_status', 'pro_status','pro_newarrival','pro_newproduct','pro_bestseller','pro_specialoffer'];
    //,'pro_newarrival','pro_newproduct','pro_bestseller','pro_specialoffer'

    protected $casts = [
        'pro_variations' => 'array'
    ];

    /**
     * Get the Category that owns the products.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Get the Brand that owns the products.
     */
    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

}
