@extends('Layout.AdminInit')
@section('content')


<link href={{ asset('css/users.css') }} rel="stylesheet">



            <div class="mypanel" style="max-width:55vw;">
              <div class="mypanel-heading">
                <h5 class="mypanel-title">News</h5>
              </div>
              <div class="mypanel-body">
                <div class="filter-form">
                      <div>
                          <input value="" class="form-control" id="NewsFilter" type="text" placeholder="Filter news...">
                      </div>
                </div>
                <table class="table table-striped table-hover">
                  <tbody id="news_table_body">  
                    <tr>
                        <th>Title</th>
                        <th>Published</th>
                        <th>Created</th>
                        <th></th>
                      </tr>
                      @foreach ($news as $snews)
                      <tr>
                          <td>{{$snews['title']}}</td>
                          <td><img style="width:20px" src="{{asset('img/check-mark.svg')}}" alt=""></td>
                          <td>{{$snews['created_at']}}</td>
                          <td><a class="btn btn-default" href="{{url('news/edit')}}/{{$snews['id']}}">Edit</a> <a class="btn btn-danger" onclick="delete_news(this)" data-link= "{{$snews['id']}}">Delete</a></td>
                        </tr>
                      @endforeach
                    </tbody>
                    </table>

              </div>
              </div>
              <script>
                news=[];
                function delete_news(e){
                    var xhr=new XMLHttpRequest();
                      xhr.open("POST","../admin/delete_news?"+"_token="+document.querySelector("input[name='_token']").value+"&id="+e.getAttribute("data-link"));
                      xhr.onreadystatechange=function(){
                          if(xhr.readyState===4){
                            refreshNews();
                          }
                      }
                      xhr.send();
                  }
                  function refreshNews(){
                      var xhr=new XMLHttpRequest();
                      xhr.open("GET","../admin/show_news");
                      xhr.onreadystatechange=function(){
                          if(xhr.readyState===4){
                            news=JSON.parse(xhr.response);
                            displaynews(news);
                          }
                      }
                      xhr.send();
                  }
                  function loadNews(){
                    var xhr=new XMLHttpRequest();
                      xhr.open("GET","../admin/show_news");
                      xhr.onreadystatechange=function(){
                          if(xhr.readyState===4){
                            news=JSON.parse(xhr.response);
                          }
                      }
                      xhr.send();
                  }
                  loadNews();
                  function displaynews(response){
                    document.querySelector("#news_table_body").innerHTML="<tr><th>Title</th><th>Published</th><th>Created</th><th></th></tr>";
                            for(var i=0;i<response.length;i++){
                                var str=response[i]['created_at']['date'];
                                    str=str.slice(0,str.length-7);
                                var str1=response[i]['created_at']['date'];
                                    str1=str1.slice(0,str1.length-7);
                                    document.querySelector("#news_table_body").innerHTML+="<tr><td>"+response[i]['title']+"</td><td><img style='width:20px' src='../img/check-mark.svg'></td><td>"+str1+"</td><td><a class='btn btn-default' href='../news/edit/"+response[i]['id']+"'>Edit</a> <a class='btn btn-danger'  onclick='delete_news(this)' data-link= '"+response[i]['id']+"'>Delete</a></td></tr>";
                            }
                  }
                  document.querySelector("#NewsFilter").addEventListener("keyup",function(e){
                  if(e.target.value==""){
                    displaynews(news);
                  }
                  else{
                    filtered=[];
                    for(var i=0;i<news.length;i++){
                      for(var j=0;j<3;j++){
                        var mainstring="";
                        switch(j){
                          case 0:
                          mainstring=news[i]['id'];
                          break;
                          case 1:
                          mainstring=news[i]['title'];
                          break;
                          case 2:
                          var str=news[i]['created_at']['date'];
                          mainstring=str.slice(0,str.length-7);
                          break;
                        }
                        if(mainstring==null)
                          continue;
                        if(searchforstring(mainstring.toString(),e.target.value)){
                          filtered.push(news[i]);
                          break;
                        }
                      }
                    }
                    displaynews(filtered);
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