<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['billing_name','billing_address','billing_city','billing_state','billing_zip','shipping_name','shipping_address','shipping_city','shipping_state','shipping_zip',
];
}
