<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Str;

class BlogController extends Controller
{
    public function list()
    {
    	$list = Blog::all();
    	return view('admin.blog.list', get_defined_vars());
    }

    public function add()
    {
    	return view('admin.blog.add', get_defined_vars());
    }

    public function edit($id = null)
    {
    	$blogs = Blog::find($id);

    	return view('admin.blog.edit', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $user = auth()->user();

        if (is_null($id)) {

            $req->validate([
                'image' => 'required',
            ]);

        	$blog = new Blog();
        	$blog->title = $req->title;
        	$blog->slug = Str::slug($req->title);
        	$blog->content = $req->content;
        	$blog->image = uploadFile($req->image, 'blogs');
        	$blog->user_id = $user->id;
            $blog->save();

            $msg = "News Added Successfully!";
        } else {

            $blog  = Blog::find($id);
        	$blog ->title = $req->title;
        	$blog ->slug = Str::slug($req->title);
        	$blog ->content = $req->content;
        	if ($req->image) {
                $blog ->image = uploadFile($req->image, 'blogs');
            }
        	$blog ->user_id = $user->id;
            $blog->save();

            $msg = "Blog Updated Successfully!";
        }

        return redirect()->route('admin.blog.list')->with('success', $msg);
    }

    public function delete($id = null)
    {
    	Blog::find($id)->delete();
    	return redirect()->back()->with('success', 'Blog Deleted Successfully!');
    }
}
