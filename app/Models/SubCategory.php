<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'subcat_name', 'subcat_slug', 'cat_id', 'subcat_description', 'subcat_order', 'subcat_image', 'subcat_is_featured', 'subcat_status'
    ];

    /**
     * Get the Category that owns the subcategories.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
}
