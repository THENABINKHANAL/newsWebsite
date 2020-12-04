@extends('layout.initlayout')

@section('content')
<link rel="stylesheet" type="text/css" media="screen" href={{ asset('css/news.css') }} />



<div class="page-title">
    <p>News</p>
</div>



<div class="news-page-content">
<!-- Top news -->

    <a class="top-article" href="news/{{$news[0]['id']}}">


        <div class="top-bar">

        </div>
        <div class="image-box"><div>
            <img src={{$news[0]['img']}}></div>
        </div>

        <div class="news-box">
            <p>
                    {{array_shift($news)['title']}}
            </p>
        </div>

    </a>





















<!-- News article and links -->

<div style="text-align:left; padding:5px; margin-left:10%;border:none;
box-shadow:none; margin-top:20px; border-top:1px solid black;" class="page-title">
    <h1>Articles</h1>
</div>

    <div class="articles">
        @foreach ($news as $snews)
        
        <a class="ind-article" href="../news/{{$snews['id']}}">
            <div class="top-bar">

            </div>

        <div class="image-box"><div>
                <img src={{$snews['img']}}></div>
            </div>

            <div class="news-box">
                <p>
                    {{$snews['title']}}
                </p>
            </div>
        </a>
        @endforeach

    </div>


</div>
    
@endsection
