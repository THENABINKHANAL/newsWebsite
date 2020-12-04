<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\News;
class SearchController extends Controller
{
    //
    public function index($input){
        return View("search",array("querystring"=>$input));
    }
    public function getlessData($input){
        return array("users"=>$this->getUsers($input,0,3),"projects"=>$this->getProjects($input,0,3),"news"=>$this->getNews($input,0,3));
    }
    public function getUsers($input,$min,$max){
        $data= User::where('name', 'LIKE', '%'.$input.'%')
        ->orWhere('FirstName', 'LIKE', '%' . $input . '%')
        ->orWhere('LastName', 'LIKE', '%' . $input . '%')
        ->orWhere('MiddleName', 'LIKE', '%' . $input . '%')
        ->orWhere('ioePost', 'LIKE', '%' . $input . '%')
        ->orWhere('contactphone', 'LIKE', '%' . $input . '%')
        ->orWhere('email', 'LIKE', '%' . $input . '%')
        ->orWhere('personalURL', 'LIKE', '%' . $input . '%')
        ->take($max)->skip($min)->get();
        $res=[];
        foreach ($data as $datum) {
            array_push($res,array("fname"=>$datum->FirstName,
            "mname"=>$datum->MiddleName,
            "id"=>$datum->id,
            "lname"=>$datum->LastName,
            "ioePost"=>$datum->ioePost,
            "imagLoc"=>$datum->imgPathName));
        }
        return $res;
    }
    public function getNews($input,$min,$max){
        $data= News::where('newsTitle', 'LIKE', '%'.$input.'%')
        ->take($max)->skip($min)->get();
        $res=[];
        foreach ($data as $datum) {
            array_push($res,array("id"=>$datum->id,
            "title"=>$datum->newsTitle,
            "date"=>$datum->updated_at));
        }
        return $res;
    }
    public function getProjects($input,$min,$max){
        $data= Project::where('title', 'LIKE', '%'.$input.'%')
        ->orWhere('summary', 'LIKE', '%' . $input . '%')
        ->take($max)->skip($min)->get();
        $res=[];
        foreach ($data as $datum) {
            array_push($res,array("id"=>$datum->id,
            "title"=>$datum->title,
            "summary"=>$datum->summary));
        }
        return $res;
    }
}
