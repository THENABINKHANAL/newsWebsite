<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;
use App\News;

use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index($id)
    {
        $news=News::findOrfail($id);
            return view('news/news')->with(array("id"=>$id,"newsDetails"=>$news['newsDetails']));
    }
    public function editView($id){
        $news=News::findOrfail($id);
        return view('news/edit')->with(array("id"=>$id,"Mainimg"=>$news['Mainimg'],"newsTitle"=>$news['newsTitle'],"newsDetails"=>$news['newsDetails'],"published"=>$news['published']));
    }
    public function edit_news(Request $request)
    {
        if(Auth::guard('admin')->check()){
            $nid=-1;
            if($this->validator(array("newsTitle"=>$request['newsTitle'],"newsDetails"=>$request['newsDetails']))){
                if($request['id']== -1){
                    $abc=News::create([
                        'newsTitle'=> $request['newsTitle'],
                        'newsDetails'=> $request['newsDetails'],
                        'Mainimg'=> $request['Mainimg'],
                    ]);
                    $nid=$abc['id'];
                }
                else{
                    $news = News::findOrfail($request['id']);
                    $news['newsTitle']=$request['newsTitle'];
                    $news['newsDetails']= $request['newsDetails'];
                    $news['Mainimg']= $request['Mainimg'];
                    $news->save();
                    $nid=$request['id'];
                }
                return redirect('news/'.$nid);
            }
        }
    }

    protected function validator(array $data)
    {
        return validator::make($data, [
            'newsTitle' => ['required' ,'string' , 'max:191'],
            'newsSummary' => ['required'],
            'newsDetails' => ['required'],
        ]);
    }
    public function addfile(Request $request){
        if(Auth::guard('admin')->check()){
            $news=News::findorfail($request['id']);
            $files= $request->file('file');
            $fileno=$news['addedviewfiles'];
            $filename="";
            if($files>0){
                $fileno++;
                $filename = 'news'.$request['id'].'-'.$fileno. '.' . $files->getClientOriginalExtension();
                $files->move(public_path('/news'), $filename);
                $news['addedviewfiles']=$fileno;
                $news->save();
            }
            return $filename;
        }
    }
    public function allnews(){
        $news=News::orderBy('created_at', 'asc')->get();
        $data=[];
        foreach($news as $snews){
            array_push($data,array("id"=>$snews['id'],"title"=>$snews['newsTitle'],"img"=>$snews['Mainimg']));
        }
        $abc= array("news"=>$data);
        return View('news/allnews')->with(array("news"=>$data));
    }
}