<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;
use App\User;
use App\TextData;
use App\vacancy;
use App\vacancyApplication;
class PagesController extends Controller
{
    public function index(){
        /*
        $top= Home::find(0);
        $all=json_decode($top['directories']);
        $headers=array();
        foreach ($all as $item) {
            $headers[Home::find($item)['title']]=array(
                        'location'=>Home::find($item)['location']
            );
            if(Home::find($item)['directories']!=""){
                $tmp=json_decode(Home::find($item)['directories']);
                foreach ($tmp as $item2) {
                    $headers[Home::find($item)['title']][Home::find($item2)['title']]=array(
                        'location'=>Home::find($item2)['location']
                    );
                    if(Home::find($item2)['directories']!=""){
                        $tmp2=json_decode(Home::find($item2)['directories']);
                        foreach ($tmp2 as $item3) {
                            $headers[Home::find($item)['title']][Home::find($item2)['title']][Home::find($item3)['title']]=array(
                                'location'=>Home::find($item3)['location']
                            );
                        }
                    }
                }
            }
        }
        
        $wrapper=array(
            "all"=>$headers
        );
        */
        return View('Home.home');
    }
    public function interns(){
        $lictTeam=User::where('lictType',1)->orderBy('priority', 'desc')->get();
        $allarray=[];
        foreach ($lictTeam as $lictTeamMember) {
            array_push($allarray,array("post"=>$lictTeamMember['ioePost'],
            "firstname"=>$lictTeamMember['FirstName'],
            "id"=>$lictTeamMember['id'],
            "lastname"=>$lictTeamMember['LastName'],
            "middlename"=>$lictTeamMember['MiddleName'],
            "researchAreas"=>$lictTeamMember['researchAreas'],
            "email"=>$lictTeamMember['email'],
            "prvProfile"=>$lictTeamMember['prvProfile'],
            "publications"=>$lictTeamMember['publications'],
            "contactno"=>$lictTeamMember['contactno'],
            "imgLoc"=>$lictTeamMember['imgPathName'],));
        }
        return View('interns')->with(array("members"=>$allarray));
    }
    public function lictTeam(){
        $corelictTeam=User::where('lictType',3)->orderBy('priority', 'desc')->get();
        $coreallarray=[];
        foreach ($corelictTeam as $lictTeamMember) {
            array_push($coreallarray,array("post"=>$lictTeamMember['ioePost'],
            "id"=>$lictTeamMember['id'],
            "firstname"=>$lictTeamMember['FirstName'],
            "lastname"=>$lictTeamMember['LastName'],
            "middlename"=>$lictTeamMember['MiddleName'],
            "researchAreas"=>$lictTeamMember['researchAreas'],
            "email"=>$lictTeamMember['email'],
            "prvProfile"=>$lictTeamMember['prvProfile'],
            "lictTitle"=>$lictTeamMember['lictTitle'],
            "publications"=>$lictTeamMember['publications'],
            "contactno"=>$lictTeamMember['contactno'],
            "imgLoc"=>$lictTeamMember['imgPathName'],));
        }
        $lictTeam=User::where('lictType',4)->orderBy('priority', 'desc')->get();
        $allarray=[];
        foreach ($lictTeam as $lictTeamMember) {
            array_push($allarray,array("post"=>$lictTeamMember['ioePost'],
            "id"=>$lictTeamMember['id'],
            "firstname"=>$lictTeamMember['FirstName'],
            "lastname"=>$lictTeamMember['LastName'],
            "middlename"=>$lictTeamMember['MiddleName'],
            "prvProfile"=>$lictTeamMember['prvProfile'],
            "researchAreas"=>$lictTeamMember['researchAreas'],
            "publications"=>$lictTeamMember['publications'],
            "email"=>$lictTeamMember['email'],
            "contactno"=>$lictTeamMember['contactno'],
            "imgLoc"=>$lictTeamMember['imgPathName'],));
        }
        return View('lictTeam')->with(array("coremembers"=>$coreallarray,"members"=>$allarray));
    }
    public function scholars(){
        $lictTeam=User::where('lictType',2)->orderBy('priority', 'desc')->get();
        $allarray=[];
        foreach ($lictTeam as $lictTeamMember) {
            array_push($allarray,array("post"=>$lictTeamMember['ioePost'],
            "firstname"=>$lictTeamMember['FirstName'],
            "id"=>$lictTeamMember['id'],
            "lastname"=>$lictTeamMember['LastName'],
            "middlename"=>$lictTeamMember['MiddleName'],
            "researchAreas"=>$lictTeamMember['researchAreas'],
            "email"=>$lictTeamMember['email'],
            "prvProfile"=>$lictTeamMember['prvProfile'],
            "publications"=>$lictTeamMember['publications'],
            "contactno"=>$lictTeamMember['contactno'],
            "imgLoc"=>$lictTeamMember['imgPathName'],));
        }
        return View('scholars')->with(array("members"=>$allarray));
    }
    public function vacancy(){
        $all=vacancy::all();
        $array=[];
        foreach ($all as $vacancy) {
            $vacancyArray=array("Title"=>$vacancy['Title'],
            "Requirements"=>$vacancy['Requirements'],
            "Responsibilities"=>$vacancy['Responsibilities']);
            array_push($array,$vacancyArray);
        }
        return View('vacancy')->with(array("vacancies"=>$array));
    }
    public function vacancySave(Request $request){
    $files= $request->file('file'); 
    $filename="";
    $fileno=count(vacancyApplication::all());
    $filename = 'vacancy'.$request['name'].'-'.$fileno. '.' . $files->getClientOriginalExtension();
    $files->move(storage_path('app/vacancy'), $filename); 
    $vacancy=vacancyApplication::create(array("name"=>$request['name'],
        "email"=>$request['email'],
        "contactno"=>$request['contactNo'],
        "VacancyTitle"=>$request['title'],
        "CVlocation"=>"storage/app/vacancy".$filename,
    ));
    $vacancy->save();
    return "Saved";
    }

}

