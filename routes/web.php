<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',"HomeController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/project', 'HomeController@pros');


Route::post('/news/filelink' ,'NewsController@addfile');

Route::get('/admin/login' ,"Auth\AdminLoginController@showLoginForm");
Route::post('/admin/login' ,"Auth\AdminLoginController@login")->name('admin.login');
Route::get('/admin',"AdminController@index");
Route::get('/user' ,"PostContoller@index")->name('user');
Route::get('/user/post' ,"PostController@userpost")->name('user.post');
Route::get('/lictTeam' ,"PagesController@lictTeam");
Route::get('/interns' ,"PagesController@interns");
Route::get('/scholars' ,"PagesController@scholars");
Route::get('/vacancies' ,"PagesController@vacancy");
Route::post('/vacancySave' ,"PagesController@vacancySave");

Route::post('/admin/create_user' ,['middleware'=>'auth:admin','uses'=>"AdminController@create_user"])->name('admin.create_user');
Route::get('/admin/show_users' ,['middleware'=>'auth:admin','uses'=>"AdminController@show_users"]);
Route::get('/admin/users' ,['middleware'=>'auth:admin','uses'=>"AdminController@users"]);
Route::get('/admin/show_projects' ,['middleware'=>'auth:admin','uses'=>"AdminController@show_projects"]);
Route::get('/admin/projects' ,['middleware'=>'auth:admin','uses'=>"AdminController@projects"]);
Route::get('/admin/show_news' ,['middleware'=>'auth:admin','uses'=>"AdminController@show_news"]);
Route::get('/admin/news' ,['middleware'=>'auth:admin','uses'=>"AdminController@news"]);
Route::post('/admin/delete_project' ,['middleware'=>'auth:admin','uses'=>"AdminController@delete_project"]);
Route::post('/admin/delete_news' ,['middleware'=>'auth:admin','uses'=>"AdminController@delete_news"]);
Route::post('/admin/delete_user' ,['middleware'=>'auth:admin','uses'=>"AdminController@delete_user"]);
Route::post('/admin/create_project' ,['middleware'=>'auth:admin','uses'=>"AdminController@create_project"])->name('admin.create_project');
Route::post('/admin/create_news' ,['middleware'=>'auth:admin','uses'=>"AdminController@create_news"]);
Route::get('/project/{id}',"ProjectController@index");
Route::get('/projectfile/{id}',"ProjectController@givefile");
Route::post('/removefile',"ProjectController@removefile");
Route::get('/allusers',"ProjectController@allusers");
Route::get('/project/edit/{id}',"ProjectController@editProject");
Route::get('/projects',"ProjectController@projects");
Route::post('/project/saveProject',"ProjectController@saveProject")->name('project.save');
Route::post('/project/filelink' ,"ProjectController@addviewfile");
Route::get('/user/{id}',"UserController@index");
Route::get('/user/edit/{id}',"UserController@edit");
Route::post('/user/edit',"UserController@redit")->name('edit_user');
Route::post('/user/edit/reUsername',"UserController@reusername");
Route::post('/user/edit/rePassword',"UserController@repassword");
Route::post('/user/edit/reType',"UserController@retype");
Route::post('/project/edit/canEditUser',"ProjectController@permitUser");
Route::get('/search/{string}',"SearchController@index");
Route::get('project/{string}/{start}/{stop}',"SearchController@getProjects");
Route::get('user/{string}/{start}/{stop}',"SearchController@getUsers");
Route::get('news/{string}/{start}/{stop}',"SearchController@getNews");
Route::get('/smallsearch/{string}',"SearchController@getlessData");

Route::get('/news/{id}' ,"NewsController@index");
Route::get('/allnews' ,"NewsController@allnews");
Route::get('/news/edit/{id}' ,['middleware'=>'auth:admin', 'uses'=> 'NewsController@editView']);

Route::post('/news/edit' ,['middleware'=>'auth:admin', 'uses'=> 'NewsController@edit_news'])->name('news.save');

Route::get('/feedback' , "FeedbackController@index");
Route::post('/publications/save' , "PublicationsController@save");
Route::post('/publications/delete' , "PublicationsController@delete");
Route::post('/publications/add' , "PublicationsController@add");
Route::get('/publications' , "PublicationsController@index");
Route::post('/feedback' , "FeedbackController@save")->name('feedback.save');
Route::get('/dean' , "MessageController@deans");
Route::get('/chairman' , "MessageController@chairmans");
Route::post('/feedback/upload' , "FeedbackController@upload")->name('feedback.upload');
