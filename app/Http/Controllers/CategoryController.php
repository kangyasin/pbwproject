<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //

    public function index(){
        // $category = Category::all();
        $category = Category::where('id', 1)->with('product')->get();

        return $category[0]['product'];
    }
}
