<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductImage;
class ProductImageController extends Controller
{
    public function index($product_id = null){
        $images = ProductImage::where('product_id', '=', $product_id)->get();
        return view('admin.product.image', compact('images'));
    }
}
