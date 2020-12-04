@extends('Layout.AdminInit')
@section('content')
<link href={{ asset('css/users.css') }} rel="stylesheet">
<div class="home-div">

            <!-- Website Overview -->
            <div class="mypanel" style="max-width:55vw;">
              <div class="mypanel-heading">
                <h5 class="mypanel-title">Projects</h5>
              </div>
              <div class="mypanel-body">
                <div class="filter-form">
                          <input class="form-control" value="" type="text" id="ProjectsFilter" placeholder="Filter Projects...">
                </div>
                <table class="table table-striped table-hover">
                  <tbody id="projects_table_body">
                      <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                      </tr>
                      @foreach ($projects as $project)
                      <tr>
                          <td>{{$project['id']}}</td>
                          <td>{{$project['title']}}</td>
                          <td>{{$project['created_at']}}</td>
                          <td>{{$project['updated_at']}}</td>
                          <td><a class="btn btn-default" href="{{url('project/edit')}}/{{$project['id']}}">Edit</a> <a class="btn btn-danger"  onclick="delete_proj(this)" data-link= "{{$project['id']}}">Delete</a></td>
                        </tr>
                      @endforeach
                    </tbody>
                    </table>
              </div>
              </div>
              <script>
                projects=[];
                function refreshProject(){
                  var xhr=new XMLHttpRequest();
                  xhr.open("GET","../admin/show_projects");
                  xhr.onreadystatechange=function(){
                      if(xhr.readyState===4){
                        projects=JSON.parse(xhr.response);
                        displayProjects(projects);
                      }
                  }
                  xhr.send();
              }
              function loadProjects(){
                  var xhr=new XMLHttpRequest();
                  xhr.open("GET","../admin/show_projects");
                  xhr.onreadystatechange=function(){
                      if(xhr.readyState===4){
                        projects=JSON.parse(xhr.response);
                      }
                  }
                  xhr.send();
              }
              loadProjects();
              function displayProjects(response){
                document.querySelector("#projects_table_body").innerHTML="<tr><th>ID</th><th>Title</th><th>Created At</th><th>Updated At</th><th></th></tr>";
                        for(var i=0;i<response.length;i++){
                            var str=response[i]['created_at']['date'];
                                str=str.slice(0,str.length-7);
                            var str1=response[i]['created_at']['date'];
                                str1=str1.slice(0,str1.length-7);
                            document.querySelector("#projects_table_body").innerHTML+="<tr><td>"+response[i]['id']+"</td><td>"+response[i]['title']+"</td><td>"+str+"</td><td>"+str1+"</td><td><a class=\"btn btn-default\" href=\"../project/edit/"+response[i]['id']+"\">Edit</a> <a class=\"btn btn-danger\"  onclick=\"delete_proj(this)\" data-link= \'"+response[i]['id']+"'>Delete</a></td></tr>";
                        }
              }
              function delete_proj(e){
                var xhr=new XMLHttpRequest();
                  xhr.open("POST","../admin/delete_project?"+"_token="+document.querySelector("input[name='_token']").value+"&id="+e.getAttribute("data-link"));
                  xhr.onreadystatechange=function(){
                      if(xhr.readyState===4){
                        refreshProject();
                      }
                  }
                  xhr.send();
              }
              document.querySelector("#ProjectsFilter").addEventListener("keyup",function(e){
                  if(e.target.value==""){
                    displayProjects(projects);
                  }
                  else{
                    filtered=[];
                    for(var i=0;i<projects.length;i++){
                      for(var j=0;j<4;j++){
                        var mainstring="";
                        switch(j){
                          case 0:
                          mainstring=projects[i]['id'];
                          break;
                          case 1:
                          mainstring=projects[i]['title'];
                          break;
                          case 2:
                          var str=projects[i]['updated_at']['date'];
                          mainstring=str.slice(0,str.length-7);
                          break;
                          case 3:
                          var str=projects[i]['created_at']['date'];
                          mainstring=str.slice(0,str.length-7);
                          break;
                        }
                        if(mainstring==null)
                          continue;
                        if(searchforstring(mainstring.toString(),e.target.value)){
                          filtered.push(projects[i]);
                          break;
                        }
                      }
                    }
                    displayProjects(filtered);
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