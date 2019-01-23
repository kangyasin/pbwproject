<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['category_id', 'name', 'description', 'price', 'boolean'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function image()
    {
        return $this->hasMany(ProductImage::class);

    }
}
