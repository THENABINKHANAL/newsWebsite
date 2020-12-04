@extends('layout.initlayout')

@section('content')
<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/message.css') }}"/>


<div class="page-title">
<p>Message from {{$name}}</p>
</div>
    
<div class="message-content">
    <div class="person-img">
        @if($data['imgloc']!="")
        @foreach ((json_decode($data['imgloc'])) as $img)
    <img src="{{ asset('img') }}/{{$img}}">
        @endforeach
        @endif


        <div class="person-info">
            <h2>{{ $data['Name'] }}</h2>
            <h3>{{ $data['Post'] }}</h3>
        </div>
    </div>

    <div class="message-text">
        @foreach (json_decode($data['text']) as $item)
        <p>{{$item}}</p>
        @endforeach
    </div>
</div>

@endsection