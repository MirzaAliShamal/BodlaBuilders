<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function list()
    {
    	$list = Project::all();
    	return view('admin.project.list', get_defined_vars());
    }

    public function add()
    {
    	return view('admin.project.add');
    }

    public function edit($id = null)
    {
    	$project = Project::find($id);
    	return view('admin.project.edit', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'name' => 'required',
            'description' => 'required',
            'city' => 'required',
        ]);

        if (is_null($id)) {
            $req->validate([
                'image' => 'required',
            ]);

        	$project = new Project();
        	$project->image = uploadFile($req->image, 'projects');
        	$project->name = $req->name;
        	$project->description = $req->description;
        	$project->city = $req->city;
            $project->save();

            $msg = "Project Added Successfully!";
        } else {

            $project = Project::find($id);
            if ($req->image) {
                $project->image = uploadFile($req->image, 'projects');
            }
        	$project->name = $req->name;
        	$project->description = $req->description;
        	$project->city = $req->city;
            $project->save();

            $msg = "Project Updated Successfully!";
        }

        return redirect()->route('admin.project.list')->with('success', $msg);
    }

    public function delete($id = null)
    {
    	Project::find($id)->delete();
    	return redirect()->back()->with('success', 'Project Deleted Successfully!');
    }
}
