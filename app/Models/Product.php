<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'sku',
        'thumb',
        'image',
        'gallery_images',
        'title',
        'slug',
        'stock',
        'description',
        'category_id',
        'color',
        'size',
        'regular_price',
        'offer_price',
        'status',
        'assign',
 ];
  /**
     * Get the Product brand name that owns the product comment.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
     public function cart()
    {
        return $this->hasOne(Cart::class,'product_id');
    }
}
