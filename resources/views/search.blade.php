@extends('layout.initlayout')
@section('content')
<input id="searchstring" type="hidden" value="{{$querystring}}">
<div class="search-title">
    <p>Search Results for {{$querystring}}</p>
</div>
<div class="searcherbodycontainer">
<div class="ribbon">
    <div data-searchbdyrbnid="1" class="singleribbonItem ribbonactiveitem">
        People
    </div>
    <div data-searchbdyrbnid="2" class="singleribbonItem">
        Project
    </div>
    <div data-searchbdyrbnid="3" class="singleribbonItem">
        News
    </div>
</div>
<div class="searchbody">
    <div data-searchbdyid='1' class="searchpeople">
        <div class="searchres" id="srchusers">
        </div>
        <div class="spinner spinneruser"></div>
        <h3 class="infouser">No more data!</h3>
    </div>
    <div data-searchbdyid='2' class="searchproject">
            <div class="searchres" id="srchprojects">
            </div>
        <div class="spinner spinnerproject"></div>
        <h3 class="infoproject">No more data!</h3>
    </div>
    <div data-searchbdyid='3' class="searchnews">
            <div class="searchres" id="srchnews">
            </div>
        <div class="spinner spinnernews"></div>
        <h3 class="infonews">No more data!</h3>
    </div>
</div>
</div>
<style>
    .search-title{
        display: block;
        text-align: center;
        box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.3);
    }
    .search-title p{
        padding: 20px;
        color: black;
        font-size: 400%;
        margin:5px;
        font-family: sans-serif;
    }
    .ribbon{
        width: auto;
        padding: 5px;
    }
    .searcherbodycontainer{
        background: lavender;
    }
    .ribbon{
        max-width: 1000px;
        margin: 0 auto;
        display: flex;
        padding-bottom: 10px;
    }
    .singleribbonItem{
        width: auto;
        height: 35px;
        font-size: 27px;
        padding: 5px 15px;
        border-radius: 3px;
        user-select: none;
    }
    .singleribbonItem:hover{
        opacity: 0.8;
    }
    .ribbonactiveitem{
        color: white;
        background: black;
    }

    .searchres{
        max-width: 1000px;
        margin:0 auto;
        min-height: 50px;
        width: 100%
    }
    .searchpeople, .searchproject, .searchnews{
    display: flex;
    flex-direction: column;
    }
    .searchproject, .searchnews{
    display: none;
    }
    .searchresitem{
    width: 100%;
    height:auto;
    border-radius: 3px;
    min-height: 50px;
    display: flex;
    flex-grow: 1;
    padding:5px;
    text-decoration: none;
    color:black;
    margin: 3px;
    }
    .searchresitem:hover{
    background: white;
    }
    .srchbdyimg{
        width: 50px;
        height: 50px;
    }
    .srchbdydet{
        display: flex;
        flex-flow: 1;
        flex-direction: column;
        margin-left: 15px;
    }
    .srchbdyname{
        font-size: 23px;
        user-select: none;
    }
    .srchbdypost{
        font-size: 15px;
        user-select: none;
    }
    .infouser, .infoproject, .infonews{
        margin: 0 auto;
        padding: 10px;
        display: none;
        justify-content: center;
    }
