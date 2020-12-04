<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publications;
use Auth;
class PublicationsController extends Controller
{
    //
    public function index(){
        return View('publications')->with(array("pubData"=>Publications::all()));
    }

    public function add(Request $request){
        if($request['text']!=null && Auth::guard('admin')->check()){
            $publications=new Publications();
            $publications->text=$request['text'];
            $publications->save();
            return $publications;
        }
        return response("Bad Request",400);
    }
    public function save(Request $request){
        if($request['text']!=null && Auth::guard('admin')->check()){
            $publications=Publications::findorfail($request['id']);
            $publications->text=$request['text'];
            $publications->save();
            return $publications;
        }
        return response("Bad Request",400);
    }
    public function delete(Request $request){
        if(Auth::guard('admin')->check()){
            $publications=Publications::findorfail($request['id']);
            $publications->delete();
            return response("deleted",200);
        }
        return response("Bad Request",400);
    }
}
