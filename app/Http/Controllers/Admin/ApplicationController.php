<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function list()
    {
        $list = Application::orderBy('id', 'DESC')->get();

        return view('admin.applications.list', get_defined_vars());
    }
}
