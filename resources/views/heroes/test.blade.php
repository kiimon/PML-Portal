<x-app-layout>

<div class="max-w-7xl mx-auto py-10">

<h1 class="text-2xl font-bold mb-8">
Hero Asset Verification
</h1>

<div class="grid grid-cols-6 gap-6">

@foreach($heroes as $hero)

<div class="bg-white shadow rounded p-4 text-center">

<img src="{{ $hero['icon'] }}" class="mx-auto mb-2">

<h2 class="font-bold text-sm mb-2">
{{ $hero['name'] }}
</h2>

<img src="{{ $hero['portrait'] }}" class="rounded">

</div>

@endforeach

</div>

</div>

</x-app-layout>