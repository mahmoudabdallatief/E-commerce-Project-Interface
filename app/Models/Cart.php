<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'chart';
    protected $primaryKey = 'id';
    protected $fillable = ['id_user','id_pro','quantity','total','created_at','updated_at'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_pro');
    }
    
}