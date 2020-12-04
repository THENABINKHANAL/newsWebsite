<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Project;
use App\User;
class ProjectController extends Controller
{
    public function index($id)
    {
        $project=Project::findOrfail($id);
        $allfiles=(array)json_decode($project['files']);
        $filearray=[];
        $reserchr=[];
        foreach($project->user as $user){
            array_push($reserchr,array("id"=>$user->id,"FirstName"=>$user->FirstName,"MiddleName"=>$user->MiddleName,"LastName"=>$user->LastName));
        }
        foreach($allfiles as $filee){
            $file=(array)$filee;
            array_push($filearray,array("name"=>$file['name'],"location"=>$file['location']));
        }
        $showedit=false;
        if(Auth::guard('admin')->check()){
            $showedit=true;
        }
        else if(Auth::check()){
            foreach (json_decode($project['editors']) as $editor) {
                if($editor==Auth::user()->id)
                    $showedit=true;
            }
        }
        return View('project/project')->with(array("id"=>$project['id'],
            "summary"=>$project['summary'],
            "title"=>$project['title'],
            "projectData"=>$project['projectData'],
            "files"=>$filearray,
            "researchers"=>$reserchr,
            "showEdit"=>$showedit));
    }
    public function allusers()
    {
        if(Auth::guard('admin')->check()||Auth::check()){
            $allusers= User::all();
            $data=[];
            foreach ($allusers as $user){
                array_push($data,array("id"=>$user['id'],"name"=>$user['name']));
            }
            return $data;
        }
    }
    public function editProject($id)
    {
        $project=Project::findOrfail($id);
        $validRequest=false;
        if(Auth::guard('admin')->check()){
            $validRequest=true;
        }
        else if(Auth::check()){
            foreach (json_decode($project['editors']) as $editor) {
                if($editor==Auth::user()->id)
                    $validRequest=true;
            }
        }
        if($validRequest){
            $project=Project::findOrfail($id);
            $reserchr=[];
            foreach($project->user as $user){
                array_push($reserchr,$user->id);
            }
            return View('project/edit')->with(array("id"=>$project['id'],
                "summary"=>$project['summary'],
                "title"=>$project['title'],
                "projectData"=>$project['projectData'],
                "researchers"=>json_encode($reserchr),
                "editors"=>$project['editors'],
            ));
        }
        else{
            return redirect('project/'.$id);
        }
    }
    public function saveProject(Request $request)
    {
        $project=Project::findOrfail($request['id']);
        $validRequest=false;
        if(Auth::guard('admin')->check()){
            $validRequest=true;
        }
        else if(Auth::check()){
            foreach (json_decode($project['editors']) as $editor) {
                if($editor==Auth::user()->id)
                    $validRequest=true;
            }
        }
        if($validRequest){
        $project=Project::findorfail($request['id']);
        $files= $request->file('files');
        $fileData=$project['files'];
        $count=0;
        $newfileData=[];
        if($fileData!=""){
            foreach((array)json_decode($fileData) as $filee){
                $file=(array)$filee;
                array_push($newfileData,array("id"=>$count++,"name"=>$file['name'],"location"=>$file["location"]));
            }
        }

        if($request->has('files')){
            foreach($files as $file){
                $filename = 'project'.$request['id'].'-'.$count. '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/project'), $filename);
                array_push($newfileData,array("id"=>$count++,"name"=>$file->getClientOriginalName(),"location"=>"project".$filename,));
            }
        }
        $members=[];
        foreach(json_decode($request['researchers']) as $researcher){
            $user=User::find($researcher);
            array_push($members,$user->id);
        }
        $project->user()->sync($members);
        $project['files']=json_encode($newfileData);
        $project['title']=$request['title'];
        $project['summary']=$request['summary'];
        $project['projectData']=$request['projectData'];
        $project->save();
        return redirect('project/'.$request['id']);
        }
    }
    public function givefile($id){
        $data=Project::findorfail($id);
        return $data['files'];
    }
    public function removefile(Request $request){
        $project=Project::findOrfail($request['id']);
        $validRequest=false;
        if(Auth::guard('admin')->check()){
            $validRequest=true;
        }
        else if(Auth::check()){
            foreach (json_decode($project['editors']) as $editor) {
                if(editor==Auth::user()->id)
                    $validRequest=true;
            }
        }
        if($validRequest){
        $project=Project::findorfail($request['id']);
        $fileData=$project['files'];
        $count=0;
        $newfileData=[];
        if($fileData!=""){
            $al=(array)json_decode($fileData);
            foreach($al as $filee){
                $file=(array)$filee;
                if($file['id']!=$request['fileid'])
                array_push($newfileData,array("id"=>$count++,"name"=>$file['name'],"location"=>$file["location"]));
            }
        }
        $project['files']=json_encode($newfileData);
        $project->save();
        }
    }
    public function projects(){
        $projects=Project::orderBy('created_at', 'desc')->get();
        $data=[];
        foreach($projects as $project){
            $usersData=[];
            $users=$project->user;
            foreach ($users as $user) {
                array_push($usersData,array("FirstName"=>$user->FirstName,"MiddleName"=>$user->MiddleName,"LastName"=>$user->LastName,"imgLoc"=>$user->imgPathName,"id"=>$user->id));
            }
            array_push($data,array("id"=>$project['id'],"title"=>$project['title'],"projectSummary"=>$project['summary'],"researchers"=>$usersData));
        }
        return View('project/projects')->with(array("projects"=>$data));
    }
    public function addviewfile(Request $request){
        $project=Project::findOrfail($request['id']);
        $validRequest=false;
        if(Auth::guard('admin')->check()){
            $validRequest=true;
        }
        else if(Auth::check()){
            foreach (json_decode($project['editors']) as $editor) {
                if($editor==Auth::user()->id)
                    $validRequest=true;
            }
        }
        if($validRequest){
            $project=Project::findorfail($request['id']);
            $files= $request->file('file');
            $fileno=$project['addedviewfiles'];
            $filename="";
            if($files>0){
                $fileno++;
                $filename = 'project'.$request['id'].'-'.$fileno. '.' . $files->getClientOriginalExtension();
                $files->move(public_path('/project'), $filename);
                $project['addedviewfiles']=$fileno;
                $project->save();
            }
            return $filename;
        }
    }
    public function permitUser(Request $request){
        if(Auth::guard('admin')->check()){
            $project=Project::findorfail($request['id']);
            $project->editors=$request['editors'];
            $project->save();
        }
    }
}