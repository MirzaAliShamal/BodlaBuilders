<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Floor;

class FloorController extends Controller
{
    public function list()
    {
    	$list = Floor::all();
    	return view('admin.floor.list', get_defined_vars());
    }

    public function add()
    {
        $floors = Floor::orderBy('name', 'ASC')->get();
    	return view('admin.floor.add', get_defined_vars());
    }

    public function edit($id = null)
    {
    	$floor = Floor::find($id);

    	return view('admin.floor.edit', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'name' => 'required',
            'possession' => 'required',
            'downpayment' => 'required',
        ]);

        if (is_null($id)) {

        	$floor = new Floor();
        	$floor->name = $req->name;
        	$floor->possession = $req->possession;
        	$floor->downpayment = $req->downpayment;
            $floor->save();

            $msg = "Floor Added Successfully!";
        } else {

            $floor = Floor::find($id);
        	$floor->name = $req->name;
        	$floor->possession = $req->possession;
        	$floor->downpayment = $req->downpayment;
            $floor->save();

            $msg = "Floor Updated Successfully!";
        }

        return redirect()->route('admin.floor.list')->with('success', $msg);
    }

    public function delete($id = null)
    {
    	Floor::find($id)->delete();
    	return redirect()->back()->with('success', 'Floor Deleted Successfully!');
    }
}
