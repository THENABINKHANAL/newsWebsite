@extends('layout.initlayout')
@section('content')
<style>
.projectContainer{
    max-width: 900px;
    margin: 0 auto;
    padding: 15px;
}
.titleLabel, .BodyLabel,.ProfessorLabel, .SummaryLabel, .linkgenLabel, .adminOnlyLabel{
    margin:15px 0px 5px 0px;
}
.titleInput, .SummaryInput{
    border-radius: 5px;
    width: 50%;
    height: 30px;
    border: 1px solid rgba(0, 41, 109,0.2);
    outline: none;
    padding-left: 5px;
}
.titleInput:hover, .SummaryInput:hover{
    border: 1px solid rgba(0, 41, 109,0.5);
}
.titleInput:focus, .ActualInput:focus, .SummaryInput:focus, .EditorActualInput:focus{
    box-shadow: 0px 0px 3px rgba(0, 41, 109,0.5);
    border: 1px solid rgba(0, 41, 109,0.5);
}
.ArrayInputContainer, .EditorArrayInputContainer{
    position: relative;
    width: 50%;
    height: auto;
    min-height: 30px;

}
.EditorArrayInputContainer{
    width: 90%;
}
.ActualInput:hover{
    border: 1px solid rgba(0, 41, 109,0.5);
}
.EditorActualInput:hover{
    border: 1px solid rgba(0, 41, 109,0.5);
}
.SelectedUsers, .EditorSelectedUsers{
    width: 100%;
    height: 100%;
    display: flex;
    flex-wrap: wrap;
    position: absolute;
}
.PredictedUser, .EditorPredictedUser{
    position: absolute;
    display: flex;
    flex-direction: column;
    z-index: 30;
    overflow: hidden;
    border-radius: 5px;
    background:white;
    max-height: 40vh;
    overflow-y: auto;
}
.SinglePrediction{
    width: 90px;
    height: auto;
    padding: 5px;
    background-color: rgba(0, 41, 109,0.1);
    user-select: none;
}
.SinglePrediction:hover, .active{
    background-color: rgba(0, 41, 109,0.5);
}
.cross{
    position: absolute;
    right: 5px;
    color: red;
    top: 1px;
    cursor: pointer;
}
.singleSelectedUser{
    background-color: antiquewhite;
    border-radius: 5px;
    padding: 2px 15px 2px 5px;
    position: relative;
    z-index: 10;
    margin: 5px;
    z-index: 30;
}
.ActualInput, .EditorActualInput{
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 5px;
    border: 1px solid rgba(0, 41, 109,0.2);
    outline: none;
    padding: 0px 5px 0px 5px;
    z-index: 20;
}

