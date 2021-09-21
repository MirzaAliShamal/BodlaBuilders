<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BodlaDeveloperTeam;
use Illuminate\Http\Request;

class BodlaDeveloperTeamController extends Controller
{
    public function list()
    {
    	$list = BodlaDeveloperTeam::all();
    	return view('admin.bodla_developer_team.list', get_defined_vars());
    }

    public function add()
    {
    	return view('admin.bodla_developer_team.add', get_defined_vars());
    }

    public function edit($id = null)
    {
    	$team = BodlaDeveloperTeam::find($id);

    	return view('admin.bodla_developer_team.edit', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'name' => 'required',
            'designation' => 'required',
        ]);

        if (is_null($id)) {

            $req->validate([
                'image' => 'required',
            ]);

        	$team = new BodlaDeveloperTeam();
        	$team->name = $req->name;
        	$team->designation = $req->designation;
        	$team->image = uploadFile($req->image, 'bodla-developer-team');
            $team->save();

            $msg = "Bodla Developer Team Member Added Successfully!";
        } else {

            $team = BodlaDeveloperTeam::find($id);
        	$team->name = $req->name;
        	$team->designation = $req->designation;
        	if ($req->image) {
                $team->image = uploadFile($req->image, 'bodla-developer-team');
            }
            $team->save();

            $msg = "Bodla Developer Team Member Updated Successfully!";
        }

        return redirect()->route('admin.developer.team.list')->with('success', $msg);
    }

    public function delete($id = null)
    {
    	BodlaDeveloperTeam::find($id)->delete();
    	return redirect()->back()->with('success', 'Bodla Developer Team Deleted Successfully!');
    }
}
