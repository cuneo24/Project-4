<?php
//Using this code was the easiest way to guarantee the section navigation loading every time
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
        <span id='sectionName'>Sections</span><br>

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
                <input class='showButton' type='submit' value='Create Mod'>
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
        <p id='aboutWrapper'>
            This website is designed to be a repository of mods for the Elder Scrolls V: Skyrim, developed by Bethesda Softworks. Here, users can add mods that they think are really good but               are, unfortunately, buried underneath thousands of other mods on the <a href='https://www.nexusmods.com/skyrim/'>Skyrim Mods Nexus</a>, or other mod websites.
        </p>

        @if(session('alert'))
            <hr>
            <div class='alert'>{{session('alert')}}</div>
            <hr>
            <br>
        @endif

        @if(isset($alert))
            <hr>
            <div class='alert'>{{$alert}}</div>
            <hr>
            <br>
        @endif
        @yield('content')
    </div>

    <br>

</div>
</body>
</html>