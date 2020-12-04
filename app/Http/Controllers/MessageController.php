<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TextData;
class MessageController extends Controller
{

    public function deans(){
        return view('message')->with(array("data"=>Textdata::findorfail('Dean'),"name"=>"Dean"));
    }
    public function chairmans(){
        return view('message')->with(array("data"=>Textdata::findorfail('Chairman'),"name"=>"Chairman"));
    }
}
