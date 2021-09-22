<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use DataTables;

class PermissionController extends Controller
{
    public function manage(Request $req)
    {
        if ($req->ajax()) {
            $permission = Permission::find($req->permission);
            $role = Role::find($req->role);

            //dd($role);

            $check = DB::table('role_has_permissions')->where('role_id', $req->role)->where('permission_id', $req->permission)->first();

            if ($check) {
                $role->revokePermissionTo($permission->name);
            } else {
                $role->givePermissionTo($permission->name);
            }

            return response()->json([
                'statusCode' => 200,
                'message' => 'Permissions Updated Successfully!',
            ]);
        } else {
            $permissions = Permission::all();
            $roles = Role::all();

            return view('admin.permissions.manage', get_defined_vars());
        }

    }
}
