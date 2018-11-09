<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminBlog;
use App\Blog;

class AdminBlogController extends Controller
{

    //
    public function index()
    {

        $DataBlogs = Blog::all();
        return view('admin/blog', compact('DataBlogs'));


    }
}
