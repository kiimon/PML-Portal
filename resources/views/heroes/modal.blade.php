<div id="heroModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center">

<div class="bg-white p-6 rounded w-96">

<form id="heroForm" method="POST">

@csrf

<input type="hidden" id="method" name="_method">

<div class="mb-3">
<label>Name</label>
<input name="name" id="heroName" class="w-full border p-2">
</div>

<div class="mb-3">
<label>Icon URL</label>
<input name="icon_url" id="heroIcon" class="w-full border p-2">
</div>

<div class="mb-3">
<label>Portrait URL</label>
<input name="portrait_url" id="heroPortrait" class="w-full border p-2">
</div>

<div class="flex justify-end gap-3">

<button type="button" onclick="closeModal()">
Cancel
</button>

<button class="bg-blue-600 text-white px-4 py-2 rounded">
Save
</button>

</div>

</form>

</div>

</div>


<script>

function openAddModal(){

document.getElementById('heroModal').classList.remove('hidden')

document.getElementById('heroForm').action="/heroes"

document.getElementById('method').value=""

}

function openEditModal(id,name,icon,portrait){

document.getElementById('heroModal').classList.remove('hidden')

document.getElementById('heroForm').action="/heroes/"+id

document.getElementById('method').value="PUT"

document.getElementById('heroName').value=name
document.getElementById('heroIcon').value=icon
document.getElementById('heroPortrait').value=portrait

}

function closeModal(){

document.getElementById('heroModal').classList.add('hidden')

}

</script>