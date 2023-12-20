<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $table = 'prro';
    protected $fillable = ['id','name', 'price', 'count', 'des', 'cover', 'date', 'offer', 'cat', 'brand'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand');
    }
    public function Ratings()
    {
        return $this->hasMany(Rating::class, 'product_id', 'id');
    }
}