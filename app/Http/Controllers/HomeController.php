<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\TextData;
use App\Project;
use App\News;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects=Project::all()->take(12);
        $news=News::all()->take(12);
        $aprojects=[];
        $anews=[];
        foreach($projects as $project)
            array_push($aprojects,array("title"=>$project['title'],"id"=>$project['id']));
        foreach($news as $snews)
            array_push($anews,array("newsTitle"=>$snews['newsTitle'],"id"=>$snews['id']));
        return view('home/home')->with(array("projects"=>$aprojects,"news"=>$anews));
    }

    public function pros()
    {
        return Auth::user()->project;
    }
    public function deans(){
        return View('message')->with(array("messages"=>Textdata::findorfail('Dean\'s Message')));
    }
    public function chairmans(){
        return View('message')->with(array("messages"=>Textdata::findorfail('Chairman\'s Message')));
    }
}
