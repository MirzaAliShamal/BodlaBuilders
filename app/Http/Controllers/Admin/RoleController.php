<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function list()
    {
       $list = Role::all();
       return view('admin.roles.list',get_defined_vars());
    }

    public function add()
    {
    //    $list = Role::all();
       return view('admin.roles.add',get_defined_vars());
    }
    public function edit($id = null)
    {
       $list = Role::find($id);
       return view('admin.roles.edit',get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {


        if (is_null($id)) {
            $req->validate([
                'name' => 'required|string|max:191|unique:roles,name',
            ]);
            $role = new Role();
            $role->name = $req->name;
            $role->guard_name = 'web';
            $role->save();
            // dd($role);

            $msg = "Role added to the system!";
        } else {
            $role = Role::find($id);
            $role->name = $req->name;
            $role->guard_name = 'web';
            $role->save();

            $msg = "Role edited Successfully";
        }

        return redirect()->route('admin.role.list')->with('success', $msg);
    }

    public function delete($id = null)
    {
        //dd($id);
        Role::find($id)->delete();

        return redirect()->route('admin.role.list')->with('success', 'Role Deleted from the system!');
    }
}
