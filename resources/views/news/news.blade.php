@extends('layout.initlayout')

@section('content')
<style>
.allContent{
    margin: 0 auto;
    max-width: 900px;
    padding: 15px;
}
</style>
@if(Auth::guard('admin')->check())
<div style="margin: 0 auto; display:flex; justify-content:center; align-items: center;">Press here to edit details.<button onclick="location.href='../news/edit/{{$id}}'">Edit</button></div>
@endif
<div class="allContent">{!!$newsDetails!!}</div>
    
@endsection