</style>
<script>
    var nonewnews=false;
    var nonewusers=false;
    var nonnewprojects=false;
    var newspos=0;
    var userpos=0;
    var projectpos=0;
    var fetchuserrunning=false;
    var fetchprojectrunning=false;
    var fetchnewsrunning=false;
    function fetchuser(){
        if(nonewusers||fetchuserrunning)
            return;
        fetchuserrunning=true;
        var xhr=new XMLHttpRequest();
        xhr.open("GET","/user/"+document.querySelector("#searchstring").value+"/"+(userpos)+"/"+(userpos+7));
        xhr.onreadystatechange=function(){
      if(xhr.readyState===4){
        if(xhr.status==200){
            if(xhr.responseText=="[]"){
                document.querySelector(".infouser").style.display="flex";
                document.querySelector(".spinneruser").style.display="none";
                nonewusers=true;
                return;
            }
          var container=document.querySelector("#srchusers");
          var users=JSON.parse(xhr.response);
          userpos+=7;
              try{
            for(var i=0;users.length;i++){
              if(users[i]['imagLoc']==null)
                users[i]['imagLoc']='img/deafultuserimgblack.png';
              if(users[i]['fname']==null)
                users[i]['fname']="";
              if(users[i]['mname']==null)
                users[i]['mname']="";
              if(users[i]['lname']==null)
                users[i]['lname']="";
              if(users[i]['ioePost']==null)
                users[i]['ioePost']="";
                var str="<a class=\"searchresitem\" href='/user/"+ users[i]['id']+"'><img class=\"srchbdyimg\" src='/"+users[i]['imagLoc']+
                "'/><div class=\"srchbdydet\"><div class=\"srchbdyname\">"+users[i]['fname']+" "+users[i]['mname']+" "+users[i]['lname']+
                    "</div><div class=\"srchbdypost\">"+users[i]['ioePost']+"</div></div></a>";
                container.innerHTML+=str;
            }
          }
          catch(e){

          }
        console.log("height "+document.querySelector(".spinneruser").getBoundingClientRect().top);
        if(document.querySelector(".spinneruser").getBoundingClientRect().top<(window.scrollY+window.innerHeight)){
            fetchuserrunning=false;
            fetchuser();
            return;
        }
        document.querySelector(".spinneruser").style.display="none";
        
        }
        fetchuserrunning=false;
      }
      else
        document.querySelector(".spinneruser").style.display="block";
    }
    xhr.send();
}
    function fetchnews(){
        if(nonewnews||fetchnewsrunning)
            return;
            fetchnewsrunning=true;
        var xhr=new XMLHttpRequest();
        xhr.open("GET","/news/"+document.querySelector("#searchstring").value+"/"+(newspos)+"/"+(newspos+7));
  xhr.onreadystatechange=function(){
      if(xhr.readyState===4){
        if(xhr.status==200){
            if(xhr.responseText=="[]"){
                document.querySelector(".infonews").style.display="flex";
                document.querySelector(".spinnernews").style.display="none";
                nonewnews=true;
                return;
            }
          var container=document.querySelector("#srchnews");
          var users=JSON.parse(xhr.response);
          newspos+=7;
          try{
          for(var i=0;users.length;i++){
            var stri=users[i]['date']['date'];
            var mainstring=stri.slice(0,stri.length-7);
            if(users[i]['title']==null)
            continue;
              var str="<a class=\"searchresitem\" href='/news/"+users[i]['id']+"'><div class=\"srchbdydet\"><div class=\"srchbdyname\">"+
                users[i]['title']+"</div><div class=\"srchbdypost\">"
                    +mainstring+"</div></div></a>";
                container.innerHTML+=str;
          }
        }catch(e){
            
        }
        if(document.querySelector(".spinnernews").getBoundingClientRect().top<(window.scrollY+window.innerHeight)){
            fetchnewsrunning=false;
            fetchnews();
            return;
        }
        document.querySelector(".spinnernews").style.display="none";
    }
    fetchnewsrunning=false;
      }
      else{
            document.querySelector(".spinnernews").style.display="block";
        }
  }
  xhr.send();
    }
    function fetchproject(){
        if(nonnewprojects||fetchprojectrunning)
            return;
        fetchprojectrunning=true;
        var xhr=new XMLHttpRequest();
        xhr.open("GET","/project/"+document.querySelector("#searchstring").value+"/"+(projectpos)+"/"+(projectpos+7));
        xhr.onreadystatechange=function(){
        if(xhr.readyState===4){
        if(xhr.status==200){
            if(xhr.responseText=="[]"){
                document.querySelector(".infoproject").style.display="flex";
                document.querySelector(".spinnerproject").style.display="none";
                nonnewprojects=true;
                return;
            }
          var container=document.querySelector("#srchprojects");
          var users=JSON.parse(xhr.response);
          projectpos+=7;
          try{
            for(var i=0;users.length;i++){
                if(users[i]['title']==null)
                continue;
                if(users[i]['summary']==null)
                users[i]['summary']="";
                var str="<a class=\"searchresitem\" href='/project/"+users[i]['id']+"'><div class=\"srchbdydet\"><div class=\"srchbdyname\">"+users[i]['title']+"</div><div class=\"srchbdypost\">"+users[i]['summary']+"</div></div></a>";
                container.innerHTML+=str;
            }
        }catch(e){
            
        }
        if(document.querySelector(".spinnerproject").getBoundingClientRect().top<(window.scrollY+window.innerHeight)){
            fetchprojectrunning=false;
            fetchproject();
            return;
        }
        document.querySelector(".spinnerproject").style.display="none";
        }
        fetchprojectrunning=false;
      }
      else{
            document.querySelector(".spinnerproject").style.display="block";
        }
    }
  xhr.send();
    }
    var rbnitems=document.querySelectorAll(".singleribbonItem");
    for(var j=0;j<rbnitems.length;j++){
        rbnitems[j].addEventListener("click",function(e){
            var allitems=document.querySelectorAll(".singleribbonItem");
            for(var i=0;i<allitems.length;i++){
                if(allitems[i]==e.target){
                    if(!allitems[i].classList.contains("ribbonactiveitem")){
                        allitems[i].classList+=" ribbonactiveitem";
                        var str="[data-searchbdyid='"+allitems[i].getAttribute("data-searchbdyrbnid")+"']";
                        document.querySelector(str).style.display="block";
                        switch(allitems[i].getAttribute("data-searchbdyrbnid")){
                            case '1':
                                fetchuser();
                                break;
                            case '2':
                                fetchproject();
                                break;
                            case '3':
                                fetchnews();
                                break;
                        }
                    }
                }
                else{
                    if(allitems[i].classList.contains("ribbonactiveitem")){
                        allitems[i].classList.remove("ribbonactiveitem");
                        var str="[data-searchbdyid='"+allitems[i].getAttribute("data-searchbdyrbnid")+"']";
                        document.querySelector(str).style.display="none";
                    }
                }
            }
        });
    }
    var containers=document.querySelectorAll("[data-searchbdyid]");
    var lastscrolly=0;
    document.addEventListener("scroll",function(){
        if(lastscrolly<window.scrollY){
            var value=window.innerHeight;
            for(var i=0;i<containers.length;i++){
                if(containers[i].getBoundingClientRect().bottom==0)
                    continue;
                if((containers[i].getBoundingClientRect().y+containers[i].getBoundingClientRect().height)<value){
                    var c=containers[i].getAttribute("data-searchbdyid");
                    switch(c){
                        case "1":
                        fetchuser();
                        break;
                        case "2":
                        fetchproject();
                        break;
                        case "3":
                        fetchnews();
                        break;
                    }
                }
            }
            lastscrolly=window.scrollY;
        }
    });
    fetchuser();
</script>
@endsection