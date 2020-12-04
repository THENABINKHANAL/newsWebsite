<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/gif/jpg" href="{{asset('img/mainicon.jpg') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?fbclid=IwAR1JyNTocJ8E-nafqv0r3BFl0eOngnDeaWKkHxcf3l2BWSYPgvTwG-sC9nU" />
    
    
    <title>LICT</title>
</head>
<body>
        <nav class="header">
                <div class="header-box" style="z-index:200;">
                    <a class="logo-link" href="{{url('/')}}">
                        <img class="logo" src="{{ asset('assets/img/SVG/lict_logo.svg') }}"/>
                    </a>
        
                    <div class="nav-bar-box box-mobile">
                        <div class="title-login">
                            <div class="head-title">
                                Laboratory for ICT Research and Development
                            </div>
                            <div class="login" style="position: relative;display:flex;">
                                    <div class="search">
                                        <img class="searchIcon" src="{{asset('img/search.png')}}"/>
                                        <input class="searchBox">
                                        <div class="SearchPredictioncontainer">
                                        </div>
                                    </div>
                                    @if(Auth::check()||Auth::guard('admin')->check())
                                    <div class="circ">
                                            @if(Auth::check())
                                        {{ucfirst(@Auth::user()->name[0])}}
                                        @elseif(Auth::guard('admin')->check())
                                        {{ucfirst(@Auth::guard('admin')->user()->name[0])}}
                                        @endif
                                        <div class="menuu">
                                            <div style="position:relative;">
                                                @if(Auth::check())
                                        <a class="selectablediv" href="{{url('/user/')}}/{{@Auth::user()->id}}">Profile</a>
                                        @elseif(Auth::guard('admin')->check())
                                        <a class="selectablediv" href="{{url('/admin')}}">Dashboard</a>

                                            @endif
                                        <a class="selectablediv" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </div>
                                        </div>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                    @else
                                    
                                    <script>
                                        
                                        // Get the modal
                                        var modal = document.getElementById('id00');

                                        // When the user clicks anywhere outside of the modal, close it
                                        window.onclick = function(event) {
                                            if (event.target == modal) {
                                                modal.style.display = "none";
                                            }
                                        }
                                    </script>
                                    <a class="Loginbtn" onclick="document.getElementById('id00').style.display='flex'">Login</a>
                                    @endif
                            </div>
                        </div>
        
                        <div class="title-mobile">
                            LICT Lab
                        </div>
                        
                        <div class="nav-bar nav-bar-mob">
                            <ul>
                                <li  class="dropdown-link dropdown-link-mob">
                                    <a  href="#"><span>About <i class="caret"></i></span> </a>
                                    <div class="dropdown-menu" >
                                    <a href="{{url('/dean')}}">Dean's Message</a>
                                        <a href="{{url('/chairman')}}">Chairman's Message</a>
                                        <a href="#">Leadership</a>
                                        <a href="#">History</a>
                                    </div>   
                                </li>
                                <li class="dropdown-link dropdown-link-mob">
                                    <a  href="#"><span>Personnel <i class="caret"></i></span></a>
                                    <div class="dropdown-menu" >
                                        <a href="{{url('/lictTeam')}}">LICT Research Team</a>
                                        <a href="#">Faculty of computer and knowldge Engg.</a>
                                        <a href="#">Associated Faculties</a>
                                    </div>   
                                </li>
                                <li class="dropdown-link dropdown-link-mob">
                                    <a href="#"><span>Research <i class="caret"></i></span></a>
                                    <div class="dropdown-menu">
                                    <a href="{{url('/projects')}}">Projects</a>
                                    <a href="{{url('/interns')}}">Interns</a>
                                        <a href="{{('scholars')}}">Scholars</a>
                                    </div>
                                </li>
                                <li class="dropdown-link dropdown-link-mob">
                                    <a  href="#"><span>Collaborations <i class="caret"></i></span></a>
                                        <div class="dropdown-menu">
                                            <a href="https://ioe.edu.np/partnerships/national-and-international-linkage/">Universities and Agencies</a>
                                        </div>
                                </li>
                                <li >
                                    <a href="{{url('/allnews')}}"><span>News</span></a>
                                </li>
                                <li >
                                    <a href="{{url('/vacancies')}}"><span>Vacancy</span></a>
                                </li>
                                <li >
                                    <a href="{{url('/feedback')}}"><span>Contacts</span></a>
                                </li>
                                <li id="login-mob">
                                </li>
        
                            </ul>
                        </div>
        
                        <div class="ham-container">
                                <div class="mobsearch">
                                        <img class="mobsearchIcon" src="{{asset('img/search.png')}}"/>
                                        <input class="mobsearchBox">
                                        <div class="mobSearchPredictioncontainer">
                                        </div>
                                    </div>
                                <div class="login" style="position: relative;display:flex;">
                                        @if(Auth::check()||Auth::guard('admin')->check())
                                        <div class="circ">
                                                @if(Auth::check())
                                            {{ucfirst(@Auth::user()->name[0])}}
                                            @elseif(Auth::guard('admin')->check())
                                            {{ucfirst(@Auth::guard('admin')->user()->name[0])}}
                                            @endif
                                            <div class="menuu">
                                                <div style="position:relative;">
                                                    @if(Auth::check())
                                            <a class="selectablediv" href="{{url('/user/')}}/{{@Auth::user()->id}}">Profile</a>
                                            @elseif(Auth::guard('admin')->check())
                                            <a class="selectablediv" href="{{url('/admin')}}">Dashboard</a>
    
                                                @endif
                                            <a class="selectablediv" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-formm').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                        </div>
                                            </div>
                                            <form id="logout-formm" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                        @else
                                        
                                        <script>
                                            
                                            // Get the modal
                                            var modal = document.getElementById('id00');
    
                                            // When the user clicks anywhere outside of the modal, close it
                                            window.onclick = function(event) {
                                                if (event.target == modal) {
                                                    modal.style.display = "none";
                                                }
                                            }
                                        </script>
                                        <a class="Loginbtn" onclick="document.getElementById('id00').style.display='flex'">Login</a>
                                        @endif
                                </div>
                        <div class="ham-menu">
                            
                            <div class="container" onclick="myFunction(this)">
                                <div class="bar1"></div>
                                <div class="bar2"></div>
                                <div class="bar3"></div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </nav>


<!-- Login form modal --> 
<!--  Start      -->          
<div id="id00" class="modal" style="z-index:400;">
  
    <form class="modal-content animate" method="POST" action="{{ route('login') }}">
      @csrf
      <div class="imgcontainer">
        <span onclick="document.getElementById('id00').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>
  
      <div class="container">
        <h3>Login to your account</h3>
        <div class="elem">
            <label for="uname"><b>Username</b></label>
            <input class="inputText" id="email" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="elem">
            <label for="psw"><b>Password</b></label>
            <input class="inputText" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        </div>

        <button type="submit">Login</button>
        <br>
        <label for="check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
        </label>

      </div>

      
    </form>
  </div>

  <!--   End    -->
            @yield('content')
        
        
        
        
            <footer id="footer">
        
                <div id="links">
                    <ul id="internal-links">
                        <li  >
                            <a  href="#"><span>About</span> </a>  
                        </li>
                        <li >
                            <a  href="#"><span>Personnel</span></a>
                        </li>
                        <li >
                        <a href="{{url('/lictTeam')}}"><span>Research</span></a> 
                        </li>
                        <li >
                            <a  href="https://ioe.edu.np/partnerships/national-and-international-linkage/"><span>Collaborations</span></a>
                        </li>
                        <li >
                            <a href="{{url('/allnews')}}"><span>News</span></a>
                        </li>
                        <li >
                            <a href="{{url('/vacancies')}}"><span>Vacancy</span></a>
                        </li>
                        <li >
                            <a href="{{url('/feedback')}}"><span>Contacts</span></a>
                        </li>
                        <li >
                            <a href="{{url('/login')}}">Login</a>
                        </li>
                    </ul>
                    <div id="external-links">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-youtube"></a>
                    </div>
                    
                </div>
                <h4>&#169; Team One 2019 - All rights reserved.</h4>
            </footer>
        
            <script src="{{ asset('js/jquery.min.js') }}"></script>
            <script src="{{ asset('js/main.js') }}"></script>
            
</body>
</html>