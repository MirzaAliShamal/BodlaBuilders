<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function list()
    {
    	$list = Gallery::all();
    	return view('admin.gallery.list', get_defined_vars());
    }

    public function add()
    {
    	return view('admin.gallery.add', get_defined_vars());
    }

    public function edit($id = null)
    {
    	$gallery = Gallery::find($id);

    	return view('admin.gallery.edit', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'title' => 'required',
        ]);

        if (is_null($id)) {

            $req->validate([
                'image' => 'required',
            ]);

        	$gallery = new Gallery();
        	$gallery->title = $req->title;
        	$gallery->path = uploadFile($req->image, 'galleries');
            $gallery->save();

            $msg = "Gallery Added Successfully!";
        } else {

            $gallery = Gallery::find($id);
        	$gallery->title = $req->title;
        	if ($req->image) {
                $gallery->path = uploadFile($req->image, 'galleries');
            }
            $gallery->save();

            $msg = "Gallery Updated Successfully!";
        }

        return redirect()->route('admin.gallery.list')->with('success', $msg);
    }

    public function delete($id = null)
    {
    	Gallery::find($id)->delete();
    	return redirect()->back()->with('success', 'Gallery Deleted Successfully!');
    }
}
