<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_name', 'brand_description', 'brand_website', 'brand_logo', 'brand_order', 'brand_is_featured', 'brand_status'
    ];

    /**
     * Get the products for the category.
     */
    public function brand_products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }
}
