<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_name', 'cat_slug', 'cat_description', 'cat_order', 'cat_image', 'cat_is_featured', 'cat_status'
    ];

    /**
     * Get the subcategories for the category.
     */
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'cat_id');
    }

    /**
     * Get the products for the category.
     */
    public function cat_products()
    {
        return $this->hasMany(Product::class, 'category_id')->with('brands')->limit(4);
    }
}