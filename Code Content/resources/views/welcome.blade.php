@extends('layout')

@section('title')
    Welcome Page
@endsection


<div class="flex-center position-ref full-height">
    <style>

       /* .links > a {
            -webkit-transition: all .2s;
            -moz-transition: all .2s;
            transition: all .2s;

            background-size: 100% 200%;
            background-color: #336699;
            background-image: linear-gradient(to bottom, white 50%, #336699 50%);
        }

        .links > a:hover {
            color: white;
            background-position: 0 -100%;
        }*/

    </style>
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

    <div class="content">
        <div class="title m-b-md">
            <div class="input-title" > PreQuiz </div> 
            <input class="input-submit" type="submit" value="" >
            <input class="input-field" type="text" placeholder="Type the name of your institution">
        </div>

    </div>
</div>
