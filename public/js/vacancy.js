document.querySelector("#applicationSubmit").addEventListener("click",function(){
        if(document.querySelector("#applicantName").value==""||document.querySelector("#applicantEmail").value==""||document.querySelector("#applicantContact").value==""||document.querySelector("#applicantCV").files.length==0){
            document.querySelector("#vacancySave").innerHTML="Please fill all above fields!";
            return;
        }
        var xhr=new XMLHttpRequest();
        xhr.open("POST","../vacancySave");
        var formData = new FormData();
        formData.append("_token", document.querySelector("input[name='_token']").value);
        formData.append("title", document.querySelector("#vacancyID").value); 
        formData.append("name", document.querySelector("#applicantName").value); 
        formData.append("email", document.querySelector("#applicantEmail").value); 
        formData.append("contactNo", document.querySelector("#applicantContact").value); 
        formData.append("file",document.querySelector("#applicantCV").files[0]);    
        xhr.onreadystatechange=function(){
        if(xhr.readyState===4){
            if(xhr.status==200)
            document.querySelector("#applicationSubmit").innerHTML="Application Saved";
            else
            document.querySelector("#applicationSubmit").innerHTML="Error";
            document.querySelector("#applicantName").value="";
            document.querySelector("#applicantEmail").value="";
            document.querySelector("#applicantContact").value="";
            document.querySelector("#applicantCV").value="";
            setTimeout(() => {
                document.querySelector("#applicationSubmit").innerHTML="Save";
            }, 2000);
        }
    }
        xhr.send(formData);
        document.querySelector("#applicationSubmit").innerHTML="Saving...";

});
var somefunc= (function(){
function somefunc(vacancyId){
    document.getElementById("id02").style.display="flex";
    document.getElementById("vacancyID").value=vacancyId;
    document.getElementById("vacancyTitle").innerHTML="Apply for "+vacancyId;
}

// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
return somefunc;
})();
