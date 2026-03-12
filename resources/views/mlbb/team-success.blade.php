@extends('layouts.app')

@section('title', 'Team Registered')

@section('content')
<div class="flex items-center justify-center h-[80vh] w-full">
    <div class="w-full max-w-md px-4">
        <h1 class="text-center text-3xl font-bold text-white mb-6">
            Registration Successful!
        </h1>

        <div class="accent-border accent-shadow step-card backdrop-blur-md rounded-2xl shadow-xl p-8 space-y-6 bg-gray-900/50 text-center">
            
            @if(session('success'))
                <div class="bg-green-500/20 border border-green-500 text-green-400 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <h3 class="text-xl font-bold text-white">{{ $team->team_name }}</h3>
            <p class="text-gray-400 text-sm mb-4">Please take a screenshot of this page and share the QR code with your members so they can register under your team.</p>

            <div class="flex justify-center my-6">
                <!-- Generate QR Code using Google API passing the register member route with team_id -->
                <div class="bg-white p-4 rounded-xl shadow-lg">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data={{ urlencode(route('member.register', ['team_id' => $team->id])) }}" alt="Team QR Code" class="w-48 h-48 mx-auto">
                </div>
            </div>

            <div class="flex justify-center pt-4">
                <button type="button" class="neon-btn" style="width:160px; height:50px;" onclick="window.location.href='/'">
                    <span class="span"></span>
                    <span class="txt">BACK TO HOME</span>
                </button>
            </div>
            
        </div>
    </div>
</div>
@endsection
