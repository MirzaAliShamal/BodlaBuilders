<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobs;
use Str;

class JobController extends Controller
{
    public function list ()
    {
        $list = Jobs::all();
        return view('admin.jobs.list', get_defined_vars());
    }

    public function add()
    {
        return view('admin.jobs.add', get_defined_vars());
    }

    public function status($id = null)
    {
        $job = Jobs::find($id);
        if($job->status){

            $job->status = 0;
        }
        else{
            $job->status = 1;
        }
        $job->save();
        return redirect()->back()->with('success', 'Status changed successfully');
    }

    public function save (Request $req, $id = null)
    {
        if(is_null($id)){
            $job = new Jobs();
            $msg = 'Job created successfully!';
        }
        else{
            $job = Jobs::find($id);
            $msg = 'Job updated successfully!';
        }
        $job->title = $req->title;
        $job->description = $req->description;
        $job->slug = Str::slug($req->title);
        $job->save();

        return redirect()->route('admin.jobs.list')->with('success', $msg);
    }

    public function delete($id = null){
        $job = Jobs::find($id);
        $job->delete();
        return redirect()->route('admin.jobs.list')->with('success', 'Job deleted successfully!');
    }

    public function edit($id = null){
        $job = Jobs::find($id);
        return view('admin.jobs.edit', get_defined_vars());
    }
}
