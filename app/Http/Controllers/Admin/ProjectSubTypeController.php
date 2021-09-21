<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectSubType;
use Illuminate\Http\Request;
use App\Models\ProjectType;
use App\Models\Project;

class ProjectSubTypeController extends Controller
{
    public function list()
    {
    	$list = ProjectSubType::all();
    	return view('admin.project_subtype.list', get_defined_vars());
    }

    public function add()
    {
        $projects = Project::orderBy('name', 'ASC')->get();

    	return view('admin.project_subtype.add', get_defined_vars());
    }

    public function edit($id = null)
    {
    	$project_subtype = ProjectSubType::find($id);
        $projects = Project::orderBy('name', 'ASC')->get();

    	return view('admin.project_subtype.edit', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'project_id' => 'required',
            'type' => 'required',
            'subtype' => 'required',
        ]);

        if (is_null($id)) {

        	$project_subtype = new ProjectSubType();
        	$project_subtype->project_id = $req->project_id;
        	$project_subtype->type = $req->type;
        	$project_subtype->subtype = $req->subtype;
            $project_subtype->save();

            $msg = "Project Sub Type Added Successfully!";
        } else {

            $project_subtype = ProjectSubType::find($id);
        	$project_subtype->project_id = $req->project_id;
        	$project_subtype->type = $req->type;
        	$project_subtype->subtype = $req->subtype;
            $project_subtype->save();

            $msg = "Project Sub Type Updated Successfully!";
        }

        return redirect()->route('admin.project_subtype.list')->with('success', $msg);
    }

    public function delete($id = null)
    {
    	ProjectSubType::find($id)->delete();
    	return redirect()->back()->with('success', 'Project Sub Type Deleted Successfully!');
    }
}
