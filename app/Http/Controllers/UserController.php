<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;
class UserController extends Controller
{
    public function index($id)
    {
        $thisuser=User::find($id);
        if($thisuser==null){
            $thisuser=User::where('name',$id)->get();
            if($thisuser!=null){
                $thisuser=User::findorfail($thisuser[0]->id);
            }
        }
        else{
        return redirect('user/'.$thisuser->name);
        }
        $showEdit=false;
        if(Auth::guard('admin')->check()){
            $showEdit=true;
        }
        else if(Auth::check()){
            if(Auth::user()->id==$user->id)
                $showEdit=true;
        }
        $projects=$thisuser->project;
        $projectarray=[];
        foreach ($projects as $project) {
            $usersarray=[];
            $users=$project->user;
            foreach ($users as $user) {
                array_push($usersarray,array("FirstName"=>$user->FirstName,"MiddleName"=>$user->MiddleName,"LastName"=>$user->LastName,"imgLoc"=>$user->imgPathName,"id"=>$user->id));
            }
            array_push($projectarray,array("title"=>$project->title,"summary"=>$project->summary,"id"=>$project->id,"researchers"=>$usersarray));
        }
        $userid=$thisuser->id;
        return View('user')->with(array("id"=>$userid,"user"=>$thisuser,"showEdit"=>$showEdit,"projects"=>$projectarray));

    }
    public function edit($id){
        if(Auth::guard('admin')->check()){
            return View('edit_user')->with(array("user"=>User::find($id)));
        }
        else if(Auth::check()){
            if(Auth::user()->id==$id)
                return View('edit_user')->with(array("user"=>User::find($id)));
            return redirect('user/'.$id);
        }
        else{
            return redirect('user/'.$id);
        }
    }
    public function redit(Request $request){
        if(Auth::guard('admin')->check()){
            $user=User::findorfail($request['id']);
            $file= $request->file('file');
            if($request['file']!=null){
                $filename = 'profile-photo-' . $request['id'] . '.png';
                $file->move(public_path('/userfiles'), $filename);
                $user['imgPathName']="userfiles/".$filename;
            }
            if($user->lictType==3)
                $user['lictTitle']=$request['lictTitle'];
            $user['FirstName']=$request['FirstName'];
            $user['LastName']=$request['LastName'];
            $user['MiddleName']=$request['MiddleName'];
            $user['ioePost']=$request['post'];
            $user['contactPhone']=$request['phone'];
            $user['email']=$request['mail'];
            $user['publications']=$request['publications'];
            $user['prvProfile']=$request['prvProfile'];
            $user['Remarks']=$request['Remarks'];
            $user['personalURL']=$request['website'];
            $user['researchAreas']=$request['researchAreas'];
            $user->save();
        }
        else if(Auth::check()){
            if(Auth::user()->id==$request['id']){
                if($request->has('file')){
                    $file= $request->file('file');
                    $filename = 'profile-photo-' . $request['id'] . '.png';
                    $file->move(public_path('/userfiles'), $filename);
                    $user['imgPathName']="userfiles/".$filename;

                }
                $user=User::find($request['id']);
                if($user->lictType==3)
                    $user['lictTitle']=$request['lictTitle'];
                $user['FirstName']=$request['FirstName'];
                $user['LastName']=$request['LastName'];
                $user['MiddleName']=$request['MiddleName'];
                $user['ioePost']=$request['post'];
                $user['contactPhone']=$request['phone'];
                $user['email']=$request['mail'];
                $user['publications']=$request['publications'];
                $user['prvProfile']=$request['prvProfile'];
                $user['Remarks']=$request['Remarks'];
                $user['imgPathName']="userfiles/".$filename;
                $user['personalURL']=$request['website'];
                $user['researchAreas']=$request['researchAreas'];
                $user->save();
            }
        }
        return "Saved";
    }
    public function reUsername(Request $request){
        if(Auth::guard('admin')->check()){
            $user=User::findorfail($request['id']);
            $user->name=$request['username'];
            $user->save();
        }
    }
    public function rePassword(Request $request){
        if(Auth::guard('admin')->check()){
            $user=User::findorfail($request['id']);
            $user->password=Hash::make($request['password']);
            $user->save();
        }
    }
    public function retype(Request $request){
        if(Auth::guard('admin')->check()){
            $user=User::findorfail($request['id']);
            $user->lictType=$request['usertype'];
            $user->save();
        }
    }
}