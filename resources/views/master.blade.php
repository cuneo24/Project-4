<?php
//Using this code was the easiest way to guarantee the navigation loading every time
use App\Section;

$sections = Section::get();
$lastSectionId = $sections[count($sections) - 1]->id;
$user = request()->user();
?>

        <!DOCTYPE html>
<html lang='en' xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>@yield('title') - Hidden Soul Gems</title>
    <link rel='stylesheet' type='text/css' href='/css/mods.css'>
</head>

<body>
<div id='masterWrapper'>
    <a href='/'>
        <div id='banner'>
            <div class='mainTitle'>Hidden</div>
            <img id='bannerImage'
                 src='https://vignette.wikia.nocookie.net/elderscrolls/images/c/cc/Skyrim_Lesser_soul_gem.png/revision/latest?cb=20130120200142'>
            <div class='mainTitle'>Soul Gems</div>
        </div>
    </a>

    <div id='navWrapper'>
        @foreach($sections as $section)
            @if($lastSectionId == $section->id)
                <a class='navLink' href='/{{$section->id . '/search'}}'>{{$section->name}}</a>
            @else
                <a class='navLink' href='/{{$section->id . '/search'}}'>{{$section->name}}</a>&nbsp;&bull;&nbsp;
            @endif
        @endforeach
        <br><br>
        <form method='GET' action='/search'>
            <label>
                <input type='text' name='searchTerm' value='@if(isset($searchTerm)){{$searchTerm}}@endif'>
            </label>
            <input type='submit' value='Search'>
        </form>
        <br>

        @if(isset($user))
            <form method='GET' action='/add'>
                <input class='showButton' type='submit' value='Add Mod'>
            </form>
            <br>
        @endif

        @if(!isset($user))
            <form method='GET' id='login' action='/login'>
                <a id='login' href='/login'>Login</a>
            </form>
        @endif

        @if(isset($user))
            <form method='POST' id='logout' action='/logout'>
                {{ csrf_field() }}
                <a id='login' href='#' onClick='document.getElementById("logout").submit();'>Logout {{$user->name}}</a>
            </form>
        @endif
    </div>

    <div id='contentWrapper'>
        @if(session('alert'))
            <br>
            <div class='alert'>{{session('alert')}}</div>
        @endif

        @if(isset($alert))
            <br>
            <div class='alert'>{{$alert}}</div>
        @endif
        <br>
        @yield('content')
    </div>
    <br>
</div>
</body>
</html>