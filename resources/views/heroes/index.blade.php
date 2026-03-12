@extends('layouts.app')

@section('title','Heroes')

@section('content')

<div class="h-full w-full overflow-y-auto px-10 py-10">

<div class="max-w-6xl mx-auto">

<div class="flex justify-between mb-6">

<h1 class="text-2xl font-bold">
Heroes
</h1>

<button onclick="openAddModal()"
class="bg-blue-600 text-white px-4 py-2 rounded">
Add Hero
</button>

</div>

@if($heroes->count()==0)

<div class="text-center text-gray-400 py-20">
No heroes yet.
</div>

@endif

<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6 pb-20">

@foreach($heroes as $hero)

<div class="bg-white shadow rounded p-4 text-center">

<img src="{{ $hero->icon_url }}" class="mx-auto mb-2">

<h2 class="font-bold">
{{ $hero->name }}
</h2>

<img src="{{ $hero->portrait_url }}" class="mt-2 rounded">

<button
onclick="openEditModal({{ $hero->id }},'{{ $hero->name }}','{{ $hero->icon_url }}','{{ $hero->portrait_url }}')"
class="mt-3 bg-yellow-500 text-white px-3 py-1 rounded">

Edit

</button>

</div>

@endforeach

</div>

</div>

</div>

@include('heroes.modal')


<script>
    function openAddModal(){
    document.getElementById('heroModal').classList.remove('hidden');
    document.getElementById('heroModal').classList.add('flex');
}

function closeModal(){
    document.getElementById('heroModal').classList.add('hidden');
    document.getElementById('heroModal').classList.remove('flex');
}

</script>
@endsection