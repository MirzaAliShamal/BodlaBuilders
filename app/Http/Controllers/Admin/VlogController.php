<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vlog;
use Str;

class VlogController extends Controller
{
    public function list()
    {
    	$list = Vlog::all();
    	return view('admin.vlog.list', get_defined_vars());
    }

    public function add()
    {
    	return view('admin.vlog.add', get_defined_vars());
    }

    public function edit($id = null)
    {
    	$vlogs = Vlog::find($id);

    	return view('admin.vlog.edit', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        if (is_null($id)) {

            $req->validate([
                'video' => 'required',
            ]);

        	$vlog = new Vlog();
        	$vlog->title = $req->title;
        	$vlog->slug = Str::slug($req->title);
        	$vlog->content = $req->content;
        	$vlog->video = uploadFile($req->video, 'vlogs');
            $vlog->save();

            $msg = "Vlogs Added Successfully!";
        } else {

            $vlog  = Blog::find($id);
        	$vlog ->title = $req->title;
        	$vlog ->slug = Str::slug($req->title);
        	$vlog ->content = $req->content;
        	if ($req->video) {
                $vlog->video = uploadFile($req->video, 'vlogs');
            }
            $vlog->save();

            $msg = "Vlogs Updated Successfully!";
        }

        return redirect()->route('admin.vlog.list')->with('success', $msg);
    }

    public function delete($id = null)
    {
    	Vlog::find($id)->delete();
    	return redirect()->back()->with('success', 'Vlog Deleted Successfully!');
    }
}
