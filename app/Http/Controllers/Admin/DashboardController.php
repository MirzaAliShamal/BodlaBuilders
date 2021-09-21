<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactQuery;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $users = User::where('role', '2')->orderBy('id', 'DESC')->limit(10)->get();

        return view('admin.dashboard', get_defined_vars());
    }

    public function contactQuery()
    {
        $queries = ContactQuery::orderBy('id', 'DESC')->get();

        return view('admin.contact_queries', get_defined_vars());
    }

    public function registerdUsers()
    {
        $users = User::where('role', '2')->orderBy('id', 'DESC')->get();

        return view('admin.users', get_defined_vars());
    }
}
