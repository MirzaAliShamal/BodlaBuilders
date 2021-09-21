<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectSubType;
use Illuminate\Http\Request;
use App\Models\ProjectType;
use App\Models\Property;
use App\Models\Project;
use App\Models\Floor;

class PropertyController extends Controller
{
    public function list()
    {
    	$list = Property::all();
    	return view('admin.property.list', get_defined_vars());
    }

    public function add()
    {
        $projects = Project::orderBy('name', 'ASC')->get();
        $floors = Floor::orderBy('id', 'ASC')->get();

    	return view('admin.property.add', get_defined_vars());
    }

    public function edit($id = null)
    {
    	$property = Property::find($id);
        $projects = Project::orderBy('name', 'ASC')->get();
        $floors = Floor::orderBy('id', 'ASC')->get();

    	return view('admin.property.edit', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'project_id' => 'required',
            'floor' => 'required',
            'downpayment' => 'required',
            'possession' => 'required',
            'name' => 'required',
            'amount' => 'required',
            'description' => 'required',
        ]);

        if (is_null($id)) {

        	$property = new Property();
        	$property->project_id = $req->project_id;
        	$property->type = $req->type;
        	$property->subtype = $req->subtype;
        	if ($req->image) {
                $property->image = uploadFile($req->image, 'properties');
            }
            $property->floor = $req->floor;
            $property->downpayment = $req->downpayment;
            $property->possession = $req->possession;
        	$property->name = $req->name;
        	$property->amount = $req->amount;
        	$property->description = $req->description;
            $property->save();

            $msg = "Property Added Successfully!";
        } else {

            $property = ProjectSubType::find($id);
        	$property->project_id = $req->project_id;
        	$property->type = $req->type;
        	$property->subtype = $req->subtype;
        	if ($req->image) {
                $property->image = uploadFile($req->image, 'properties');
            }
            $property->floor = $req->floor;
            $property->downpayment = $req->downpayment;
            $property->possession = $req->possession;
        	$property->name = $req->name;
        	$property->amount = $req->amount;
        	$property->description = $req->description;
            $property->save();

            $msg = "Property Updated Successfully!";
        }

        return redirect()->route('admin.property.list')->with('success', $msg);
    }

    public function delete($id = null)
    {
    	Property::find($id)->delete();
    	return redirect()->back()->with('success', 'Property Deleted Successfully!');
    }

    public function getTypes(Request $req)
    {
        $types = ProjectType::where('project_id',$req->project_id)->get();

        return view('ajax.types', get_defined_vars());
    }

    public function getSubTypes(Request $req)
    {
        // dd($req->project_id);?
        $subtypes = ProjectSubType::where('project_id',$req->project_id)->where('type', $req->type)->get();

        return view('ajax.subtypes', get_defined_vars());
    }
}
