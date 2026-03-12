@extends('layouts.app')

@section('title','PML Team Registration')

@section('content')

<div class="flex items-center justify-center h-[80vh]">

<div class="w-full max-w-2xl">

<h1 class="text-center text-4xl font-bold text-white mb-8">
PML Team Registration
</h1>

<form method="POST" action="/register-team/store-team" enctype="multipart/form-data">

@csrf


<!-- STEP 1 -->

<div id="step1" class="accent-border accent-shadow step-card backdrop-blur-md rounded-2xl shadow-xl p-8 space-y-6">

<h3 class="text-2xl text-white-800">
Step 1: Team Information
</h3>

<div class="space-y-4">

<div>
<label class="block text-white-700 mb-1">Team Name</label>
<input type="text" name="team_name"
class="w-full accent-border accent-shadow rounded-lg px-3 py-2"
required>
</div>

<div>
<label class="block text-white-700 mb-1">Team Logo (PNG only)</label>
<input type="file" name="team_logo" accept="image/png" required>
</div>

<div>
<label class="block text-white-700 mb-1">Barangay Represented</label>

<select name="barangay" class="w-full accent-border accent-shadow rounded-lg px-3 py-2" required>

<option value="">Select Barangay</option>

<option value="Abas">Abas</option>
<option value="Abucay">Abucay</option>
<option value="Bantayan">Bantayan</option>
<option value="Banuyo">Banuyo</option>
<option value="Bayasong">Bayasong</option>
<option value="Bayawas">Bayawas</option>
<option value="Binanuahan">Binanuahan</option>
<option value="Cabiguan">Cabiguan</option>
<option value="Cagdongon">Cagdongon</option>
<option value="Calongay">Calongay</option>
<option value="Calpi">Calpi</option>
<option value="Catamlangan">Catamlangan</option>
<option value="Comapo-capo">Comapo-capo</option>
<option value="Danlog">Danlog</option>
<option value="Dao">Dao</option>
<option value="Dapdap">Dapdap</option>
<option value="Del Rosario">Del Rosario</option>
<option value="Esmerada">Esmerada</option>
<option value="Esperanza">Esperanza</option>
<option value="Ginablan">Ginablan</option>
<option value="Guiron">Guiron</option>
<option value="Inang">Inang</option>
<option value="Inapugan">Inapugan</option>
<option value="Leona">Leona</option>
<option value="Lipason">Lipason</option>
<option value="Lourdes">Lourdes</option>
<option value="Lubiano">Lubiano</option>
<option value="Lumbang">Lumbang</option>
<option value="Lungib">Lungib</option>
<option value="Mabanate">Mabanate</option>
<option value="Malbog">Malbog</option>
<option value="Marifosque">Marifosque</option>
<option value="Mercedes">Mercedes</option>
<option value="Migabod">Migabod</option>
<option value="Naspi">Naspi</option>
<option value="Palanas">Palanas</option>
<option value="Pangpang">Pangpang</option>
<option value="Pinagsalog">Pinagsalog</option>
<option value="Pineda">Pineda</option>
<option value="Poctol">Poctol</option>
<option value="Pudo">Pudo</option>
<option value="Putiao">Putiao</option>
<option value="Sacnangan">Sacnangan</option>
<option value="Salvacion">Salvacion</option>
<option value="San Antonio (Millabas)">San Antonio (Millabas)</option>
<option value="San Antonio (Sapa)">San Antonio (Sapa)</option>
<option value="San Jose">San Jose</option>
<option value="San Rafael">San Rafael</option>
<option value="Santa Fe">Santa Fe</option>

</select>

</div>

</div>

<div class="flex justify-end pt-4">

<button type="button" class="neon-btn" style="width:100px; height:50px;"
onclick="nextStep(2)">

<span class="span"></span>
<span class="txt">NEXT</span>

</button>

</div>

</div>



<!-- STEP 2 -->

<div id="step2"
class="step-card hidden accent-border accent-shadow backdrop-blur-md rounded-2xl shadow-xl p-8 space-y-6">

<h3 class="text-2xl text-white-800">
Step 2: Captain Registration
</h3>

<div class="space-y-4">

<div>
<label class="block text-white-700 mb-1">Name</label>
<input type="text" id="captain_name" name="captain_name"
class="w-full accent-border accent-shadow rounded-lg px-3 py-2"
placeholder="Enter full name" required>
</div>

