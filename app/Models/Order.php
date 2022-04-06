<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'shipping_option', 'shipping_method', 'order_status', 'order_amount', 'currency_id', 'tax_amount', 'shipping_amount', 'order_description', 'coupon_code', 'order_discount_amount', 'sub_total', 'order_is_confirmed', 'order_confirmed_by', 'order_discount_description', 'order_is_finished', 'order_finished_by', 'order_token', 'payment_id', 'first_name', 'last_name', 'address_1', 'address_2', 'city', 'zip', 'phone', 'email'];

    // protected $casts = [
    //     'pro_variations' => 'array'
    // ];
}
