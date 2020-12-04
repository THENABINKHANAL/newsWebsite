@extends('layout.initlayout')
@section('content')
<style>
    .projviewcontainer{
        max-width: 900px;
        margin: 0 auto;
        padding: 15px;
    }
    .singlerow{
        width: 100%;
    }
    .title{
        font-size: 25px;
        margin: 15px auto;
        text-align: center;
    }
    .allContent{
        width: 100%;
        margin: 10px 0px;
    }
    .datafiles{
        width: 100%;
    }
    .filesLabel, .Researcherslabel{
        font-size: 15px;
        margin: 5px 0px 0px 0px;
    }
    .nobullet{
        list-style-type: upper-roman;
        padding-left: 5px;
    }
</style>
@if($showEdit)
    <div style="margin: 0 auto; display:flex; justify-content:center; align-items: center;">Press here to edit details.<button onclick="location.href='../project/edit/{{$id}}'">Edit</button></div>
@endif
<div class="projviewcontainer">
    <div class="allContent">{!!$projectData!!}</div>
    @if(count($files)>0)
    <div class="filesLabel">Files:</div>
    <ul>
        @foreach ($files as $file)
            <li class="nobullet"><a class="datafiles" href={{$file['location']}}>{{$file['name']}}</a></li>
        @endforeach
    </ul>
    @endif
    @if(count($researchers)>0)
    <div class="Researcherslabel">Researchers:</div>
    <ul>
        @foreach ($researchers as $researcher)
        <li class="nobullet"><a class="datafiles" href="../../user/{{$researcher['id']}}">{{$researcher['FirstName']}} {{$researcher['MiddleName']}} {{$researcher['LastName']}}</a></li>
        @endforeach
    </ul>
    @endif
</div>
@endsection

