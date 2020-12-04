<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href={{ asset('css/admin_header.css') }} />
    <link href={{ asset('css/bootstrap.min.css') }} rel="stylesheet">
  <link href={{ asset('css/main2.css') }} rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<body>
    <nav class="nav-bar">

        <div id="mob-nav-bar-top">
            <div class="mob-title">
                <h2>LICT Dashboard</h2>
            </div>
        
        
            <div class="ham-menu">
                <div class="container" onclick="myFunction(this)">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            </div>            
        </div>

        
        <div class="left-nav-bar">
            <ul>
                <li>
                    <a href={{url('admin/users')}}>Users</a>
                </li>
                <li>
                    <a href={{url('admin/projects')}}>Projects</a>
                </li>
                <li>
                    <a href={{url('admin/news')}}>News</a>
                </li>
                <li>
                <div  style="position:relative;" id="login">Logout
                            <form action="{{ route('logout') }}" method="POST" style="width:100%; height:100%; background-color:transparent;">
                                        @csrf      
                                        <button type="submit" style="width: 65px;
                                                                    height: 100%;
                                                                    background-color: transparent;
                                                                    position: absolute;
                                                                    right: 1px;
                                                                    border:none;" >
                                        </button>
                            </form>
                        </div>
                </li>
            </ul>
        </div>


        <div class="right-nav-bar">
            <ul>
                <li>
                    <a href="#"><img style="height:40px" src="img/circular-avatar.svg" ></a>
                </li>
                <li>
                    <div id="login" style="position:relative;">Logout
                        <form action="{{ route('logout') }}" method="POST" style="width:100%; height:100%; background-color:transparent;">
                                    @csrf      
                            <button type="submit" style="width: 65px;
                                                                    height: 100%;
                                                                    background-color: transparent;
                                                                    position: absolute;
                                                                    right: 1px;
                                                                    border:none;"></button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
<div class="main-page">
        <div class="home-div">

                <header>
                    <div class="container">
                      <div class="row">
                        <div class="col-md-9">
                          <div style="display:flex" class="logo-box">
                          <img id="logo" src={{ asset('img/lict_logo.svg') }} />
                          <h1 class="">LICT Dashboard</h1>
                        </div>
                        </div>
                        <div class="col-md-2">
                          <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              Create
                            </a>
                
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item" data-toggle="modal" data-target="#add-user"><span><img src={{ asset('img/user.svg') }} alt="U"></span> User </a>
                              <a class="dropdown-item" data-toggle="modal" data-target="#add-project"><span><img src={{ asset('img/folder.svg') }} alt="P"></span> Project</a>
                              <a class="dropdown-item" data-toggle="modal" data-target="#add-news"><span><img src={{ asset('img/web.svg') }} alt="W"></span> News</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </header>
                
                  <section>
                    <div class="container">
                      <ol class="breadcrumb">
                        <li class="active">Dashboard</li>
                      </ol>
                    </div>
                  </section>
                
                
                  <section id="main">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-3">
                          <div class="list-group">
                            <a href="admin" class="list-group-item list-group-item-action active">
                              Dashboard
                            </a>
                            <a href={{url('admin/users')}} class="list-group-item list-group-item-action"><span><img src={{ asset('img/user.svg') }} alt="U"></span> Users</a>
                            <a href={{url('admin/projects')}} class="list-group-item list-group-item-action"><span><img src={{ asset('img/folder.svg') }} alt="P"></span>
                              Projects</a>
                            <a href={{url('admin/news')}} class="list-group-item list-group-item-action"><span><img src={{ asset('img/web.svg') }} alt="W"></span> News </a>

                          </div>
                        </div>
        @yield('content')
    </div>
</div>
</div>
</div>
</div>
</section>

<!--Modals-->

<!-- Add user -->

<!--start-->
<div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
@csrf
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add User</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>

<div class="modal-body">
 <h6>Username</h6>
  <input type="text" vlaue="username" id="name2">
<br>
  <h6>Password</h6>
  <input type="password" vlaue="password" id="password2">
