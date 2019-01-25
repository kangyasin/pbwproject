<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    //

    public function index($category_id = null){
        $products = Product::where('category_id', '=', $category_id)->get();
        return view('admin.product.product', compact('products'));
    }
}
