@extends('layout.initlayout')
@section('content')
<style>
a{
    color: black;
}
.mainContainer{
    display: flex;
    max-width: 1200px;
    margin:0 auto;
    flex-direction: column;
}
.cauroselContainer{
    width: 65vw;
    overflow: hidden;
    position: relative;
    margin: 10px;
}
.newsContainer{
    min-height: 300px;
    flex: 1;
    margin: 10px;
    overflow: hidden;
    border-radius: 0px 0px 5px 5px;
    display:flex;
    flex-direction: column;
}

.MessageContainer{
    max-height: 600px;
    flex: 1;
    margin: 10px;
    overflow-y: auto;
    font-family:inherit;
    
}
.ContentContainer{
    min-height: 300px;
    flex: 2;
    margin: 10px;
    overflow: hidden;
}
.upperContainer{
    display: flex;
    flex-direction: row;
}

.lowerContainer{
    display:flex;
}
.AllpicturesContainer{
    width: auto;
    display: flex;
    transition: 500ms ease;
}
.slide-img{
    width: 65vw;
    flex-shrink: 0;
    position: relative;
}

@media screen and (max-width: 900px) {
    .lowerContainer, .upperContainer{
    flex-direction: column;
}
.cauroselContainer, .slide-img{
    width: 100%;
}
.cauroselContainer{
    margin: 0px;
}
.ContentContainer, .MessageContainer{
    flex: 0;
}
}
@media screen and (min-width: 1200px) {
.cauroselContainer, .slide-img{
    width: 800px;
}
}

.left-nav, .right-nav{
    font-size: 30px;
    position: absolute;
    height: 100%;
    width: 50px;
    z-index: 10;
}
.right-nav{
    right: 0px;
}
.right-nav:hover{
    background: linear-gradient(to left,rgba(51,51,51,0.5),rgba(51,51,51,0));
    z-index: 5;
}
.left-nav:hover{
    background: linear-gradient(to right,rgba(51,51,51,0.5),rgba(51,51,51,0));
    z-index: 5;
}
.chooserContainer{
    position: absolute;
    bottom: 7px;
    width: 100%;
}
.chooserinner{
    width:50px;
    margin: 0px auto;
    display: flex;
}
.dot{
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: black;
    flex-shrink: 0;
    margin: 0px 5px;
    z-index: 10;
}
.dotActive{
    background: red;
}

.left-arrow{
    border-right: 2px solid black;
    border-top: 2px solid black;
    transform: rotate(-135deg);
    width: 24px;
    height: 24px;
    margin: 0px 15px;
    position: absolute;
    top: calc(50% - 12px);
}
.left-nav:hover .left-arrow{
    border-right: 2px solid red;
    border-top: 2px solid red;
}

.right-arrow{
    border-right: 2px solid black;
    border-top: 2px solid black;
    transform: rotate(45deg);
    width: 24px;
    height: 24px;
    margin: 0px 15px;
    position: absolute;
    top: calc(50% - 12px);
}
.right-nav:hover .right-arrow{
    border-right: 2px solid red;
    border-top: 2px solid red;
}
.caur-img{
    width: 100%;
    height: 100%;
}
.newsActive .hover-caption{
    display: block;
    animation: abc 3.5s forwards;
    animation-delay: 1.5s;
}
.hover-caption{
    transition: 1s ease-in-out;
    width: 100%;
    position: absolute;
    background: rgba(1,1,1,0.6);
    bottom: 0;
    color: white;
    font-size: 20px;
    padding: 7px;
    opacity: 0;
}
@keyframes abc{
    0%{
        opacity: 1;
        bottom: -100%;
    }
    10%{
        opacity: 1;
        bottom: 0;
    }
    90%{
        opacity: 1;
        bottom: 0;
    }
    100%{
        opacity: 1;
        bottom: -100%;
    }
}
.newsTitleBox, .projectTitleBox{
    width:100%;
    height: auto;
    padding: 5px 10px;
    font-size: 24px;
    border-top: 5px solid #395058;
    color: white;
    background: #395058;
    box-shadow: 0px 3px 3px rgba(1,1,1,0.3);
    flex-grow: 0;
    display: flex;

}

