@extends('layout.initlayout')

@section('content')
<link rel="stylesheet" href="{{('css/vacancy.css')}}">


<div class="whole">
    <div class="vacancies">
        @if(count($vacancies)==0)
        <h4>No vacancies right now!</h4>
        @else
        <h4>Current Vacancies</h4>
        @foreach ($vacancies as $vacancy)
            
        <div class="ind-vacancy">
            <div class="title">
                <h1>{{$vacancy['Title']}}</h1>
            </div>
            <div class="responsibility">
                <h3>Responsibilities</h3>
                <ol>
                    @foreach (json_decode($vacancy['Responsibilities']) as $responsibility)
                <li>{{$responsibility}}</li>                        
                    @endforeach
                </ol>
            </div>

            <div class="requirement">
                <h3>Requirements</h3>
                <ol>
                    @foreach (json_decode($vacancy['Requirements']) as $requirement)
                    <li>{{$requirement}}</li>
                        
                    @endforeach

                </ol>
            </div>

            <button type="button" onclick="somefunc('{{$vacancy['Title']}}')">Apply</button>
        </div>


        @endforeach
        @endif
    </div>
</div>



<!--Apply to the vacancy modal-->

<!--  Start      -->          
  <div id="id02" class="modal" style="z-index:201;">
  @csrf
    <div class="modal-content animate">
        <input type="hidden" name="Title" id="vacancyID"/>
      <div class="imgcontainer">
        <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>
  
      <div class="container">
        <h3 id="vacancyTitle"></h3>
        <div class="elem">
            <label for="uname"><b>Full Name</b></label>
            <input class="inputText" id="applicantName" type="text">
        </div>

        <div class="elem">
            <label for="psw"><b>Email</b></label>
            <input class="inputText" id="applicantEmail" type="text">
        </div>

        <div class="elem">
            <label for="psw"><b>Contact no.</b></label>
            <input class="inputText" id="applicantContact" type="text">
        </div>
        <h4 style="text-align:left">Upload CV:</h4>
          <input type="file" value="cv" id="applicantCV" accept="file/pdf,file/docx">
          <h4 id="vacancySave"></h4>
        <button type="submit" id="applicationSubmit">Submit</button>
        <br>
        
      </div>

      
    </div>
  </div>

  <!--   End    -->



<script src="{{asset('js/vacancy.js')}}"></script>
@endsection