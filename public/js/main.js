function myFunction(x) {
    x.classList.toggle("change");
  }

var item=document.querySelector('.ham-menu');
item.addEventListener('click',function(){
   var foo=document.querySelector('.nav-bar>ul');
   if(document.querySelector('#mobile-navigation')){
     foo.removeAttribute("id");
   }
   else{
   foo.setAttribute("id","mobile-navigation");
  }

  var dropdown=document.querySelectorAll('.dropdown-link')
  for(var i=0;i<dropdown.length;i++){
    dropdown[i].addEventListener('click',function(){
        dropdown.classList.toggle('dropdown-menu-mob');
    });
  }
  
});

document.querySelector(".searchIcon").addEventListener("click",function(){
  if(!document.querySelector(".search").classList.contains("Active"))
    document.querySelector(".search").classList+=" Active";
  document.querySelector(".searchBox").setAttribute("style","display:block");

});
window.addEventListener("mousedown",function(){
  document.querySelector(".searchBox").setAttribute("style","display:none");
  if(document.querySelector(".search").classList.contains("Active"))
    document.querySelector(".search").classList.remove("Active");
});
document.querySelector(".search").addEventListener("mousedown",function(e){
  if(!document.querySelector(".search").classList.contains("Active"))
  document.querySelector(".search").classList+=" Active";
  e.stopPropagation();
});
window.onresize=function(){
  if(document.querySelector('#mobile-navigation')){
    console.log(window.outerWidth);
    if(window.outerWidth > 800){
      document.querySelector('.nav-bar>ul').removeAttribute('id');
      var elem=document.querySelector('.container');
      var evnt=elem["onclick"];
      if(typeof(evnt)=="function"){evnt.call(elem);}
    }
    if(window.outerWidth < 800){
      var login=document.querySelector('#login');
      login.innerHTML('<a href="#">Login</a>');
    }
  }
}
var searchboxvalue="";
document.querySelector(".searchBox").addEventListener("keyup",function(e){
  if(e.keyCode==13){
    window.location.href = '/search/'+e.target.value;
    return;
  }
  if(searchboxvalue==e.target.value||e.target.value=="")
  return;
  searchboxvalue=e.target.value;
  var xhr=new XMLHttpRequest();
  xhr.open("GET","/smallsearch/"+e.target.value);
  xhr.onreadystatechange=function(){
      if(xhr.readyState===4){
        if(xhr.status==200){
          var container=document.querySelector(".SearchPredictioncontainer");
          var data=JSON.parse(xhr.response);
          var users=data['users'];
          container.innerHTML="";
          try{
            for(var i=0;users.length;i++){
              if(users[i]['imagLoc']==null)
                users[i]['imagLoc']='img/deafultuserimg.png';
              if(users[i]['fname']==null)
                users[i]['fname']="";
              if(users[i]['mname']==null)
                users[i]['mname']="";
              if(users[i]['lname']==null)
                users[i]['lname']="";
              if(users[i]['ioePost']==null)
                users[i]['ioePost']="";
            container.innerHTML+="<a href='/user/"+users[i]['id']+"'class='SingleSearch'><div class='searchcat'>User</div><img class='searchuserimg' src='/"+
            users[i]['imagLoc']+"'><div class='searchname'>"+
            users[i]['fname']+" "+users[i]['mname']+" "+users[i]['lname']+"</div><div class='searchpost'>"+
            users[i]['ioePost']+"</div></a>";
            }
          }
          catch(e){

          }
          users=data['projects'];
          try{
          for(var i=0;users.length;i++){
            if(users[i]['title']==null)
              continue;
            if(users[i]['summary']==null)
              users[i]['summary']="";
            container.innerHTML+="<a href='/project/"+users[i]['id']+"'class='SingleSearch'><div class='searchcat'>Project</div><div class=\"searchprojname\">"+users[i]['title']+"</div><div class=\"searchprojsummary\">"+users[i]['summary']+"</div>";
          }
          }catch(e){
            
          }
          users=data['news'];
          try{
          for(var i=0;users.length;i++){
            if(users[i]['title']==null)
              continue;
            container.innerHTML+="<a href='/news/"+users[i]['id']+"'class='SingleSearch'><div class='searchcat'>News</div><div class=\"searchprojname\">"+users[i]['title'];
          }
          }catch(e){
            
          }
        }
      }
  }
  xhr.send();
  document.querySelector(".SearchPredictioncontainer").innerHTML="<div style='height:50px;display:flex;width:100%; align-items:center'><div style='margin:0 auto;' class=\"lightspinner\"></div></div>";

});
document.querySelector(".mobsearchIcon").addEventListener("click",function(){
  if(!document.querySelector(".mobsearch").classList.contains("Active"))
    document.querySelector(".mobsearch").classList+=" Active";
  document.querySelector(".mobsearchBox").setAttribute("style","display:block");
  if(window.innerWidth<810){
  document.querySelector("#mainlogo").style.opacity=0;
  document.querySelector(".title-mobile").style.opacity=0;
  }

});

