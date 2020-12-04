@extends('Layout.AdminInit')
@section('content')

    
    
            <div class="col-md-9">
              <div class="panel">
                <div class="panel-header">
                  <h3>Website Overview</h3>
                </div>
                <div class="panel-body">
                  <div class=col-md-3>
                    <div class="well dash-box">
                    <h1><i class="fas fa-user"></i> <span>{{$usersno}}</span></h1>
                      <h3>Users</h3>
                    </div>
                  </div>
                  <div class=col-md-3>
                    <div class="well dash-box">
                    <h1><i class="fas fa-file-powerpoint"></i> <span>{{$projectsno}}</span></h1>
                      <h3>Projects</h3>
                    </div>
                  </div>
                  <div class=col-md-3>
                    <div class="well dash-box">
                    <h1><i class="fas fa-file-code"></i> <span>{{$newsno}}</span></h1>
                      <h3>News</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="content-panel">
                <div class="panel-header">
                  <h5>Latest users</h5>
                </div>
    
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                    <tr>
                      <th>Username</th>
                      <th>email</th>
                    </tr>
                    @foreach ($users as $user)
                    <tr onclick="window.location.replace('../user/{{$user['id']}}');">
                      <td>{{$user['name']}}</td>
                      <td>{{$user['email']}}</td>
                    </tr>
                    @endforeach

                  </table>
                </div>
              </div>
            </div>
    
@endsection