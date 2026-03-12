<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<title>@yield('title')</title>

<style>

/* GLOBAL */

html,body{
margin:0;
height:100%;
overflow:hidden;
font-family:"Segoe UI",Tahoma,Geneva,Verdana,sans-serif;
color:white;
}

/* DO NOT CHANGE BACKGROUND */

body{
background:url("/assets/images/bg-main.jpg") center/cover no-repeat fixed;
}

/* =========================
   GLOBAL ACCENT SYSTEM
========================= */

:root{
    --accent-color:#007eff;
}


/* Accent Border */

.accent-border{
    border:2px solid var(--accent-color);
}


/* Accent Shadow */

.accent-shadow{
    box-shadow:
        0 0 0 1px rgba(0,126,255,0.2),
        0 10px 30px rgba(0,126,255,0.25);
}

/* ===================================================== */
/* ESPORTS ELECTRIC GRID */
/* ===================================================== */

.esports-grid{

position:fixed;
inset:0;

pointer-events:none;
z-index:1;

background-image:
linear-gradient(rgba(0,126,255,.08) 1px, transparent 1px),
linear-gradient(90deg, rgba(0,126,255,.08) 1px, transparent 1px);

background-size:60px 60px;

}

/* GRID SPARK */

.grid-spark{

position:absolute;

width:6px;
height:6px;

background:#00cfff;

border-radius:50%;

box-shadow:
0 0 6px #00cfff,
0 0 12px #00cfff,
0 0 18px #00cfff;

animation:sparkPulse .6s ease;

}

@keyframes sparkPulse{

0%{
opacity:0;
transform:scale(.3);
}

50%{
opacity:1;
transform:scale(1.4);
}

100%{
opacity:0;
transform:scale(.3);
}

}

/* ===================================================== */
/* GLOBAL NEON BUTTON SYSTEM */
/* ===================================================== */

.neon-group{

display:grid;
gap:2em;
place-content:center;

}

/* BUTTON */

.neon-btn{

width:320px;
height:60px;

cursor:pointer;

display:flex;
justify-content:center;
align-items:center;

background:transparent;

position:relative;

overflow:hidden;

clip-path:polygon(
6% 0,
93% 0,
100% 8%,
100% 86%,
90% 89%,
88% 100%,
5% 100%,
0% 85%
);

}

/* INNER PANEL */

.neon-btn .span{

position:absolute;
inset:1px;

background:#212121;

clip-path:inherit;

z-index:1;

}

/* TEXT */

.neon-btn .txt{

position:relative;
z-index:2;

color:white;
font-size:1.1rem;

text-shadow:
0 0 4px #4090b5,
0 0 6px #9e30a9;

}

/* ROTATING ENERGY */

.neon-btn::before{

content:"";

position:absolute;

height:300px;
aspect-ratio:1.5;

background-image:
conic-gradient(#9e30a9, transparent, transparent, #9e30a9);

animation:rotate 4s linear infinite;

}

.neon-btn::after{

content:"";

position:absolute;

height:300px;
aspect-ratio:1.5;

background-image:
conic-gradient(#4090b5, transparent, transparent, #4090b5);

animation:rotate 4s linear infinite reverse;

}

@keyframes rotate{

from{transform:rotate(0)}
to{transform:rotate(360deg)}

}

/* ACTIVE */

.neon-input:checked + .neon-btn .span{

background:
repeating-linear-gradient(
to bottom,
transparent 0%,
#4090b5 2px,
transparent 6px
);

box-shadow:inset 0 40px 20px #09141c;

}

.neon-input:checked + .neon-btn .txt{

text-shadow:
2px 4px 1px #9e30a9,
2px 2px 1px #4090b5,
0 0 20px white;

}

/* MOBILE */

@media(max-width:900px){

.neon-btn{
width:90vw;
}

}

html.is-mobile .step-card {
    border: none !important;
    box-shadow: none !important;
    background: transparent !important;
    backdrop-filter: none !important;
    padding: 1rem 0 !important;
}

html.is-mobile .h-\\[80vh\\] {
    height: auto !important;
    min-height: 80vh !important;
    padding-top: 2rem !important;
    padding-bottom: 4rem !important;
}

html.is-mobile .page {
    align-items: flex-start;
    padding-top: 1rem;
    padding-left: 1.5rem;
    padding-right: 1.5rem;
    overflow: hidden;
    height: 100%;
}

html.is-mobile body {
    overflow: hidden;
}

/* PAGE CONTENT */

.page{

position:relative;
z-index:10;

height:100vh;

display:flex;
justify-content:center;
align-items:center;

overflow: hidden;

}

</style>

</head>


<body>

<div class="esports-grid" id="grid"></div>

<div class="page">

@yield('content')

</div>


<script>

/* ========================================== */
/* MOBILE DETECTION */
/* ========================================== */

window.isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

if(window.isMobile){
    document.documentElement.classList.add('is-mobile');
}

/* ========================================== */
/* ELECTRIC GRID ENGINE */
/* ========================================== */

const grid = document.getElementById("grid");

const cell = 60;

/* spawn spark */

function spawnSpark(){

const cols = Math.floor(window.innerWidth / cell);
const rows = Math.floor(window.innerHeight / cell);

const col = Math.floor(Math.random()*cols);
const row = Math.floor(Math.random()*rows);

const spark = document.createElement("div");

spark.className="grid-spark";

spark.style.left = col * cell + "px";
spark.style.top = row * cell + "px";

grid.appendChild(spark);

setTimeout(()=>spark.remove(),600);

}

/* maintain sparks */

function sparkLoop(){

const sparks = Math.floor(Math.random()*4)+5;

for(let i=0;i<sparks;i++){

setTimeout(spawnSpark,i*150);

}

setTimeout(sparkLoop,900);

}

sparkLoop();

</script>

</body>

</html>