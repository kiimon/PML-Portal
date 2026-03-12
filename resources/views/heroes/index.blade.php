<x-app-layout>

<div class="max-w-6xl mx-auto py-10">

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

<div class="text-center text-gray-500 py-20">
No heroes yet.
</div>

@endif


<div class="grid grid-cols-6 gap-6">

@foreach($heroes as $hero)

<div class="bg-white shadow rounded p-4 text-center">

<img src="{{ $hero->icon_url }}" class="mx-auto mb-2">

<h2 class="font-bold">
{{ $hero->name }}
</h2>

<img src="{{ $hero->portrait_url }}" class="mt-2 rounded">

<button onclick="openEditModal({{ $hero->id }},'{{ $hero->name }}','{{ $hero->icon_url }}','{{ $hero->portrait_url }}')"
class="mt-3 bg-yellow-500 text-white px-3 py-1 rounded">

Edit

</button>

</div>

@endforeach

</div>

</div>

@include('heroes.modal')

</x-app-layout>