<div>
<label class="block text-white-700 mb-1">Address</label>
<input type="text" id="captain_address" name="captain_address"
class="w-full accent-border accent-shadow rounded-lg px-3 py-2"
placeholder="Enter full address" required>
</div>

<div>
<label class="block text-white-700 mb-1">Birthday</label>
<input type="date" id="captain_birthday" name="captain_birthday"
class="w-full accent-border accent-shadow rounded-lg px-3 py-2 appearance-none"
required>
</div>

<div>
<label class="block text-white-700 mb-1">Age</label>
<input type="number" id="captain_age" name="captain_age"
class="w-full accent-border accent-shadow rounded-lg px-3 py-2"
placeholder="Enter age" required>
</div>

</div>

<div class="flex justify-between pt-4">

<button type="button" class="neon-btn" style="width:100px; height:50px;"
onclick="prevStep(1)">
<span class="span"></span>
<span class="txt">BACK</span>
</button>

<button type="button" class="neon-btn" style="width:100px; height:50px;"
onclick="nextStep(3)">
<span class="span"></span>
<span class="txt">NEXT</span>
</button>

</div>

</div>



<!-- STEP 3 -->

<div id="step3"
class="step-card hidden accent-border accent-shadow backdrop-blur-md rounded-2xl shadow-xl p-8 space-y-6">

<h3 class="text-2xl text-white-800">
Step 3: Captain MLBB Info
</h3>

<div class="space-y-4">

<div>
<label class="block text-white-700 mb-1">ML ID</label>
<input type="text" id="ml_id" name="ml_id"
class="w-full accent-border accent-shadow rounded-lg px-3 py-2"
placeholder="Enter ML ID" required>
</div>

<div>
<label class="block text-white-700 mb-1">Server</label>
<input type="text" id="server" name="server"
class="w-full accent-border accent-shadow rounded-lg px-3 py-2"
placeholder="Enter Server" required>
</div>

<div>
<label class="block text-white-700 mb-1">ML Username</label>
<input type="text" id="ml_username" name="ml_username"
class="w-full accent-border accent-shadow rounded-lg px-3 py-2"
placeholder="Enter ML Username" required>
</div>

<div>
<label class="block text-white-700 mb-1">Role</label>
<div class="flex justify-center space-x-4">
    <label class="flex flex-col items-center cursor-pointer p-2 rounded-lg hover:bg-gray-700 transition-colors peer-checked:bg-blue-600">
        <input type="radio" name="role" value="EXP" class="hidden peer" required>
        <img src="/assets/svg/Exp.svg" alt="EXP" class="w-12 h-12 mb-1 opacity-50 peer-checked:opacity-100 transition-opacity">
        <span class="text-white text-sm">EXP</span>
    </label>
    <label class="flex flex-col items-center cursor-pointer p-2 rounded-lg hover:bg-gray-700 transition-colors peer-checked:bg-blue-600">
        <input type="radio" name="role" value="Jungle" class="hidden peer" required>
        <img src="/assets/svg/Jungle.svg" alt="Jungle" class="w-12 h-12 mb-1 opacity-50 peer-checked:opacity-100 transition-opacity">
        <span class="text-white text-sm">Jungle</span>
    </label>
    <label class="flex flex-col items-center cursor-pointer p-2 rounded-lg hover:bg-gray-700 transition-colors peer-checked:bg-blue-600">
        <input type="radio" name="role" value="Mid" class="hidden peer" required>
        <img src="/assets/svg/Mid.svg" alt="Mid" class="w-12 h-12 mb-1 opacity-50 peer-checked:opacity-100 transition-opacity">
        <span class="text-white text-sm">Mid</span>
    </label>
    <label class="flex flex-col items-center cursor-pointer p-2 rounded-lg hover:bg-gray-700 transition-colors peer-checked:bg-blue-600">
        <input type="radio" name="role" value="Gold" class="hidden peer" required>
        <img src="/assets/svg/Gold.svg" alt="Gold" class="w-12 h-12 mb-1 opacity-50 peer-checked:opacity-100 transition-opacity">
        <span class="text-white text-sm">Gold</span>
    </label>
    <label class="flex flex-col items-center cursor-pointer p-2 rounded-lg hover:bg-gray-700 transition-colors peer-checked:bg-blue-600">
        <input type="radio" name="role" value="Roam" class="hidden peer" required>
        <img src="/assets/svg/Roam.svg" alt="Roam" class="w-12 h-12 mb-1 opacity-50 peer-checked:opacity-100 transition-opacity">
        <span class="text-white text-sm">Roam</span>
    </label>