</div>
<div style="margin-left:20px" id="usersMessage"></div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
<button type="button" class="btn btn-primary" id="create_user_btn">Add User</button>
</div>
</div>
</div>
</div>
<!-- End -->

<!-- Add user -->
<!-- start -->

<div class="modal fade" id="add-project" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
@csrf
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add Project</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>

<div class="modal-body">
 <h6>Project title</h6>
  <input type="text" id="ptitle">
</div>
<div style="margin-left:20px;" id="projectsMessage"></div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
<button type="button" class="btn btn-primary" id="create_project_btn">Add Project</button>
</div>
</div>
</div>
</div>

<div class="modal fade" id="add-news" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    @csrf
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Add News</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
    
    <div class="modal-body">
     <h6>News Title</h6>
      <input type="text" id="ntitle">
    </div>
    <div id="newsMessage" style="margin-left:20px"></div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    <button type="button" class="btn btn-primary" id="create_news_btn">Add News</button>
    </div>
    </div>
    </div>
    </div>
<!-- End -->

<script>
        document.querySelector("#create_user_btn").addEventListener("click",createUser);
        function createUser(){
          if(document.querySelector("#name2").value==""&&document.querySelector("#password2").value=="")
          return;
                var xhr= new XMLHttpRequest();
                xhr.open("POST","../admin/create_user?_token="+document.querySelector("input[name='_token']").value+"&name="+document.querySelector("#name2").value+"&password="+document.querySelector("#password2").value);
                xhr.onreadystatechange = function(){
                    if(xhr.readyState === 4) {
                      if(xhr.status==201){
                        document.querySelector("#name2").value="";
                        document.querySelector("#password2").value="";
                        document.querySelector("#usersMessage").innerHTML="New User Created!";
                        if(refreshUser!=null)
                            refreshUser();

                      }
                      else{
                        document.querySelector("#usersMessage").innerHTML="Error Creating User. Same username already exists!";
                      }
                      setTimeout(() => {
                          document.querySelector("#usersMessage").innerHTML="";                        
                          }, 2000);
                    }
                };
                xhr.send();
        }
        document.querySelector("#create_project_btn").addEventListener("click",createProject);
        function createProject(){
          if(document.querySelector("#ptitle").value=="")
          return;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../admin/create_project?_token="+document.querySelector("input[name='_token']").value+"&title="+document.querySelector('#ptitle').value);
            xhr.onreadystatechange = function () {
                    if(xhr.readyState === 4) {
                      if(xhr.status==201){
                        document.querySelector("#ptitle").value="";
                      document.querySelector("#projectsMessage").innerHTML="New Project Created!";
                      if(refreshProject!=null)
                        refreshProject();
                      }
                      else{
                      document.querySelector("#projectsMessage").innerHTML="Error creating project!";
                      }
                      setTimeout(() => {
                      document.querySelector("#projectsMessage").innerHTML="";                        
                      }, 2000);
                    }
            };
            xhr.send();
       }
       document.querySelector("#create_news_btn").addEventListener("click",createNews);
       function createNews(){
        if(document.querySelector("#ntitle").value=="")
          return;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../admin/create_news?_token="+document.querySelector("input[name='_token']").value+"&title="+document.querySelector('#ntitle').value);
            xhr.onreadystatechange = function () {
                    if(xhr.readyState === 4) {
                      if(xhr.status==201){
                        document.querySelector("#ntitle").value="";
                      document.querySelector("#newsMessage").innerHTML="New News Created!";
                      if(refreshNews!=null)
                        refreshNews();
                      }
                      else{
                      document.querySelector("#newsMessage").innerHTML="Error creating news!";
                      }
                      setTimeout(() => {
                      document.querySelector("#newsMessage").innerHTML="";                        
                      }, 2000);
                    }
            };
            xhr.send();
       }
</script>
<script src={{ asset('js/app.js') }}></script>
    </div>

    <div class="footer">
        <p>&#169;team one 2019</p>
    </div>