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

    public function add_blog()
    {
        // return 23;
        return view('admin/add_blog');
    }

    public function store(Request $request)
    {
        if ($request->hasfile('filename')) {
            $file = $request->file('filename');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);
        }
        $blog = new Blog;
        $blog->title = $request->get('name');
        $blog->description = $request->get('description');
        $blog->email = $request->get('email');
        $blog->telp = $request->get('telp');
        // $blog->filename = $name;
        $blog->save();

        return redirect('admin/blog')->with('success', 'Information has been added');
    }

    public function edit_blog($id)
    {
        $blog = Blog::find($id);
        return view('admin/edit_blog', compact('blog', 'id'));
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect('admin/blog')->with('success', 'Information has been  deleted');
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $blog = Blog::find($id);
        $blog->title = $request->get('name');
        $blog->description = $request->get('description');
        $blog->save();
        return redirect('admin/blog');
    }
}
