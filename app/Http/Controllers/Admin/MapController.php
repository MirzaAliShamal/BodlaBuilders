<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Map;

class MapController extends Controller
{
    public function list()
    {
    	$list = Map::all();
    	return view('admin.map.list', get_defined_vars());
    }

    public function add()
    {
    	return view('admin.map.add', get_defined_vars());
    }

    public function edit($id = null)
    {
    	$map = Map::find($id);

    	return view('admin.map.edit', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        if (is_null($id)) {

            $req->validate([
                'path' => 'required',
            ]);

        	$map = new Map();
        	$map->path = uploadFile($req->path, 'maps');
            $map->save();

            $msg = "Map Added Successfully!";
        } else {

            $map  = Map::find($id);
        	if ($req->path) {
                $map->path = uploadFile($req->path, 'maps');
            }
            $map->save();

            $msg = "Map Updated Successfully!";
        }

        return redirect()->route('admin.map.list')->with('success', $msg);
    }

    public function delete($id = null)
    {
    	Map::find($id)->delete();
    	return redirect()->back()->with('success', 'Map Deleted Successfully!');
    }
}
