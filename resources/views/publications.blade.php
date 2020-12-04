@extends('layout.initlayout')

@section('content')
<style>
    .page-title{
        display: block;
        text-align: center;
        box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.3);
    }
    .page-title p{
        padding: 20px;
        color: black;
        font-size: 400%;
        font-family: sans-serif;
        margin: 5px;
    }
    .pubContainer{
        margin: 0 auto;
        max-width: 900px;
    }
    .inputerr{
        display: none;
    }
    .inputText{
        margin-top: 10px;
        min-height: 100px;
    }
    .spinner{
        background: white;
    }
    button{
        margin: 8px;
    }
    .queryButtons{
        display: flex;
    }
    #newTextblock{
        display: none;
    }
</style>
<div class="page-title">
        <p>Research Publications</p>
    </div>
    <div class="pubContainer">
        @csrf
        <ul id="allpubs">
            @foreach ($pubData as $item)
            <li class="pubData" liitemID="{{$item->id}}">{{$item->text}}</li>
            <div class="inputerr" divitemID="{{$item->id}}">
            <textarea class="inputText" inputitemID="{{$item->id}}"></textarea>
            <div class="queryButtons">
                <button class="saveButton" itemID="{{$item->id}}">Save</button>
                <button class="deleteButton" itemID="{{$item->id}}">Delete</button>
                <button class="cancelButton" itemID="{{$item->id}}">Cancel</button>
            </div>
            </div>
            @endforeach
        </ul>
        @if(Auth::guard('admin')->check())
        <div id="newTextblock">
            <textarea id="newText" class="inputText"></textarea>
            <div class="queryButtons">
                <button id="newTextSave">Save</button>
                <button id="newTextCancel">Cancel</button>
            </div>
        </div>
        <button id="addnewItembtn">Add new item</button>
        @endif
    </div>
    @if(Auth::guard('admin')->check())

    <script>
        document.addEventListener("DOMContentLoaded",function(e){
            document.querySelector("#addnewItembtn").addEventListener("click",function(){
                document.querySelector("#newTextblock").style.display="block";
            });
            document.querySelector("#newTextCancel").addEventListener("click",function(){
                document.querySelector("#newTextblock").style.display="none";
            });
            document.querySelector("#newTextSave").addEventListener("click",function(){
                    var xhr=new XMLHttpRequest();
                    xhr.open("POST","/publications/add?"+"_token="+document.querySelector("input[name='_token']").value+
                    "&text="+document.querySelector('#newText').value);
                    xhr.onreadystatechange=function(){
                        if(xhr.readyState===4){
                            if(xhr.status==201){
                                var res=JSON.parse(xhr.response);
                                document.querySelector("#allpubs").innerHTML+="<li class=\"pubData\" liitemID="+res['id']+">"+
                                    res['text']+"</li><div class=\"inputerr\" divitemID="+res['id']+"><textarea class=\"inputText\" inputitemID="
                                        res['id']+"></textarea><div class=\"queryButtons\"><button class=\"saveButton\" itemID="+
                                            res['id']+">Save</button><button class=\"deleteButton\" itemID="
                                            +res['id']+">Delete</button><button class=\"cancelButton\" itemID="
                                            +res['id']+">Cancel</button></div></div>";
                                addevents();
                                e.target.innerHTML="Save";                                    
                            }
                            else{
                                e.target.innerHTML="Error";
                                setTimeout(() => {
                                    e.target.innerHTML="Save";                                    
                                }, 1000);
                            }
                        }
                    }
                    xhr.send();
                    document.querySelector("#newTextblock").style.display="none";
                    e.target.innerHTML="<div class=\"lightspinner\"></div>";
            });
            addevents();
        });
        function addevents(){
            var all=document.querySelectorAll(".pubData");
            all.forEach(element => {
                element.addEventListener("dblclick",function(e){
                var item=e.target;
                var id=item.getAttribute("liitemID");
                document.querySelector('[divitemID="'+id+'"]').style.display="block";
                document.querySelector('[inputitemID="'+id+'"]').innerHTML=item.innerHTML;
                });
            });
            all=document.querySelectorAll(".saveButton");
            all.forEach(element => {
                element.addEventListener("click",function(e){
                    var id=e.target.getAttribute("itemID");
                    var xhr=new XMLHttpRequest();
                    xhr.open("POST","/publications/save?"+"_token="+document.querySelector("input[name='_token']").value+"&id="+id+
                    "&text="+document.querySelector('[inputitemID="'+id+'"]').value);
                    xhr.onreadystatechange=function(){
                        if(xhr.readyState===4){
                            if(xhr.status==200){
                                document.querySelector('[inputitemID="'+id+'"]').innerHTML=JSON.parse(xhr.response)['text'];
                                document.querySelector('[liitemID="'+id+'"]').innerHTML=JSON.parse(xhr.response)['text'];
                                document.querySelector('[divitemID="'+id+'"]').style.display="none";
                                e.target.innerHTML="Save";                                    
                            }
                            else{
                                e.target.innerHTML="Error";
                                setTimeout(() => {
                                    e.target.innerHTML="Save";                                    
                                }, 1000);
                            }
                        }
                    }
                    xhr.send();
                    e.target.innerHTML="<div class=\"lightspinner\"></div>";
                });
            });
            all=document.querySelectorAll(".deleteButton");
            all.forEach(element => {
                element.addEventListener("click",function(e){
                    var id=e.target.getAttribute("itemID");
                    var xhr=new XMLHttpRequest();
                    xhr.open("POST","/publications/delete?"+"_token="+document.querySelector("input[name='_token']").value+"&id="+id);
                    xhr.onreadystatechange=function(){
                        if(xhr.readyState===4){
                            if(xhr.status==200){
                            document.querySelector('[divitemID="'+id+'"]').remove();
                            document.querySelector('[liitemID="'+id+'"]').remove();
                            e.target.remove();
                            }
                            else{
                                e.target.innerHTML="Error";
                                setTimeout(() => {
                                    e.target.innerHTML="Delete";                                    
                                }, 1000);
                            }
                        }
                    }
                    xhr.send();
                    e.target.innerHTML="<div class=\"lightspinner\"></div>";
                });
            });
            all=document.querySelectorAll(".cancelButton");
            all.forEach(element => {
                element.addEventListener("click",function(e){
                        document.querySelector('[divitemID="'+e.target.getAttribute("itemID")+'"]').style.display="none";
                });
            });
        }
    </script>
    @endif
@endsection