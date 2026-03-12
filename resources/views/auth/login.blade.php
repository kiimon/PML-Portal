@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
<div class="flex items-center justify-center h-[80vh] w-full">
    <div class="w-full max-w-md px-4">
        <h1 class="text-center text-4xl font-bold text-white mb-8">
            Admin Login
        </h1>

        <div class="accent-border accent-shadow step-card backdrop-blur-md rounded-2xl shadow-xl p-8 space-y-6 bg-gray-900/50">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-white" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="space-y-4">
                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-gray-300 mb-1">{{ __('Email') }}</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" 
                               class="w-full accent-border accent-shadow neon-input-field rounded-lg px-3 py-2 text-white bg-transparent outline-none focus:ring-2 focus:ring-blue-500" 
                               required autofocus autocomplete="username">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-gray-300 mb-1">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" 
                               class="w-full accent-border accent-shadow neon-input-field rounded-lg px-3 py-2 text-white bg-transparent outline-none focus:ring-2 focus:ring-blue-500" 
                               required autocomplete="current-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-600 bg-gray-800 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                            <span class="ms-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between pt-6">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-400 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @else
                            <div></div>
                        @endif

                        <button type="submit" class="neon-btn" style="width:120px; height:50px;">
                            <span class="span"></span>
                            <span class="txt">{{ __('LOG IN') }}</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