.fileinputcontainer{
    width: 100px;
    height: 40px;
    background-color: black;
    overflow: hidden;
    border-radius: 5px;
    margin: 15px 0px 15px 0px; 
    z-index: 10;
    position: relative;
    padding: 0px 5px 0px 5px;
}
#fileinput{
    font-size: 150px;
    opacity: 0;
    z-index: 30;
}
.inputfileLabel{
    position: absolute;
    color: white;
    z-index: -20;
    line-height: 40px;
    font-size: 20px;
    user-select: none;
}
.FileRemoveButton{
    font-size: 10px;
    display: inline-block;
    width: auto;
    background: rgba(143,3,4,0.5);
    margin-left: 10px;
}
.FileRemoveButton:hover{
    background: rgba(143,3,4,0.9);
}
.previouslyUploadedFiles{
    margin-top: 15px;
}
.fileName{
    display: inline-block;
}
.SaveButton{
    background: black;
    color: white;
    border-radius: 5px;
    font-size: 20px;
    margin: 5px 0px 5px 0px;
    border: 0;
    padding: 10px;
}
.titlenotshoenlabel, .projectEditorsLabel{
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
.adminSingleContainer{
    display: flex;
    flex-direction: row;
}
.saveButton{
    width: auto;
    height: auto;
    font-size: 20px;
    padding: 5px;
    border-radius: 5px;
    color: white;
    background: black;
    margin-left: 5px;
    user-select: none;
}
.projectEditorsInput{
    width: 100%;
    display: block;
    min-height: 40px;
}
</style>
    <div class="projectContainer">
<form method="POST" enctype="multipart/form-data" action={{route("project.save")}}>
        @csrf
<input type="hidden" name="id" id="projid" value="{{$id}}"/>

        <div class="TitleContainer">
            <div class="titleLabel">Title</div>
            <input class="titleInput" name="title" value="{{$title}}"/>
            <div class="titlenotshoenlabel">Title is just to idenitfy the project. It won't be added to the project view. So, include it in the editor.</div>
        </div>
        <div class="UsersContainer">
            <div class="ProfessorLabel">Associated Researchers</div>
            <div class="ArrayInputContainer">
                    <div class="PredictedUser">
                        <!--<div class="SinglePrediction">Nabin</div>-->

                    </div>
                    <input class="ActualInput"/>
                    <div class="SelectedUsers">
                    <!--<div class="singleSelectedUser">
                        <div class="cross">x</div>
                        <div class="data">Nabin</div>
                    </div>
                -->
                </div>

            </div>
        </div>
        <input type="hidden" value="{{$researchers}}" name="researchers" id="researchers"/>
        <div class="SummaryContainer">
                <div class="SummaryLabel">Summary</div>
                <textarea class="SummaryInput" name="summary">{{$summary}}</textarea>
            </div>
        <div class="EditorContainer">
            <div class="BodyLabel">Content</div>
            <textarea class="editor" id="product-body" name="projectData">{{$projectData}}</textarea>
        </div>
        <div class="fileinputcontainer">
            <div class="inputfileLabel">Select files</div>
            <input id="fileinput" type="file" multiple name="files[]"/>
        </div>
        <div class="selectedFiles">
        </div>
        <div class="previouslyUploadedFiles">
            <!--    Previously uploaded files
            <div class="previousSingleFile">
                <a class="fileName" href="/abc">Abc</a>
                <button class="FileRemoveButton">Remove</button>
            </div>
        -->
        </div>
        <input type="submit" value="Submit" submit class="SaveButton"/>

</form>
<div class="linkgenLabel">Select file to generate link</div>
<div class="linkgenContainer">
        <div class="linkgenbuttontext">Select a file</div>
    <input class="linkgenbutton" type="file" id="filetolink" data-id="{{$id}}"/>
    </div>
    <div class="genlink"></div>
    @if(Auth::guard('admin')->check())
<div class="adminOnlyLabel">Admin only inputs:</div>
<div class="adminSingleContainer">
<input type="hidden" value="{{$editors}}" id="editors"/>
<div class="projectEditorsInput">
        <div class="EditorArrayInputContainer">
                <div class="EditorPredictedUser">
                    <!--<div class="SinglePrediction">Nabin</div>-->

                </div>
                <input class="EditorActualInput"/>
                <div class="EditorSelectedUsers">
                <!--<div class="singleSelectedUser">
                    <div class="cross">x</div>
                    <div class="data">Nabin</div>
                </div>
            -->
            </div>
        </div>
</div>

<div class="saveButton" id="editorsave">Save</div>
<div class="projectEditorsLabel">Users added here can edit this project data</div>
<script>
    document.querySelector("#editorsave").addEventListener("click",function(){
        var xhr=new XMLHttpRequest();
            xhr.open("POST","../edit/canEditUser");
            var formData = new FormData();
            formData.append("_token", document.querySelector("input[name='_token']").value);
            formData.append("id", document.querySelector("#projid").value); 
            formData.append("editors", document.querySelector("#editors").value);    
            xhr.onreadystatechange=function(){
            if(xhr.readyState===4){
                var res="Error";
                if(xhr.status==200)
                    res="Saved";
                document.querySelector("#editorsave").innerHTML=res;
                setTimeout(() => {
                    document.querySelector("#editorsave").innerHTML="Save";
                }, 2000);
            }
            else
                document.querySelector("#editorsave").innerHTML="Saving...";
            }
            xhr.send(formData);
    });
</script>
@endif
</div>
</div>
<script>
    document.querySelector(".linkgenbutton").addEventListener("change",function(e){
        if(e.target.files.length>0){
            var xhr=new XMLHttpRequest();
            xhr.open("POST","../filelink");
            var formData = new FormData();
            formData.append("_token", document.querySelector("input[name='_token']").value);
            formData.append("id", e.target.getAttribute("data-id")); 
            formData.append("file", e.target.files[0]);    
            xhr.onreadystatechange=function(){
            if(xhr.readyState===4){
                document.querySelector(".genlink").innerHTML="../../project/"+xhr.response;
                }
            }
            xhr.send(formData);
        }
    });
    class ArrayPredict{
        drawprediction(){
            this.PredictionContainer.style.left=this.left+4-this.actualInput.getBoundingClientRect().left+"px";
            this.PredictionContainer.style.top=this.top+30-this.actualInput.getBoundingClientRect().top-5+"px";
            this.actualInput.style.paddingLeft=(this.left+4-this.actualInput.getBoundingClientRect().left)+"px";
            this.actualInput.style.paddingTop=(this.top-this.actualInput.getBoundingClientRect().top-5)+"px";
            this.actualInput.style.width=(this.initialWidth-(this.left+4-this.actualInput.getBoundingClientRect().left))+"px";
        }
        addevent(e){
            var me=e.target;
            var index=this.selectedData.findIndex(x=>x.id==me.getAttribute("data-id"));
            this.alteredData.push(this.selectedData[index]);
            this.selectedData.splice(index,1);
            this.render();
        }
        storeData(){
            var data="["
            for(var i=0;i<this.selectedData.length;i++){
                data+=this.selectedData[i]['id'];
                if(i!=(this.selectedData.length-1))
                    data+=",";
            }
            data+="]";
            this.researchers.value=data;
        }
        render(){
            this.SelectedUsers.innerHTML="";
            for(var j=0;j<this.selectedData.length;j++){
                this.SelectedUsers.innerHTML+="<div class=\"singleSelectedUser\"> <div class=\"cross\"  data-id="+this.selectedData[j]['id']+">x</div><div class=\"data\">"+this.selectedData[j]['name']+"</div></div>";
            }
            var that=this;
            var alldata=this.SelectedUsers.querySelectorAll(".singleSelectedUser");
            this.top=0;
            this.left=0;
            for(var i=0;i<alldata.length;i++){
                if(alldata[i].getBoundingClientRect().top>this.top){
                    this.top=alldata[i].getBoundingClientRect().top;
                    this.left=alldata[i].getBoundingClientRect().right;
                }
                else if(alldata[i].getBoundingClientRect().top==this.top){
                    if(alldata[i].getBoundingClientRect().right>this.left)
                        this.left=alldata[i].getBoundingClientRect().right;
                }
                alldata[i].addEventListener("click",function(e){
                    that.addevent(e);
                    that.PredictionContainer.style.display="none"; 
                    that.storeData();
                });
            }
            if(this.selectedData.length==0){
                this.top=this.actualInput.getBoundingClientRect().top;
                this.left=this.actualInput.getBoundingClientRect().left;
            }
            this.drawprediction();
        }
        doall(e){
            this.drawprediction();
                if(e==13){
                    if(this.predictedData.length>0){
                        this.selectedData.push(this.predictedData[this.selectedIndex]);
                        var index=this.alteredData.indexOf(this.predictedData[this.selectedIndex]);
                        this.alteredData.splice(index,1);
                        this.actualInput.value="";
                        this.storeData();
                        this.render();
                    }
                }
                else if(e==40){
                    this.selectedIndex++;
                    if(this.selectedIndex>=this.predictedData.length)
                        this.selectedIndex=this.predictedData.length-1;
                }
                else if(e==38){
                    this.selectedIndex--;
                    if(this.selectedIndex<0)
                        this.selectedIndex=0;
                }
                this.predictedData=Array.from(this.alteredData);
                var totalLength=this.alteredData.length;
                for(var i=0;i<totalLength;i++){
                    for(var j=0;j<this.actualInput.value.length;j++){
                        if(this.predictedData[i]['name'].length<=j){
                            this.predictedData.splice(i,1);
                            i--;
                            totalLength--;
                            break;
                        }
                        
                        if(this.actualInput.value[j].toLowerCase()!=this.predictedData[i]['name'][j].toLowerCase()){
                            this.predictedData.splice(i,1);
                            i--;
                            totalLength--;
                            break;
                        }
                    }
                }
                this.PredictionContainer.innerHTML="";
                for(var i=0;i<this.predictedData.length;i++){
                    if(this.selectedIndex==i)
                    this.PredictionContainer.innerHTML+="<div class=\"SinglePrediction active\" data-id="+this.predictedData[i]['id']+">"+this.predictedData[i]['name']+"</div>";
                    else
                    this.PredictionContainer.innerHTML+="<div class=\"SinglePrediction\" data-id="+this.predictedData[i]['id']+">"+this.predictedData[i]['name']+"</div>";
                }
                var allpredictions=this.PredictionContainer.querySelectorAll(".SinglePrediction");
                var thatt=this;
                for(var i=0;i<allpredictions.length;i++){
                    allpredictions[i].addEventListener("click",function(e){
                        thatt.pausefocus=true;
                        var me=e.target;
                        var index=thatt.alteredData.findIndex(x=>x.id==me.getAttribute("data-id"));
                        thatt.selectedData.push(thatt.alteredData[index]);
                        thatt.alteredData.splice(index,1);
                        thatt.actualInput.value="";
                        thatt.storeData();
                        thatt.render();
                        thatt.doall(32);
                    });
                }
        }
        constructor(PredictionContainer,SelectedUsers,actualInput,researchers,data){
            this.PredictionContainer=PredictionContainer;
            this.SelectedUsers=SelectedUsers;
            this.actualInput=actualInput;
            this.researchers=researchers;
            this.unalteredData=Array.from(data);
            this.alteredData=Array.from(data);
            this.selectedData=[];
            this.predictedData=[];
            var that=this;
            this.firstfocus=true;
            this.selectedIndex=0;
            this.lastInput="";
            this.initialWidth=this.actualInput.getBoundingClientRect().width;
            this.top=this.actualInput.getBoundingClientRect().top;
            this.left=this.actualInput.getBoundingClientRect().left;
            this.actualInput.addEventListener("keypress",function(e){
                if(e.keyCode==13)
                    e.preventDefault();
            });
            this.actualInput.addEventListener("keyup",function(e){
                that.doall(e.keyCode);
            });
            if(this.researchers.value!=""){
                var alldata=JSON.parse(this.researchers.value);
                for(var i=0;i<alldata.length;i++){
                    var index=this.alteredData.findIndex(x=>x.id==alldata[i]);
                    this.selectedData.push(this.alteredData[index]);
                    this.alteredData.splice(index,1);
                }
                this.storeData();
                this.render();
            }
            this.actualInput.addEventListener("focusout",function(e){
                setTimeout(() => {
                    that.PredictionContainer.style.display="none";
                }, 500);

            });
            this.actualInput.addEventListener("focusin",function(e){
                if(that.firstfocus){
                    that.top=that.actualInput.getBoundingClientRect().top;
                    that.left=that.actualInput.getBoundingClientRect().left;
                    that.firstfocus=false;
                }
                that.PredictionContainer.style.display="block";
                that.doall(32);
            });
            this.render();
        }
    }
    document.addEventListener("DOMContentLoaded",function(){
    var xhr=new XMLHttpRequest();
    xhr.open("GET","../../../allusers");
    xhr.onreadystatechange=function(){
        if(xhr.readyState===4){
            var array=JSON.parse(xhr.response);
            console.log(array);
            new ArrayPredict(document.querySelector(".PredictedUser"),document.querySelector(".SelectedUsers"),document.querySelector(".ActualInput"),document.querySelector("#researchers"),array);
            new ArrayPredict(document.querySelector(".EditorPredictedUser"),document.querySelector(".EditorSelectedUsers"),document.querySelector(".EditorActualInput"),document.querySelector("#editors"),array);
        }
    }
    xhr.send();
    });
    function loadpreviousfiles(){
        var filexhr=new XMLHttpRequest();
        filexhr.open("GET","../../../projectfile/"+document.querySelector("#projid").value);
        filexhr.onreadystatechange=function(){
            if(filexhr.readyState===4){
                if(filexhr.response!=""){
                var allfiles=JSON.parse(filexhr.response);
                    var container=document.querySelector(".previouslyUploadedFiles");
                    if(allfiles.length>0){
                        container.innerHTML="Previously uploaded files";
                        for(var i=0;i<allfiles.length;i++){
                            container.innerHTML+="<div class=\"previousSingleFile\"><a class=\"fileName\" href="+allfiles[i]["link"]+">"+allfiles[i]["name"]+"</a><button class=\"FileRemoveButton\" data-id="+allfiles[i]['id']+">Remove</button></div>";
                        }
                    }
                    var allremovers=container.querySelectorAll(".FileRemoveButton");
                    for(var j=0;j<allremovers.length;j++){
                        allremovers[j].addEventListener("click",function(e){
                            e.preventDefault();
                            var removexhr=new XMLHttpRequest();
                            removexhr.open("POST","../../../removefile?_token="+document.querySelector("input[name='_token']").value+"&id="+document.querySelector("#projid").value+"&fileid="+e.target.getAttribute("data-id")+"&file="+e.target.files);
                            removexhr.onreadystatechange=function(){
                                if(removexhr.readyState===4){
                                    loadpreviousfiles();
                                }
                            }
                            removexhr.send();
                        });
                    }
                }
            }
        }
        filexhr.send();
    }

    loadpreviousfiles();
    document.querySelector("#fileinput").addEventListener("change",function(e){
        var allfiles=document.querySelector("#fileinput").files;
        if(allfiles.length>0){
            document.querySelector(".selectedFiles").innerHTML="Selected file(s)";
            for(var i=0;i<allfiles.length;i++){
                document.querySelector(".selectedFiles").innerHTML+="<li>"+allfiles[i].name+"</li>";
            }
        }
    });
</script>
<script src="../../../vendor/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'product-body' );
</script>
@endsection

