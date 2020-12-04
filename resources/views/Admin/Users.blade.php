@extends('Layout.AdminInit')
@section('content')
            <!-- Website Overview -->
            <div class="mypanel" style="max-width:55vw;">
              <div class="mypanel-heading">
                <h5 class="mypanel-title">Users</h5>
              </div>
              <div class="mypanel-body">
                <div class="filter-form">
                      <div>
                          <input class="form-control" name="q" type="text" autocomplete="off" id="UserFilter" placeholder="Filter Users...">
                      </div>
                </div>
                <table class="table table-striped table-hover">
                    <tbody id="users_table_body">
                      <tr>
                        <th >ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th></th>
                      </tr>
                      @foreach ($users as $user)
                      <tr>
                            <td>{{$user['id']}}</td>
                            <td>{{$user['name']}}</td>
                            <td class="mail">{{$user['email']}}</td>
                            <td>{{$user['created_at']}}</td>
                      <td><a class="btn btn-default" href="{{url('user/edit')}}/{{$user['id']}}">Edit</a> <a class="btn btn-danger" onclick="delete_user(this)" data-link="{{$user['id']}}">Delete</a></td>
                          </tr>
                      @endforeach
                    </tbody>
                    </table>
              </div>
              </div>
              <script>

                users=[];
                function refreshUser(){
                    var xhr=new XMLHttpRequest();
                    xhr.open("GET","../admin/show_users");
                    xhr.onreadystatechange=function(){
                        if(xhr.readyState===4){
                          users=JSON.parse(xhr.response);
                          displayUsers(users);
                        }
                    }
                    xhr.send();
                }
                function loadData(){
                    var xhr=new XMLHttpRequest();
                    xhr.open("GET","../admin/show_users");
                    xhr.onreadystatechange=function(){
                        if(xhr.readyState===4){
                          users=JSON.parse(xhr.response);
                        }
                    }
                    xhr.send();
                }
                loadData();
                function displayUsers(response){
                  document.querySelector("#users_table_body").innerHTML="<tr><th>ID</th><th>Username</th><th>Email</th><th>Created At</th><th></th></tr>";
                  for(var i=0;i<response.length;i++){
                      var str=response[i]['created_at']['date'];
                      str=str.slice(0,str.length-7);
                      document.querySelector("#users_table_body").innerHTML+="<tr><td>"+response[i]['id']+"</td><td>"+response[i]['name']+"</td><td class=\"mail\">"+response[i]['email']+"</td><td>"+str+"<td><a class=\"btn btn-default\" href='../user/edit/"+response[i]['id']+"'>Edit</a> <a class=\"btn btn-danger\" onclick=\"delete_user(this)\" data-link='"+response[i]['id']+"'>Delete</a></td>";
                  }
                }
                function delete_user(e){
                    var xhr=new XMLHttpRequest();
                    xhr.open("POST","../admin/delete_user?"+"_token="+document.querySelector("input[name='_token']").value+"&id="+e.getAttribute("data-link"));
                    xhr.onreadystatechange=function(){
                        if(xhr.readyState===4){
                            if(refreshUser()!=null)
                                refreshUser();
                        }
                    }
                    xhr.send();
                }
                document.querySelector("#UserFilter").addEventListener("keyup",function(e){
                  if(users==null){
                    refreshUser();
                  }
                  console.log(users);
                  if(e.target.value==""){
                    displayUsers(users);
                  }
                  else{
                    filtered=[];
                    for(var i=0;i<users.length;i++){
                      for(var j=0;j<4;j++){
                        var mainstring="";
                        switch(j){
                          case 0:
                          mainstring=users[i]['id'];
                          break;
                          case 1:
                          mainstring=users[i]['name'];
                          break;
                          case 2:
                          mainstring=users[i]['email'];
                          break;
                          case 3:
                          var str=users[i]['created_at']['date'];
                          mainstring=str.slice(0,str.length-7);
                          break;
                        }
                        if(mainstring==null)
                          continue;
                        if(searchforstring(mainstring.toString(),e.target.value)){
                          filtered.push(users[i]);
                          break;
                        }
                      }
                    }
                    console.log(filtered);
                    displayUsers(filtered);
                  }
                });
                function searchforstring(mainstring,substring){
                  if(substring.length==0)
                    return true;
                  else if(mainstring.length==0)
                    return false;
                  if(mainstring[0].toLowerCase()==substring[0].toLowerCase()){
                  var a=mainstring[0];
                  while(mainstring[0]==a)
                    mainstring=mainstring.substr(1,mainstring.length);
                  return searchforstring(mainstring,substring.substr(1, substring.length));
                  }
                  else
                  return searchforstring(mainstring.substr(1, mainstring.length),substring);
                }

              </script>
          
@endsection