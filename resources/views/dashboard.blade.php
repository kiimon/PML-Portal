@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<div class="neon-group">

    <label>
        <input class="neon-input" type="radio" name="nav" hidden>
        <a href="#" class="neon-btn">
            <span class="span"></span>
            <span class="txt">VIEW TEAMS</span>
        </a>
    </label>

    <label>
        <input class="neon-input" type="radio" name="nav" hidden>
        <a href="#" class="neon-btn">
            <span class="span"></span>
            <span class="txt">FINISHED MATCHES</span>
        </a>
    </label>

    <label>
        <input class="neon-input" type="radio" name="nav" hidden>
        <a href="#" class="neon-btn">
            <span class="span"></span>
            <span class="txt">CREATE MATCH</span>
        </a>
    </label>

    <label>
        <input class="neon-input" type="radio" name="nav" hidden>
        <a href="{{ route('heroes.index') }}" class="neon-btn">
            <span class="span"></span>
            <span class="txt">VIEW HEROES</span>
        </a>
    </label>

    <label>
        <input class="neon-input" type="radio" name="nav" hidden>
        <a href="{{ route('heroes.test') }}" class="neon-btn">
            <span class="span"></span>
            <span class="txt">CHECK HERO API</span>
        </a>
    </label>

    <label>
        <input class="neon-input" type="radio" name="nav" hidden>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="neon-btn" type="submit">
                <span class="span"></span>
                <span class="txt">LOGOUT</span>
            </button>
        </form>
    </label>

</div>

@endsection