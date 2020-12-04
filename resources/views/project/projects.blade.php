@extends('layout.initlayout')
@section('content')
<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/projects.css') }}"/>

<div class="page-title">
        <p>Projects</p>
    </div>


    <div class="project-page-content">
    <div class="projects">
        @foreach ($projects as $project)
            
       
    <div class="ind-project">

        

        <div class="top-bar">

        </div>
         <div class="project-content" style="display:flex;flex-direction:column;height:100%;">
            <div class="project-title">
                <a href="project/{{$project['id']}}">{{$project['title']}}</a>
            </div>
            <div class="description" style="flex-grow:1;">
                <p>
                        {{$project['projectSummary']}}
                </p>
            </div>
        

        <div class="people-involved">
            @foreach ($project['researchers'] as $researcher)
            <a href="../user/{{$researcher['id']}}" >
                <img src="{{ asset($researcher['imgLoc']) }}">
            </a>
            @endforeach
        </div>
    </div>

    </div>
    @endforeach


</div>

</div>
@endsection

