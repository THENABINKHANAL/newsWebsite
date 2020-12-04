<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Feedbacks;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('feedback');
    }
    public function save(Request $request)
    {
        $abc=Feedbacks::create(array(
            "feedbackName"=>$request['name'],
            "feedbackContact"=>$request['detail'],
            "feedbackMsg"=>$request['message'],
            "feedbackForm"=>$request->ip(),
        ));
        $abc->save();
        return $abc;                        
    }
}