.newsBodyBox{
    overflow-y: auto;
    width: 100%;
    height: calc(100% - 44px);
    color: rgb(0, 82, 214);
    margin-top: 5px;
    padding:0px 10px;
    flex: 1;
}
.projectBodyBox{
    width: 100%;
    height: calc(100% - 44px);
    color: rgb(0, 82, 214);
    margin-top: 5px;
    min-height: 300px;
    padding:0px 10px;
    border-radius: 0px 0px 5px 5px;
}
.singlenews, .singleproject{
    margin: 0px 10px;
    text-decoration: none;
    display: block;
}
.singlenews:hover, .singleproject:hover{
    text-decoration: underline;
}
.newsli, .projectli{
    padding: 3px 0px;
    list-style-type: none;
}
.ProjectContainer, .newsContainer{
    border-radius: 0px 0px 5px 5px;
    border:1px solid #395058;
    
}
.newsicon{
    width: 20px;
    height: 20px;
    padding: 5px;
    color: white;
}
a{
  color:rgb(8, 132, 248) ;
  font-size:16px;
}
</style>
<div class="mainContainer">
    <div class="upperContainer">
        <div class="cauroselContainer">
            <div class="left-nav"><div class="left-arrow"></div></div>
            <div class="right-nav"><div class="right-arrow"></div></div>
            <div class="chooserContainer">
                <div class="chooserinner">
                </div>
            </div>
            <div class="AllpicturesContainer">
                    <div class="slide-img" >
                        <img class="caur-img" src="{{asset('img/slide-3.jpg')}}" alt="">
                        <div class="hover-caption">LICT Team</div>
                    </div>
                    <div class="slide-img" >
                        <img class="caur-img" src="{{asset('img/slide-2.jpg')}}" alt="">
                        <div class="hover-caption">LICT Team</div>
                    </div>
                    <div class="slide-img" >
                        <img class="caur-img" src="{{asset('img/slide-1.jpg')}}" alt="">
                        <div class="hover-caption">LICT Team</div>
                    </div>
            </div>
        </div>
        <div class="newsContainer">
        <div class="newsTitleBox"><img class="newsicon" src="{{asset('img/newsicon.svg')}}">Latest News</div>
            <div class="newsBodyBox">
                @foreach ($news as $snews)
                    <li class="newsli"><a href="news/{{$snews['id']}}" class="singlenews">{{$snews['newsTitle']}}</a></li>                    
                @endforeach
            </div>
        </div>
    </div>
    <div class="lowerContainer">
        <div class="ContentContainer" style="font-size:18px">
            <p><span >Laboratory for ICT Research and Development</span> is the laboratory established on 1st January,2017 at Institute of Engineering, Tribhuvan University, Nepal with the vision to have world class reserach on Information and Communication Technology.</p>
            <p>This research lab is mission to carry out the widely focused research and innovation on modern technologies like: </p>
            <ul>
                <li> New Network Technologies: NGN, Software Defined Network, IPv6</li>
                <li>Wireless Communications, WSN, IoT</li>
                <li>Cloud Computing and Virtualization, FOG computing, Big Data</li>
                <li>Machine Learning, Natuarl Language Processing, Image Processing & AI</li>
                <li>Software Engineering & Information Systems</li>
                <li>Research projects on any ICT related fields.</li>
            </ul>
            <div class="ProjectContainer">
                <div class="projectTitleBox">Latest Projects</div>
                <div class="projectBodyBox">
                    @foreach ($projects as $project)
                    <li class="projectli"><a href="project/{{$project['id']}}" class="singleproject">{{$project['title']}}</a></li>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="MessageContainer">
                <a class="twitter-timeline" href="https://twitter.com/lict_ioe?ref_src=twsrc%5Etfw">Tweets by lict_ioe</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
    </div>
</div>
<script>
    class caurosel{
        change(){
            if(this.active==(this.picutrecontainer.querySelectorAll('.slide-img').length-1)){
                    this.active=0;
                }
            else
                this.active++;
            this.render();
        }
        render(){
            var str="translateX(-"+(this.active)*this.cauroselcontainer.getBoundingClientRect().width+"px);"
            this.picutrecontainer.setAttribute("style","transform:"+str+";");
            var allpoints=this.pointscontainer.querySelectorAll('.dot');
            for(var i=0;i<allpoints.length;i++){
                if(i!=this.active){
                    if(allpoints[i].classList.contains('dotActive')){
                        allpoints[i].classList.remove("dotActive");
                    }
                }
                else{
                    if(!allpoints[i].classList.contains('dotActive')){
                        allpoints[i].classList+=" dotActive";
                    }
                }
            }
            var allimages=this.picutrecontainer.querySelectorAll('.slide-img');
            for(var i=0;i<allimages.length;i++){
                if(i!=this.active){
                    if(allimages[i].classList.contains('newsActive')){
                        allimages[i].classList.remove("newsActive");
                    }
                }
                else{
                    if(!allimages[i].classList.contains('newsActive')){
                        allimages[i].classList+=" newsActive";
                    }
                }
            }
            if(this.active==0)
                this.leftbutton.style.display="none";
            else
                this.leftbutton.style.display="block";
            if(this.active==(allpoints.length-1))
                this.rightbutton.style.display="none";
            else
                this.rightbutton.style.display="block";
        }
        constructor(cauroselcontainer,picturecontainer,pointscontainer,leftbutton,rightbutton){
            this.cauroselcontainer=cauroselcontainer;
            this.picutrecontainer=picturecontainer;
            this.pointscontainer=pointscontainer;
            this.leftbutton=leftbutton;
            this.rightbutton=rightbutton;
            this.active=0;
            var that=this;
            for(var i=0;i<this.picutrecontainer.querySelectorAll('.slide-img').length;i++){
                this.pointscontainer.innerHTML+="<div class=\"dot\" data-id="+i+"></div>";
            }
            var allpoints=this.pointscontainer.querySelectorAll('.dot');
            for(var i=0;i<allpoints.length;i++){
                allpoints[i].addEventListener("click",function(e){
                    that.active=e.target.getAttribute('data-id');
                    clearInterval(that.anim);
                    that.anim=setInterval(function(){that.change()}, 5000);
                    that.render();
                });
            }
            this.anim=setInterval(function(){that.change()}, 5000);
            window.addEventListener("resize",function(){
                that.render();
            });
            this.leftbutton.addEventListener("click",function(){
                that.active--;
                if(that.active<0)
                    that.active=0;
                clearInterval(that.anim);
                that.anim=setInterval(function(){that.change()}, 5000);
                that.render();
            });
            this.rightbutton.addEventListener("click",function(){
                that.active++;
                if(that.active>=that.picutrecontainer.querySelectorAll(".slide-img").length)
                    that.active=that.picutrecontainer.querySelectorAll(".slide-img").length-1;
                clearInterval(that.anim);
                that.anim=setInterval(function(){that.change()}, 5000);
                that.render();
            });
            this.render();
        }
    }
    new caurosel(document.querySelector(".cauroselContainer"),
    document.querySelector(".AllpicturesContainer"),
    document.querySelector(".chooserinner"),
    document.querySelector(".left-nav"),
    document.querySelector(".right-nav"));
</script>
@endsection

