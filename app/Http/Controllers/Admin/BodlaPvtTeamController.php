<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BodlaPvtTeam;

class BodlaPvtTeamController extends Controller
{
    public function list()
    {
    	$list = BodlaPvtTeam::all();
    	return view('admin.bodla_pvt_team.list', get_defined_vars());
    }

    public function add()
    {
    	return view('admin.bodla_pvt_team.add', get_defined_vars());
    }

    public function edit($id = null)
    {
    	$team = BodlaPvtTeam::find($id);

    	return view('admin.bodla_pvt_team.edit', get_defined_vars());
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

        	$team = new BodlaPvtTeam();
        	$team->name = $req->name;
        	$team->designation = $req->designation;
        	$team->image = uploadFile($req->image, 'bodla-pvt-team');
            $team->save();

            $msg = "Bodla Pvt Team Member Added Successfully!";
        } else {

            $team = BodlaPvtTeam::find($id);
        	$team->name = $req->name;
        	$team->designation = $req->designation;
        	if ($req->image) {
                $team->image = uploadFile($req->image, 'bodla-pvt-team');
            }
            $team->save();

            $msg = "Bodla Pvt Team Member Updated Successfully!";
        }

        return redirect()->route('admin.pvt.team.list')->with('success', $msg);
    }

    public function delete($id = null)
    {
    	BodlaPvtTeam::find($id)->delete();
    	return redirect()->back()->with('success', 'Bodla Pvt Team Deleted Successfully!');
    }
}
