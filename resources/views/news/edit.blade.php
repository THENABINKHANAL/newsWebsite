@extends('layout.initlayout')
@section('content')
<style>
.newsContainer{
    max-width: 900px;
    margin: 0 auto;
    padding:15px;
}
.titleLabel, .BodyLabel, .MainimgLabel{
    margin:5px 0px 5px 0px;
}
.titleInput, .MainimgInput{
    border-radius: 5px;
    width: 50%;
    height: 30px;
    border: 1px solid rgba(0, 41, 109,0.2);
    outline: none;
    padding-left: 5px;
}
.titleInput:hover{
    border: 1px solid rgba(0, 41, 109,0.5);
}
.titleInput:focus{
    box-shadow: 0px 0px 5px rgba(0, 41, 109,0.5);
    border: 1px solid rgba(0, 41, 109,0.5);
}
.MainimgInput:hover{
    border: 1px solid rgba(0, 41, 109,0.5);
}
.MainimgInput:focus{
    box-shadow: 0px 0px 5px rgba(0, 41, 109,0.5);
    border: 1px solid rgba(0, 41, 109,0.5);
}
.infoLabel{
    font-size: 12px;
    color: rgba(0, 41, 109,0.4);
    margin: 2px 0px 7px 0px;
}
.linkgenContainer{
    position: relative;
    background: black;
    width: 125px;
    border-radius: 3px;
    height: auto;
    z-index: 10;
    height: 40px;
    display: inline-block;
    margin: 5px 0px;
}
.linkgenbuttontext{
    position: absolute;
    color: white;
    font-size: 20px;
    padding: 10px;
    z-index: -10;
}
.linkgenbutton{
    font-size: 25px;
    opacity: 0;
    z-index: 30;
    width: 125px;
}
.genlink{
    display: inline;
    padding-left: 10px;
}
</style>
<div class="newsContainer">
<form method="POST" action={{route("news.save")}}>
    @csrf
    <input type="hidden" value="{{$id}}" name="id" id="newsID"/>

    <div class="TitleContainer">
        <div class="titleLabel">Title</div>
        <input class="titleInput" name="newsTitle" value="{{$newsTitle}}"/>
        <div class="infoLabel">Title is just to identify the news. The news article will not include title. So, include it in editor.</div>
    </div>
    <div class="MainimgContainer">
        <div class="MainimgLabel">Preview Image</div>
        <input class="MainimgInput" name="Mainimg" value="{{$Mainimg}}"/>
        <div class="infoLabel">Title is just to show image on news preview.</div>
    </div>
    <div class="EditorContainer">
        <div class="BodyLabel">Editor</div>
    <textarea class="editor" id="product-body" name="newsDetails">{{$newsDetails}}</textarea>
    </div>
    <button class="SaveButton" submit>Save</button>
</form>

<div class="linkgenLabel">Select file to generate link</div>
<div class="linkgenContainer">
    <div class="linkgenbuttontext">Select a file</div>
<input class="linkgenbutton" type="file" id="filetolink" data-id="{{$id}}"/>
</div>
<div class="genlink"></div>
</div>
<script src="../../../vendor/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'product-body' );
    document.querySelector("#filetolink").addEventListener("change",function(e){
        var allfiles=e.target.files;
        if(allfiles.length>0){
            var xhr=new XMLHttpRequest();
            var formData = new FormData();

            formData.append("_token", document.querySelector("input[name='_token']").value);
            formData.append("id", e.target.getAttribute("data-id")); 
            formData.append("file", e.target.files[0]); 
            xhr.open("POST","../filelink");
                    xhr.onreadystatechange=function(){
                        if(xhr.readyState===4){
                            document.querySelector(".genlink").innerHTML="../../news/"+xhr.response;
                        }
                    }
                    xhr.send(formData);
        }
    });
</script>
@endsection

