<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DhaProperty;

class DHAPropertyController extends Controller
{
    public function list()
    {
    	$list = DhaProperty::all();
    	return view('admin.dha.list', get_defined_vars());
    }

    public function add()
    {
    	return view('admin.dha.add', get_defined_vars());
    }

    public function edit($id = null)
    {
    	$dha = DhaProperty::find($id);

    	return view('admin.dha.edit', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'sector' => 'required',
            'plot' => 'required',
            'charges' => 'required',
            'name' => 'required',
            'contact' => 'required',
            'demand' => 'required',
            'description' => 'required',
        ]);

        if (is_null($id)) {

        	$dha = new DhaProperty();
        	$dha->sector = $req->sector;
        	$dha->plot = $req->plot;
        	$dha->charges = $req->charges;
        	$dha->name = $req->name;
        	$dha->contact = $req->contact;
        	$dha->demand = $req->demand;
        	$dha->description = $req->description;
            $dha->save();

            $msg = "Dha Property Added Successfully!";
        } else {

            $dha = DhaProperty::find($id);
        	$dha->sector = $req->sector;
        	$dha->plot = $req->plot;
        	$dha->charges = $req->charges;
        	$dha->name = $req->name;
        	$dha->contact = $req->contact;
        	$dha->demand = $req->demand;
        	$dha->description = $req->description;
            $dha->save();

            $msg = "Dha Property Updated Successfully!";
        }

        return redirect()->route('admin.dha.list')->with('success', $msg);
    }

    public function delete($id = null)
    {
    	DhaProperty::find($id)->delete();
    	return redirect()->back()->with('success', 'Dha Property Deleted Successfully!');
    }
}
