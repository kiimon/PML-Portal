@extends('layouts.app')

@section('title','MLBB Tournament')

@section('content')

<style>

/* HERO IMAGES */

.hero-side{

position:fixed;
top:0;

height:100vh;

pointer-events:none;

z-index:5;

filter:
drop-shadow(0 0 20px rgba(0,200,255,.6))
drop-shadow(0 0 40px rgba(0,126,255,.3));

}

/* LEFT HERO */

.hero-left{

left:0;

animation:heroLeft 1.2s ease-out;

}

/* RIGHT HERO */

.hero-right{

right:0;

animation:heroRight 1.2s ease-out;

}

@keyframes heroLeft{

from{
transform:translateX(-100%);
opacity:0;
}

to{
transform:translateX(0);
opacity:1;
}

}

@keyframes heroRight{

from{
transform:translateX(100%);
opacity:0;
}

to{
transform:translateX(0);
opacity:1;
}

}

/* CENTER CONTENT */

.home-wrapper{

text-align:center;
display:flex;
flex-direction:column;
align-items:center;

}

/* LOGO */

.logo{

width:440px;
max-width:85vw;

margin-bottom:30px;

filter:
drop-shadow(0 0 10px #007eff)
drop-shadow(0 0 20px #007eff);

animation:logoPulse 3s ease-in-out infinite;

}

@keyframes logoPulse{

0%{filter:drop-shadow(0 0 10px #007eff)}
50%{filter:drop-shadow(0 0 30px #00cfff)}
100%{filter:drop-shadow(0 0 10px #007eff)}

}

/* SUBTITLE */

.subtitle{

color:#94a3b8;
letter-spacing:2px;

margin-bottom:60px;

}

/* BUTTON GROUP */

.home-buttons{

display:flex;
flex-direction:column;
gap:35px;

}

/* MOBILE */

@media(max-width:900px){

.hero-side{
display:none !important;
}

.logo{
width:280px;
}

}

</style>


<!-- HEROES -->

<img src="{{ asset('assets/images/left.png') }}" class="hero-side hero-left">

<img src="{{ asset('assets/images/right.png') }}" class="hero-side hero-right">


<div class="home-wrapper">

<img src="{{ asset('assets/images/logo-text.png') }}" class="logo">

<p class="subtitle">
OFFICIAL MLBB TOURNAMENT REGISTRATION
</p>


<div class="neon-group home-buttons">

<button class="neon-btn"
onclick="window.location.href='/register-team'">

<span class="span"></span>

<span class="txt">
REGISTER TEAM
</span>

</button>


<button class="neon-btn"
onclick="window.location.href='/register-member'">

<span class="span"></span>

<span class="txt">
REGISTER MEMBER
</span>

</button>

</div>

</div>
@endsection