</div>
</div>

</div>

<div class="flex justify-between pt-4">

<button type="button" class="neon-btn" style="width:100px; height:50px;"
onclick="prevStep(2)">
<span class="span"></span>
<span class="txt">BACK</span>
</button>

<button type="button" class="neon-btn" style="width:100px; height:50px;"
onclick="nextStep(4)">
<span class="span"></span>
<span class="txt">NEXT</span>
</button>

</div>

</div>



<!-- STEP 4 -->

<div id="step4"
class="step-card hidden accent-border accent-shadow backdrop-blur-md rounded-2xl shadow-xl p-8 space-y-6">

<h3 class="text-2xl text-white-800">
Step 4: ID Capture
</h3>

<div class="space-y-4">

<div>
<label class="block text-white-700 mb-1">Upload ID (Picture)</label>

<input type="file"
id="captain_id_image"
name="captain_id_image"
accept="image/*"
capture="environment"
class="w-full accent-border accent-shadow rounded-lg px-3 py-2"
required>

<input type="hidden" id="resized_image_data">
</div>

</div>

<div class="flex justify-between pt-4">

<button type="button" class="neon-btn" style="width:100px; height:50px;"
onclick="prevStep(3)">
<span class="span"></span>
<span class="txt">BACK</span>
</button>

<button type="button" class="neon-btn" style="width:100px; height:50px;"
onclick="nextStep(5)">
<span class="span"></span>
<span class="txt">NEXT</span>
</button>

</div>

</div>



<!-- STEP 5 -->

<div id="step5"
class="step-card hidden accent-border accent-shadow backdrop-blur-md rounded-2xl shadow-xl p-8 space-y-6">

<h3 class="text-2xl text-white-800">
Step 5: Selfie Capture
</h3>

<div class="space-y-4">

<div>
<label class="block text-white-700 mb-1">Take Selfie</label>

<input type="file"
id="captain_selfie"
name="captain_selfie"
accept="image/*"
capture="user"
class="w-full accent-border accent-shadow rounded-lg px-3 py-2"
required>

<input type="hidden" id="resized_selfie_data">
</div>

</div>

<div class="flex justify-between pt-4">

<button type="button" class="neon-btn" style="width:100px; height:50px;"
onclick="prevStep(4)">
<span class="span"></span>
<span class="txt">BACK</span>
</button>

<button type="button" class="neon-btn" style="width:150px; height:50px;"
onclick="showConfirmation()">
<span class="span"></span>
<span class="txt">SAVE</span>
</button>

</div>

</div>


</form>

</div>

</div>



<!-- CONFIRMATION MODAL -->

<div id="confirmModal" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50 p-4">

<div class="bg-gray-900 rounded-xl p-6 w-full max-w-md accent-border accent-shadow text-white relative">

<h2 class="text-2xl font-bold mb-4 text-center">
Confirm Registration
</h2>

<div class="space-y-3 text-sm max-h-[60vh] overflow-y-auto pr-2">

<div><span class="text-gray-400">Team Name:</span> <span id="conf_team" class="font-semibold block break-words"></span></div>

<div><span class="text-gray-400">Barangay:</span> <span id="conf_brgy" class="font-semibold block break-words"></span></div>

<hr class="border-gray-700 my-2">

<div><span class="text-gray-400">Captain Name:</span> <span id="conf_name" class="font-semibold block break-words"></span></div>

<div><span class="text-gray-400">Address:</span> <span id="conf_address" class="font-semibold block break-words"></span></div>

<div><span class="text-gray-400">Birthday:</span> <span id="conf_birth" class="font-semibold block"></span></div>

<div><span class="text-gray-400">Age:</span> <span id="conf_age" class="font-semibold block"></span></div>

<hr class="border-gray-700 my-2">

<div><span class="text-gray-400">ML ID:</span> <span id="conf_mlid" class="font-semibold block"></span></div>

<div><span class="text-gray-400">Server:</span> <span id="conf_server" class="font-semibold block"></span></div>

