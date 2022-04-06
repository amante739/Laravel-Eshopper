<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeSet extends Model
{
    use HasFactory;

    protected $fillable = [
        'attribute_id', 'attribute_set_name', 'attribute_set_slug', 'attribute_set_color', 'attribute_set_image', 'attribute_set_order', 'attribute_set_is_default', 'attribute_set_status'
    ];

    /**
     * Get the Attribute that owns the attributesets.
     */
    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }
}
