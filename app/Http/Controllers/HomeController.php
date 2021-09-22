<?php

namespace App\Http\Controllers;

use App\Models\BodlaDeveloperTeam;
use App\Models\BodlaPvtTeam;
use App\Models\ContactQuery;
use Illuminate\Http\Request;
use App\Models\DhaProperty;
use App\Models\Property;
use App\Models\Project;
use App\Models\Gallery;
use App\Models\Blog;
use App\Models\Vlog;
use App\Models\News;
use App\Models\Map;
use App\Models\Jobs;
use App\Models\Application;
use App\Models\VisitorDetails;
use Session;

class HomeController extends Controller
{
    public function home(Request $req)
    {
         //dd($req->all());
        if( isset($req->sector) && isset($req->plot) && isset($req->name) ){
            $property = DhaProperty::where('sector', $req->sector)->where('plot', $req->plot)->first();
            $visitor = new VisitorDetails();
            $visitor->logable_type = 'App/model/DhaProperty';
            $visitor->logable_id = $property->id;
            $visitor->name = $req->name;
            $visitor->email = $req->email;
            $visitor->phone = $req->phone;
            $visitor->save();
            if(!Session::has('user_info')){
                $name = $visitor->name;
                $email = $visitor->email;
                $phone = $visitor->phone;
                Session::put('user_info', [$name, $email, $phone ]);
            }
            return view('front.dha', get_defined_vars());
        }
        if (isset($req->sector) && isset($req->plot)) {

            $property = DhaProperty::where('sector', $req->sector)->where('plot', $req->plot)->first();
            if(Session::has('user_info')){
                $visitor = new VisitorDetails();
                $visitor->logable_type = 'App/model/DhaProperty';
                $visitor->logable_id = $property->id;
                $visitor->name = Session::get('user_info')[0];
                $visitor->email = Session::get('user_info')[1];
                $visitor->phone = Session::get('user_info')[2];
                $visitor->save();
            }

            return view('front.dha', get_defined_vars());
        }
        else {
            return view('front.home', get_defined_vars());
        }

    }

    public function visitor(Request $req)
    {
        $name = $req->visitor_name;
        $email = $req->visitor_email;
        $phone = $req->visitor_phone;
        Session::put('user_info', [$name, $email, $phone ]);
        return redirect()->back();
    }

    public function jobs($slug = null)
    {
        if (is_null($slug)) {
            $job = Jobs::where('status', 1)->paginate(16);

            return view('front.job', get_defined_vars());
        } else {
            $job = Jobs::where('slug', $slug)->first();

            return view('front.job_details', get_defined_vars());
        }
        return view();
    }

    public function apply()
    {
        return view('front.application_form', get_defined_vars());
    }

    public function application(Request $req)
    {
        $job = new Application;
        $job->name = $req->name;
        $job->email = $req->email;
        $job->contact = $req->contact;
        $job->cv = uploadFile($req->cv, 'uploads/cv');
        $job->save();
        return redirect()->route('home');
    }
    public function news($slug = null)
    {
        if (is_null($slug)) {
            $news = News::paginate(16);

            return view('front.news', get_defined_vars());
        } else {
            $news = News::where('slug', $slug)->first();

            return view('front.news-detail', get_defined_vars());
        }
    }

    public function blogs($slug = null)
    {
        if (is_null($slug)) {
            $blogs = Blog::paginate(16);

            return view('front.blog', get_defined_vars());
        } else {
            $blog = Blog::where('slug', $slug)->first();

            return view('front.blog-detail', get_defined_vars());
        }
    }

    public function vlogs()
    {
        $vlogs = Vlog::paginate(16);

        return view('front.vlog', get_defined_vars());
    }

    public function gallery()
    {
        $gallery = Gallery::paginate(20);

        return view('front.gallery', get_defined_vars());
    }

    public function bodlaPVT()
    {
        $lead = BodlaPvtTeam::where('designation', '1')->first();
        $team = BodlaPvtTeam::where('designation', '2')->get();

        return view('front.bodla_pvt', get_defined_vars());
    }

    public function bodlaDevelopers()
    {
        $lead = BodlaDeveloperTeam::where('designation', '1')->first();
        $team = BodlaDeveloperTeam::where('designation', '2')->get();
        $maps = Map::all();

        return view('front.bodla_devlopers', get_defined_vars());
    }

    public function calculator(Request $req)
    {
        //dd($req->all());
        // if($req->ajax){
            if(Session::has('user_info')){
                if($req->project){

                    $visitor = new VisitorDetails();
                    $visitor->logable_type = 'App/model/Project';
                    $visitor->logable_id = $req->project;
                    $visitor->name = Session::get('user_info')[0];
                    $visitor->email = Session::get('user_info')[1];
                    $visitor->phone = Session::get('user_info')[2];
                    $visitor->save();
                }
            }
            elseif( isset($req->project) && isset($req->name) ){
                $visitor = new VisitorDetails();
                $visitor->logable_type = 'App/model/Project';
                $visitor->logable_id = $req->project;
                $visitor->name = $req->name;
                $visitor->email = $req->email;
                $visitor->phone = $req->phone;
                $visitor->save();
                if(!Session::has('user_info')){
                    $project = $visitor->logable_id;
                    $name = $visitor->name;
                    $email = $visitor->email;
                    $phone = $visitor->phone;
                    Session::put('user_info', [$name, $email, $phone, $project ]);
                }
            }
            return view('front.calculator', get_defined_vars());


    }

    public function contact()
    {
        return view('front.contact', get_defined_vars());
    }

    public function contactPost(Request $req)
    {
        $query = new ContactQuery();
        $query->name = $req->name;
        $query->email = $req->email;
        $query->subject = $req->subject;
        $query->message = $req->message;
        $query->save();

        return redirect()->back();
    }

    public function getProjectFloor(Request $req)
    {
        $floors = Property::where('project_id', $req->project_id)->distinct('floor')->get();

        return view('ajax.floors', get_defined_vars());
    }

    public function getProjectAmount(Request $req)
    {
        $res = Property::where('project_id', $req->project_id)->where('floor', $req->floor)->first();

        if (is_null($res)) {
            return 0;
        } else {
            return $res->amount;
        }
    }
}
