(function(){/*modal=document.querySelector("#myModal")

update_pic=document.querySelector("#update-pic");

update_pic.onclick=function(){
    modal.style.display="block";
};

span=document.querySelector(".close");
span.onclick=function(){
    modal.style.display="none";
};
*/
var update_profile=document.querySelector(".update-profile-pic");
update_profile.onclick=function(){
    var files=document.querySelector("#files");
    files.click();
};

$image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'circle'
    },
    boundary:{
      width:300,
      height:300
    }
  });

function readFile(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('.croppie-modal').css(
            "display","flex"
        );

        $image_crop.croppie('bind', {
            url: e.target.result
          }).then(function(){
            console.log('jQuery bind complete');
          });
      }
  
      reader.readAsDataURL(input.files[0]);
      //$('#uploadimageModal').modal('show');
    }
  }


var fileSelect=document.querySelector('#files');
fileSelect.addEventListener('change',function(){

    readFile(this);
});

$('#cancel').on('click',()=>{
  $('.croppie-modal').css('display','none');
});

var imgblob=null;
$('#save').on('click',function(e){
   $image_crop.croppie('result', 'blob'
  ).then(function(blob){
    setblob(blob);
    $('.croppie-modal').css("display","none");
    const imageUrl = URL.createObjectURL(blob);
    const img = document.querySelector('.profile-image');
    //img.addEventListener('load', () => URL.revokeObjectURL(imageUrl));
    document.querySelector('.profile-image').src = imageUrl;
  });
});

document.getElementsByTagName

}());

function setblob(blob){
  imgblob=blob;
}
document.querySelector("#detailSave").addEventListener("click",function(){
  var xhr=new XMLHttpRequest();
  xhr.open("POST","../edit");
  var formData = new FormData();
  formData.append("_token",document.querySelector('[name=_token]').value);
  try{
  if(imgblob!=null)
    formData.append("file",imgblob);
  }
  catch(e){};
  formData.append("id",document.querySelector('[name=id]').value);
  formData.append("FirstName",document.querySelector('[name=FirstName]').value);
  formData.append("MiddleName",document.querySelector('[name=MiddleName]').value);
  formData.append("LastName",document.querySelector('[name=LastName]').value);
  formData.append("post",document.querySelector('[name=post]').value);
  formData.append("mail",document.querySelector('[name=mail]').value);
  formData.append("phone",document.querySelector('[name=phone]').value);
  formData.append("publications",document.querySelector('[name=publications]').value);
  formData.append("prvProfile",document.querySelector('[name=prvProfile]').value);
  formData.append("website",document.querySelector('[name=website]').value);
  formData.append("Remarks",document.querySelector('[name=Remarks]').value);
  if(document.querySelector('[name=lictTitle]'))
    formData.append("lictTitle",document.querySelector('[name=lictTitle]').value);
  formData.append("researchAreas",document.querySelector('[name=researchAreas]').value);
  xhr.onreadystatechange=function(){
      if(xhr.readyState===4){
        if(xhr.responseText=="Saved"){
          window.location.replace("../"+document.querySelector('[name=id]').value);
        }
        else if(xhr.status!=200){
          document.querySelector("#message").innerHTML="Sorry, details not saved. Please try again.";
        }
      }
  }
  xhr.send(formData);
});