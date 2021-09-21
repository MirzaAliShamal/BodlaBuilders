<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Str;

class NewsController extends Controller
{
    public function list()
    {
    	$list = News::all();
    	return view('admin.news.list', get_defined_vars());
    }

    public function add()
    {
    	return view('admin.news.add', get_defined_vars());
    }

    public function edit($id = null)
    {
    	$news = News::find($id);

    	return view('admin.news.edit', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        if (is_null($id)) {

            $req->validate([
                'image' => 'required',
            ]);

        	$news = new News();
        	$news->title = $req->title;
        	$news->slug = Str::slug($req->title);
        	$news->content = $req->content;
        	$news->image = uploadFile($req->image, 'news');
            $news->save();

            $msg = "News Added Successfully!";
        } else {

            $news = News::find($id);
        	$news->title = $req->title;
        	$news->slug = Str::slug($req->title);
        	$news->content = $req->content;
        	if ($req->image) {
                $news->image = uploadFile($req->image, 'news');
            }
            $news->save();

            $msg = "News Updated Successfully!";
        }

        return redirect()->route('admin.news.list')->with('success', $msg);
    }

    public function delete($id = null)
    {
    	News::find($id)->delete();
    	return redirect()->back()->with('success', 'News Deleted Successfully!');
    }
}
