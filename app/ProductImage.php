<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';
    protected $fillable = ['product_id', 'name', 'main_image'];

    public function product()
    {
        // return $this->belongsTo(Product::class);
        return $this->belongsTo(Product::class, 'product_id');

    }
}
