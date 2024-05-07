<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['billing_name','billing_address','billing_city','billing_state','billing_zip','shipping_name','shipping_address','shipping_city','shipping_state','shipping_zip','status','order_details_id','user_id'
];
public function order_details()
    {
        return $this->belongsTo(OrderDetails::class, 'order_details_id');
    }
}
