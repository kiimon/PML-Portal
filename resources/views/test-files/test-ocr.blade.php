@extends('layouts.app')

@section('title','OCR Test')

@section('content')

<style>

.ocr-card{
width:650px;
max-width:95vw;
padding:40px;
background:rgba(0,0,0,.75);
border:1px solid #007eff;
border-radius:12px;
text-align:center;
box-shadow:0 0 30px rgba(0,126,255,.4);
}

.preview img{
max-width:100%;
border-radius:10px;
margin-top:20px;
}

.result{
margin-top:25px;
background:#111;
padding:20px;
border-radius:8px;
white-space:pre-line;
text-align:left;
font-family:monospace;
}

button{
margin-top:20px;
padding:12px 30px;
border:none;
border-radius:6px;
background:#007eff;
color:white;
cursor:pointer;
font-size:16px;
}

select,input{
margin-top:10px;
padding:10px;
border-radius:6px;
border:none;
}

</style>

<div class="ocr-card">

<h2>OCR Test (KYC Pipeline)</h2>

<form id="ocrForm">

@csrf

<br>

<label>ID Type</label>

<br>

<select name="id_type" id="idType" required>

<option value="">Select ID</option>

<option value="drivers_license">Driver's License</option>
<option value="passport">Passport</option>
<option value="national_id">PhilSys National ID</option>
<option value="umid">UMID</option>
<option value="postal_id">Postal ID</option>

</select>

<br><br>

<input type="file" name="image" id="imageInput" accept="image/*" required>

<br>

<button type="submit">Run OCR</button>

</form>

<div class="preview" id="preview"></div>

<div class="result" id="result"></div>

</div>

<script>

const input = document.getElementById("imageInput");
const preview = document.getElementById("preview");
const result = document.getElementById("result");
const form = document.getElementById("ocrForm");

/* preview image */

input.addEventListener("change",function(){

const file = this.files[0];

if(!file) return;

const img = new Image();

img.onload = function(){

preview.innerHTML = "";
preview.appendChild(img);

};

img.src = URL.createObjectURL(file);

});


/* submit OCR */

form.addEventListener("submit",function(e){

e.preventDefault();

const formData = new FormData(form);

result.innerHTML = "Processing OCR...";

fetch("/ocr-scan",{

method:"POST",
body:formData,
headers:{
'X-CSRF-TOKEN':'{{ csrf_token() }}'
}

})
.then(async res => {

const text = await res.text();

try{
return JSON.parse(text);
}catch{
throw text;
}

})
.then(data=>{

let output = "";

if(data.parsed){

output += "Name: " + (data.parsed.name ?? "Not found") + "\n";
output += "Birthdate: " + (data.parsed.birthdate ?? "Not found") + "\n";
output += "Age: " + (data.parsed.age ?? "Not found") + "\n";
output += "Address: " + (data.parsed.address ?? "Not found") + "\n\n";

}

output += "----- RAW OCR -----\n\n";
output += data.raw_text;

result.innerHTML = output;

})
.catch(err=>{

console.error(err);

result.innerHTML = "OCR Error";

});

});

</script>

@endsection