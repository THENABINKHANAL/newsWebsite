@extends('layout.initlayout')

@section('content')
<script src="{{asset('/js/jquery.min.js')}}"></script>
<link rel="stylesheet" type="text/css" media="screen" href={{ asset('css/croppie.css') }} />
<link rel="stylesheet" type="text/css" media="screen" href={{ asset('css/edit_profile.css') }} />
<script src={{ asset('js/croppie.js') }}></script>

<div class="whole">
    <div class="top-section" id="myform" >
    <input type="hidden" name="id" id="userid" value="{{$user['id']}}"/>
        @csrf
        <div class="intro-section">
            <div class="profile-photo">
                @if($user['imgPathName']!="")
                <img id="profile-pic" class="profile-image" src={{ asset($user['imgPathName']) }}>
                    @else
                <img class="profile-image" src="{{asset('img/deafultuserimgblack.png')}}">
                @endif
                <div class="update-profile-pic">
                    <img src={{ asset('img/camera.svg') }}>
                    <p>Update</p>
                    <input type="file" id="files" class="hidden"/>
                </div>
            </div>

            <div class="profile-info">
                <div class="update-form">
                    First Name:<br>
                    <input name="FirstName" placeholder="firstname"  value="{{$user['FirstName']}}" class="allInputs">
                    Middle Name:<br>
                    <input name="MiddleName" placeholder="middlename"  value="{{$user['MiddleName']}}" class="allInputs">
                    Last Name:<br>
                    <input name="LastName" placeholder="lastname"  value="{{$user['LastName']}}" class="allInputs">
                    IOE post:<br>
                    <input name="post" placeholder="post" value="{{$user['ioePost']}}" class="allInputs">
                    Email:<br>
                    <input name="mail" placeholder="mail" value="{{$user['email']}}" class="allInputs">
                    Phone no:<br>
                    <input name="phone" placeholder="phone" value="{{$user['contactphone']}}" class="allInputs">
                    Website:<br>
                    <input name="website" placeholder="website"  value="{{$user['personalURL']}}" class="allInputs">
                    Previous LICT Profile:<br>
                    <input name="prvProfile" placeholder="Previous Profile URL" value="{{$user['prvProfile']}}" class="allInputs">
                    Publication:<br>
                    <input name="publications" placeholder="publication"  value="{{$user['publications']}}" class="allInputs">
                    @if($user['lictType']==3)
                    LictTitle:<br>
                        <input name="lictTitle" placeholder="LictTitle" value="{{$user['lictTitle']}}" class="allInputs">
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

<div class="main-section">

    <div class="bio">
        <div class="update-bio">
            <p>Remarks</p><br>
            <textarea class="allInputs" name="Remarks">{{$user['Remarks']}}</textarea>
        </div>

        <div class="update-bio">
            <p>Research Areas</p>
            <textarea class="research-area allInputs" name="researchAreas">{{$user['researchAreas']}}</textarea>
        </div>
    </div>
    <h3 id="message"></h3>
    <div class="change">
        <button class="update" id="detailSave">
            Save
        </button>

        <button class="cancel">
            Cancel
        </button>


        <!--Update Profile Picture Modal-->

        <!--Modal Start-->

    </div>

</div>
    <div id="uploadimageModal" class="croppie-modal" role="dialog">
        <div id="modal-dialog">
            <div id="modal-content">
                <div id="modal-header">

                </div>
                <div id="modal-body">
                    <div id="image_demo" style="width:400px; margin-top:30px"></div>
                </div>
            </div>
            <div id="modal-footer">
                <button id="save">Save</button>
                <button id="cancel">Cancel</button>
            </div>
        </div>

    </div>
    @if(Auth::guard('admin')->check())
    <div class="AdminOnlyLabel">
        Admin Only inputs:
        <div class="adminlabels">
        New Username:
        </div>
        <div class="singlecontainer">
        <input class="allInputs" id="adminUserName" placeholder="Username">
        <button class="adminSaveButton usernamebutton">Save</button>
        </div>
        <div class="adminlabels">
        New Password:
        </div>
        <div class="singlecontainer">
        <input class="allInputs" id="adminUserPassword" placeholder="Password" type="password">
        <button class="adminSaveButton passwordbutton">Save</button>
        </div>
        <div class="adminlabels">
        User Type:
        </div>
        <div class="singlecontainer">
        <select class="userTypeSelect allInputs">
            <option value="1">Intern</option>
            <option value="2">Scholar</option>
            <option value="3">Research Team (Core)</option>
            <option value="4">Research Team</option>
          </select>
        <button class="adminSaveButton usertypebutton">Save</button>
        </div>
    <script>
    document.querySelector(".usernamebutton").addEventListener("click",function(e){
        var xhr=new XMLHttpRequest();
        xhr.open("POST","../edit/reUsername");
        var formData = new FormData();
        formData.append("_token", document.querySelector("input[name='_token']").value);
        formData.append("id", document.querySelector("#userid").value); 
        formData.append("username", document.querySelector("#adminUserName").value);     
        xhr.onreadystatechange=function(){
        if(xhr.readyState===4){
            var res="Error";
            if(xhr.status==200)
                res="Saved";
            document.querySelector(".usernamebutton").innerHTML=res;
            setTimeout(() => {
                document.querySelector(".usernamebutton").innerHTML="Save";
            }, 2000);
        }
        else
            document.querySelector(".usernamebutton").innerHTML="Saving...";
        }
        xhr.send(formData);
        e.target.innerHTML="<div class=\"lightspinner\"></div>";

    });
    document.querySelector(".passwordbutton").addEventListener("click",function(e){
        var xhr=new XMLHttpRequest();
        xhr.open("POST","../edit/rePassword");
        var formData = new FormData();
        formData.append("_token", document.querySelector("input[name='_token']").value);
        formData.append("id", document.querySelector("#userid").value); 
        formData.append("password", document.querySelector("#adminUserPassword").value);    
        xhr.onreadystatechange=function(){
        if(xhr.readyState===4){
            var res="Error";
            if(xhr.status==200)
                res="Saved";
            document.querySelector(".passwordbutton").innerHTML=res;
            setTimeout(() => {
                document.querySelector(".passwordbutton").innerHTML="Save";
            }, 2000);
        }
        else
            document.querySelector(".passwordbutton").innerHTML="Saving...";
        }
        xhr.send(formData);
        e.target.innerHTML="<div class=\"lightspinner\"></div>";

    });
    document.querySelector(".usertypebutton").addEventListener("click",function(e){
        var xhr=new XMLHttpRequest();
        xhr.open("POST","../edit/reType");
        var formData = new FormData();
        formData.append("_token", document.querySelector("input[name='_token']").value);
        formData.append("id", document.querySelector("#userid").value); 
        formData.append("usertype", document.querySelector(".userTypeSelect").value);    
        xhr.onreadystatechange=function(){
        if(xhr.readyState===4){
            var res="Error";
            if(xhr.status==200)
                res="Saved";
            document.querySelector(".usertypebutton").innerHTML=res;
            setTimeout(() => {
                document.querySelector(".usertypebutton").innerHTML="Save";
            }, 2000);
        }
        else
            document.querySelector(".usertypebutton").innerHTML="Saving...";
        }
        xhr.send(formData);
        e.target.innerHTML="<div class=\"lightspinner\"></div>";

    });
    </script>
    @endif
</div>
</div>
    <script src={{ asset('js/edit_profile.js') }}></script>
@endsection