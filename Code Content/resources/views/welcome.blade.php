@extends('layouts.app')

@section('title')
    Welcome Page
@endsection


@section('content')

<div class="flex-center position-ref full-height">

<!--

    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
        
        
    @endif
            
--> 

    <div class="content">
        <div class="title m-b-md">
            <div class="input-title" > PreQuiz </div> 
            <input class="input-submit" type="submit" value="" >
            <input class="input-field" type="text" placeholder="Type the name of your institution">
        </div>

    </div>
</div>


@endsection