window.addEventListener("mousedown",function(){
  document.querySelector(".mobsearchBox").setAttribute("style","display:none");
  if(document.querySelector("#mainlogo").style.opacity==0){
    document.querySelector("#mainlogo").style.opacity=1;
    document.querySelector(".title-mobile").style.opacity=1;
  }

  if(document.querySelector(".mobsearch").classList.contains("Active"))
    document.querySelector(".mobsearch").classList.remove("Active");
  
});
var prvy=0;
window.addEventListener("touchmove",function(e){
  prvy=1;
});
window.addEventListener("touchend",function(e){
  if(prvy||e.target==document.querySelector(".mobsearchBox")||event.target.classList.contains("mobSingleSearch")){
    prvy=0;
    return;
  }
  prvy=0;
  document.querySelector(".mobsearchBox").setAttribute("style","display:none");
  if(document.querySelector("#mainlogo").style.opacity==0){
    document.querySelector("#mainlogo").style.opacity=1;
    document.querySelector(".title-mobile").style.opacity=1;
  }

  if(document.querySelector(".mobsearch").classList.contains("Active"))
    document.querySelector(".mobsearch").classList.remove("Active");
  
});
document.querySelector(".mobsearch").addEventListener("mousedown",function(e){
  if(!document.querySelector(".mobsearch").classList.contains("Active"))
  document.querySelector(".mobsearch").classList+=" Active";
  e.stopPropagation();
  if(window.innerWidth<810){
    document.querySelector("#mainlogo").style.opacity=0;
    document.querySelector(".title-mobile").style.opacity=0;
  }
});
var mobsearchboxvalue="";
document.querySelector(".mobsearchBox").addEventListener("keyup",function(e){
  if(window.innerWidth<810){
    document.querySelector("#mainlogo").style.opacity=0;
    document.querySelector(".title-mobile").style.opacity=0;
  }
  if(e.keyCode==13){
    window.location.href = '/search/'+e.target.value;
    return;
  }
  if(mobsearchboxvalue==e.target.value||e.target.value=="")
  return;
  mobsearchboxvalue=e.target.value;
  var xhr=new XMLHttpRequest();
  xhr.open("GET","/smallsearch/"+e.target.value);
  xhr.onreadystatechange=function(){
      if(xhr.readyState===4){
        if(xhr.status==200){
          var container=document.querySelector(".mobSearchPredictioncontainer");
          var data=JSON.parse(xhr.response);
          var users=data['users'];
          container.innerHTML="";
          try{
            for(var i=0;users.length;i++){
              if(users[i]['imagLoc']==null)
                users[i]['imagLoc']='img/deafultuserimg.png';
              if(users[i]['fname']==null)
                users[i]['fname']="";
              if(users[i]['mname']==null)
                users[i]['mname']="";
              if(users[i]['lname']==null)
                users[i]['lname']="";
              if(users[i]['ioePost']==null)
                users[i]['ioePost']="";
            container.innerHTML+="<a href='/user/"+users[i]['id']+"'class='mobSingleSearch'><div class='mobsearchcat'>User</div><img class='mobsearchuserimg' src='/"+
            users[i]['imagLoc']+"'><div class='mobsearchname'>"+
            users[i]['fname']+" "+users[i]['mname']+" "+users[i]['lname']+"</div><div class='mobsearchpost'>"+
            users[i]['ioePost']+"</div></a>";
            }
          }
          catch(e){

          }
          users=data['projects'];
          try{
          for(var i=0;users.length;i++){
            if(users[i]['title']==null)
              continue;
            if(users[i]['summary']==null)
              users[i]['summary']="";
            container.innerHTML+="<a href='/project/"+users[i]['id']+"'class='mobSingleSearch'><div class='mobsearchcat'>Project</div><div class=\"mobsearchprojname\">"+users[i]['title']+"</div><div class=\"mobsearchprojsummary\">"+users[i]['summary']+"</div>";
          }
          }catch(e){
            
          }
          users=data['news'];
          try{
          for(var i=0;users.length;i++){
            if(users[i]['title']==null)
              continue;
            container.innerHTML+="<a href='/news/"+users[i]['id']+"'class='mobSingleSearch'><div class='mobsearchcat'>News</div><div class=\"mobsearchprojname\">"+users[i]['title'];
          }
          }catch(e){
            
          }
        }
        else{
          container.innerHTML+="";
        }
      }
  }
  xhr.send();
  document.querySelector(".mobSearchPredictioncontainer").innerHTML="<div style='height:50px;display:flex;width:100%; align-items:center'><div style='margin:0 auto;' class=\"lightspinner\"></div></div>";
});

