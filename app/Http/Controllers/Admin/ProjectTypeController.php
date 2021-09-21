<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectType;
use App\Models\Project;

class ProjectTypeController extends Controller
{
    public function list()
    {
    	$list = ProjectType::all();
    	return view('admin.project_type.list', get_defined_vars());
    }

    public function add()
    {
        $projects = Project::orderBy('name', 'ASC')->get();
    	return view('admin.project_type.add', get_defined_vars());
    }

    public function edit($id = null)
    {
    	$project_type = ProjectType::find($id);
        $projects = Project::orderBy('name', 'ASC')->get();
    	return view('admin.project_type.edit', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'project_id' => 'required',
            'type' => 'required',
        ]);

        if (is_null($id)) {

        	$project_type = new ProjectType();
        	$project_type->project_id = $req->project_id;
        	$project_type->type = $req->type;
            $project_type->save();

            $msg = "Project Type Added Successfully!";
        } else {

            $project_type = ProjectType::find($id);
        	$project_type->project_id = $req->project_id;
        	$project_type->type = $req->type;
            $project_type->save();

            $msg = "Project Type Updated Successfully!";
        }

        return redirect()->route('admin.project_type.list')->with('success', $msg);
    }

    public function delete($id = null)
    {
    	ProjectType::find($id)->delete();
    	return redirect()->back()->with('success', 'Project Type Deleted Successfully!');
    }
}
