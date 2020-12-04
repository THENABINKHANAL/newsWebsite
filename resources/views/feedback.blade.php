@extends('layout.initlayout')
@section('content')
<style>
.label{
    font-size: 20px;
    margin: 15px 0px 5px 0px;
}
.feedackContainer{
    max-width: 900px;
    margin: 0 auto;
}
.inputText{
    width: 100%;
    border: 1px solid rgba(0, 41, 109,0.2);
    border-radius: 5px;
    min-height:30px;
    margin: 0px 0px 15px 0px;
    padding-left: 15px;
}
.inputText:hover{
    border: 1px solid rgba(0, 41, 109,0.5);
}
.inputText:focus{
    border: 1px solid rgba(0, 41, 109,0.5);
    box-shadow: 0px 0px 5px rgba(0, 41, 109,0.5);
}
.submitButton{
    padding: 10px;
    color: white;
    margin:5px 0px;
    background: black;
    border-radius: 5px;
    outline: none;
    font-weight: 500;
    border: 0;
    font-size: 20px;
}

.txtarea{
    padding-top: 5px;
}
</style>
<form class="feedackContainer" method="POST" action="{{route('feedback.save')}}">
    @csrf
    <div class="label">Name:</div>
    <input class="inputText" name="name"/>
    <div class="label">Contact Detail:</div>
    <input class="inputText" name="detail"/>
    <div class="label">Message:</div>
    <textarea class="inputText txtarea" name="message" style="height:377px;"></textarea>
    <input type="submit" value="Submit" class="submitButton"/>
</form>

@endsection
