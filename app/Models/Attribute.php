<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'attribute_name', 'attribute_slug', 'attribute_display_layout', 'attribute_is_comparable', 'attribute_order', 'attribute_is_use_in_product_listing', 'attribute_status'
    ];

    /**
     * Get the attribute sets for the attribute.
     */
    public function attributesets()
    {
        return $this->hasMany(AttributeSet::class, 'attribute_id');
    }
}
