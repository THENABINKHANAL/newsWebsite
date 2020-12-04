@extends('layout.initlayout')

@section('content')
<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/lict_team.css')}}" />

<div class="page-title">
        <p>LICT Research Team</p>
    </div>

<div class="lict-team-content">
    
    <h1>Advisors</h1>
    <div class="members">
        @foreach ($members as $member)
            
    <a class="team-member" href="user/{{$member['id']}}">
        <div class="top-bar"></div>
        <div id="memberinfo">
            <div class="name">
                    <div>{{$member['firstname']}} {{$member['middlename']}} {{$member['lastname']}}</div>
            </div>
            @if($member['imgLoc']=="")
            <img id="imgLoc" src="{{url('img/deafultuserimgblack.png')}}"/>
            @else
            <img id="imgLoc" src="{{$member['imgLoc']}}"/>
            @endif
            <p>{{$member['post']}}</p>
            <div style="height:20px;width:100%;overflow:hidden;">
            <canvas id="imagegetter" data-image="{{base64_encode($member['email'])}}"></canvas>
            </div>
            <p>{{$member['contactno']}}</p>
            @if($member['researchAreas']!="")
            <p>Research Areas: {{$member['researchAreas']}}</p>
            @endif
        </div>



    </a>
    @endforeach

    
</div>
<div class="lict-team-content">
    <h1>Core Research and Development Team</h1>
    <div class="members">
            @foreach ($coremembers as $member)
                
        <a class="team-member" href="user/{{$member['id']}}">
            <div class="top-bar"></div>
            <div id="memberinfo">
                <div class="name">
                        <div>{{$member['firstname']}} {{$member['middlename']}} {{$member['lastname']}}</div>
                </div>
                <p>LictTitle: {{$member['lictTitle']}}</p>
                @if($member['imgLoc']=="")
                <img id="imgLoc" src="{{url('img/deafultuserimgblack.png')}}"/>
                @else
                <img id="imgLoc" src="{{$member['imgLoc']}}"/>
                @endif
                <p>{{$member['post']}}</p>
                <div style="height:20px;width:100%;overflow:hidden;">
                <canvas id="imagegetter" data-image="{{base64_encode($member['email'])}}"></canvas>
                </div>
                <p>{{$member['contactno']}}</p>
                @if($member['researchAreas']!="")
                <p>Research Areas: {{$member['researchAreas']}}</p>
                @endif
            </div>
    
    
    
        </a>
        @endforeach
    
        
    </div>
    
</div>
<script>
    var Base64 = {

// private property
_keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

// public method for encoding
encode : function (input) {
    var output = "";
    var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
    var i = 0;

    input = Base64._utf8_encode(input);

    while (i < input.length) {

        chr1 = input.charCodeAt(i++);
        chr2 = input.charCodeAt(i++);
        chr3 = input.charCodeAt(i++);

        enc1 = chr1 >> 2;
        enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
        enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
        enc4 = chr3 & 63;

        if (isNaN(chr2)) {
            enc3 = enc4 = 64;
        } else if (isNaN(chr3)) {
            enc4 = 64;
        }

        output = output +
        this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
        this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

    }

    return output;
},

// public method for decoding
decode : function (input) {
    var output = "";
    var chr1, chr2, chr3;
    var enc1, enc2, enc3, enc4;
    var i = 0;

    input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

    while (i < input.length) {

        enc1 = this._keyStr.indexOf(input.charAt(i++));
        enc2 = this._keyStr.indexOf(input.charAt(i++));
        enc3 = this._keyStr.indexOf(input.charAt(i++));
        enc4 = this._keyStr.indexOf(input.charAt(i++));

        chr1 = (enc1 << 2) | (enc2 >> 4);
        chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
        chr3 = ((enc3 & 3) << 6) | enc4;

        output = output + String.fromCharCode(chr1);

        if (enc3 != 64) {
            output = output + String.fromCharCode(chr2);
        }
        if (enc4 != 64) {
            output = output + String.fromCharCode(chr3);
        }

    }

    output = Base64._utf8_decode(output);

    return output;

},

// private method for UTF-8 encoding
_utf8_encode : function (string) {
    string = string.replace(/\r\n/g,"\n");
    var utftext = "";

    for (var n = 0; n < string.length; n++) {

        var c = string.charCodeAt(n);

        if (c < 128) {
            utftext += String.fromCharCode(c);
        }
        else if((c > 127) && (c < 2048)) {
            utftext += String.fromCharCode((c >> 6) | 192);
            utftext += String.fromCharCode((c & 63) | 128);
        }
        else {
            utftext += String.fromCharCode((c >> 12) | 224);
            utftext += String.fromCharCode(((c >> 6) & 63) | 128);
            utftext += String.fromCharCode((c & 63) | 128);
        }

    }

    return utftext;
},

// private method for UTF-8 decoding
_utf8_decode : function (utftext) {
    var string = "";
    var i = 0;
    var c = c1 = c2 = 0;

    while ( i < utftext.length ) {

        c = utftext.charCodeAt(i);

        if (c < 128) {
            string += String.fromCharCode(c);
            i++;
        }
        else if((c > 191) && (c < 224)) {
            c2 = utftext.charCodeAt(i+1);
            string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
            i += 2;
        }
        else {
            c2 = utftext.charCodeAt(i+1);
            c3 = utftext.charCodeAt(i+2);
            string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
            i += 3;
        }

    }

    return string;
}

}

var allgetters=document.querySelectorAll("#imagegetter");
for(var i=0;i<allgetters.length;i++){
    var ctx = allgetters[i].getContext("2d");
    ctx.textAlign = "center"; 
    ctx.font = "15px Arial";
    var encrypted=allgetters[i].getAttribute("data-image");
    ctx.fillText(Base64.decode(encrypted),150,15);
}
</script>
@endsection