<?php

use App\Models\DhaProperty;
use App\Models\Property;
use App\Models\Project;
use App\Models\Blog;
use App\Models\Vlog;
use App\Models\User;

function uploadFile($file, $path){
    $name = time().'-'.str_replace(' ', '-', $file->getClientOriginalName());
    $file->move($path,$name);
    return $path.'/'.$name;
}

function projects() {
    return Project::all();
}

function properties() {
    return Property::with('project')->get();
}

function blogs() {
    return Blog::limit(3)->get();
}

function vlogs() {
    return Vlog::limit(3)->get();
}

function popular() {
    return Property::with('project')->get()->random(2);
}

function projectCount() {
    return Project::count();
}
function propertiesCount() {
    return Property::count();
}
function usersCount() {
    return User::where('role', '2')->count();
}
function dhaCount() {
    return DhaProperty::count();
}
