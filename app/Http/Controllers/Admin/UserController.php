<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function list()
    {
        $list = User::where('role', '1')->where('id', '!=', 1)->get();
        return view('admin.users.list', get_defined_vars());
    }

    public function add()
    {
        $roles = Role::all();
        //dd($roles);
        return view('admin.users.add', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        if (is_null($id)) {
            $req->validate([
                'first_name' => 'required|string|max:191',
                'phone' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:8',
                'role' => 'required',
            ]);
            $user = new User();
            $user->name = $req->first_name;
            $user->phone = $req->phone;
            $user->password = bcrypt($req->password);
            $user->email = $req->email;
            $user->role = '1';
            $user->assignRole($req->role);
            $user->save();
            //dd($user);

            $msg = "User added to the system!";
        } else {
            $user = User::find($id);
            $req->validate([
                'first_name' => 'required|string|max:191',
                'email' => 'required|unique:users,email,'.$user->id,
                'phone' => 'required',
                'role' => 'required',
            ]);
            $user->name = $req->first_name;
            $user->phone = $req->phone;
            $user->password = bcrypt($req->password);
            $user->email = $req->email;
            $user->role = '1';
            $user->roles()->detach();
            $user->assignRole($req->role);
            $user->save();

            $msg = "User edited Successfully";
        }

        return redirect()->route('admin.user.list')->with('success', $msg);
    }

    public function edit($id = null)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.edit', get_defined_vars());
    }

    public function delete($id = null)
    {
        User::find($id)->delete();

        return redirect()->route('admin.user.list')->with('success', 'User Deleted from the system!');
    }

}
