<?php

namespace App\Http\Controllers;
use App\User;
use App\Project;
use App\News;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users=User::where('created_at', '>=', Carbon::today())->get();
        //return $users;
        return view('admin')->with(array("usersno"=>User::count(),"newsno"=>News::count(),"projectsno"=>Project::count(),"users"=>$users));
    }
    public function create_user(Request $request)
    {
        if($this->validator(array("name"=>$request['name'],"password"=>$request['name']))){
             return User::create([
                'name' => $request['name'],
                'password' => Hash::make($request['password']),
            ]);
        }
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:191'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    public function create_project(Request $request)
    {
        if(validator::make(array("title"=>$request['title']),[
            'title' => ['required', 'string', 'max:191'],
        ]))
        {
            return Project::create([
                'title'=> $request['title'],
            ]);
        }
    }
    public function create_news(Request $request)
    {
        if(validator::make(array("title"=>$request['title']),[
            'title' => ['required', 'string', 'max:191'],
        ]))
        {
            return News::create([
                'newsTitle'=> $request['title'],
            ]);
        }
    }
    public function show_users()
    {
        if(Auth::guard('admin')->check()){
            $users= User::all();
            $data=array();
            foreach($users as $user){
                $item=array(
                    "id"=>$user['id'],
                    "name"=>$user['name'],
                    "email"=>$user['email'],
                    "created_at"=>$user['created_at'],
                );
                array_push($data,$item);
            }
            return $data;
        }
    }
    public function show_projects()
    {
        if(Auth::guard('admin')->check()){
            $projects= Project::all();
            $data=array();
            foreach($projects as $project){
                $item=array(
                    "id"=>$project['id'],
                    "title"=>$project['title'],
                    "created_at"=>$project['created_at'],
                    "updated_at"=>$project['updated_at'],
                );
                array_push($data,$item);
            }
            return $data;
        }
    }

    public function show_news()
    {
        if(Auth::guard('admin')->check()){
            $news= News::all();
            $data=array();
            foreach($news as $snews){
                $item=array(
                    "id"=>$snews['id'],
                    "title"=>$snews['newsTitle'],
                    "created_at"=>$snews['created_at'],
                    "updated_at"=>$snews['updated_at'],
                );
                array_push($data,$item);
            }
            return $data;
        }
    }
    public function users(){
        return View('Admin.users')->with(array("users"=>$this->show_users()));
    }
    public function projects(){
        return View('Admin.projects')->with(array("projects"=>$this->show_projects()));
    }
    public function news(){
        return View('Admin.news')->with(array("news"=>$this->show_news()));
    }

    public function delete_project(Request $request)
    {
        if(Auth::guard('admin')->check()){
            $project = Project::find($request['id']);
            $project->delete();

        }
    }

    public function delete_user(Request $request)
    {
        if(Auth::guard('admin')->check()){
            $user = User::find($request['id']);
            $user->delete();
        }
    }
    
    public function delete_news(Request $request)
    {
        if(Auth::guard('admin')->check()){
            $news = News::find($request['id']);
            $news->delete();
        }
    }
}