<div><span class="text-gray-400">ML Username:</span> <span id="conf_mluser" class="font-semibold block break-words"></span></div>

<div><span class="text-gray-400">Role:</span> <span id="conf_role" class="font-semibold block"></span></div>

</div>

<div class="flex gap-4 mt-8">

<button type="button"
onclick="closeConfirm()"
class="flex-1 py-3 rounded-lg border border-gray-600 font-semibold hover:bg-gray-800 transition">
Go Back
</button>

<button type="button"
onclick="submitForm()"
class="flex-1 py-3 rounded-lg accent-button font-bold text-white transition">
Confirm & Submit
</button>

</div>

</div>

</div>



<script>

/* STEP NAVIGATION */

function nextStep(step){
for(let i=1;i<=5;i++){
document.getElementById('step'+i).classList.add('hidden');
}
document.getElementById('step'+step).classList.remove('hidden');
}

function prevStep(step){
for(let i=1;i<=5;i++){
document.getElementById('step'+i).classList.add('hidden');
}
document.getElementById('step'+step).classList.remove('hidden');
}


/* CONFIRMATION */

function showConfirmation(){

document.getElementById('conf_team').innerText =
document.querySelector('input[name="team_name"]').value || "-";

document.getElementById('conf_brgy').innerText =
document.querySelector('select[name="barangay"]').value || "-";

document.getElementById('conf_name').innerText =
document.getElementById('captain_name').value || "-";

document.getElementById('conf_address').innerText =
document.getElementById('captain_address').value || "-";

document.getElementById('conf_birth').innerText =
document.getElementById('captain_birthday').value || "-";

document.getElementById('conf_age').innerText =
document.getElementById('captain_age').value || "-";

document.getElementById('conf_mlid').innerText =
document.getElementById('ml_id').value || "-";

document.getElementById('conf_server').innerText =
document.getElementById('server').value || "-";

document.getElementById('conf_mluser').innerText =
document.getElementById('ml_username').value || "-";

document.getElementById('conf_role').innerText =
document.querySelector('input[name="role"]:checked')?.value || "-";

document.getElementById('confirmModal').classList.remove('hidden');
document.getElementById('confirmModal').classList.add('flex');

}

function closeConfirm(){
document.getElementById('confirmModal').classList.remove('flex');
document.getElementById('confirmModal').classList.add('hidden');
}

function submitForm(){
document.querySelector('form').submit();
}

document.getElementById('captain_id_image').addEventListener('change', function(e){

    const file = e.target.files[0];

    if(!file) return;

    const reader = new FileReader();

    reader.onload = function(event){

        const img = new Image();

        img.onload = function(){

            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');

            const MAX_WIDTH = 1600;

            let width = img.width;
            let height = img.height;

            if(width > MAX_WIDTH){
                height = height * (MAX_WIDTH / width);
                width = MAX_WIDTH;
            }

            canvas.width = width;
            canvas.height = height;

            ctx.drawImage(img, 0, 0, width, height);

            canvas.toBlob(function(blob){

                const newFile = new File([blob], file.name, {
                    type: 'image/jpeg',
                    lastModified: Date.now()
                });

                const container = new DataTransfer();
                container.items.add(newFile);

                document.getElementById('captain_id_image').files = container.files;

            }, 'image/jpeg', 0.8);

        };

        img.src = event.target.result;

    };

    reader.readAsDataURL(file);

});

document.getElementById('captain_selfie').addEventListener('change', function(e){

    const file = e.target.files[0];

    if(!file) return;

    const reader = new FileReader();

    reader.onload = function(event){

        const img = new Image();

        img.onload = function(){

            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');

            const MAX_WIDTH = 1600;

            let width = img.width;
            let height = img.height;

            if(width > MAX_WIDTH){
                height = height * (MAX_WIDTH / width);
                width = MAX_WIDTH;
            }

            canvas.width = width;
            canvas.height = height;

            ctx.drawImage(img, 0, 0, width, height);

            canvas.toBlob(function(blob){

                const newFile = new File([blob], file.name, {
                    type: 'image/jpeg',
                    lastModified: Date.now()
                });

                const container = new DataTransfer();
                container.items.add(newFile);

                document.getElementById('captain_selfie').files = container.files;

            }, 'image/jpeg', 0.8);

        };

        img.src = event.target.result;

    };

    reader.readAsDataURL(file);

});

</script>

@endsection