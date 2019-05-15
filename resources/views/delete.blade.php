@extends('master')

@section('content')
    <div class='modWrapper'>
        <img class='modImg' src='{{$mod->picture_url}}' alt='Mod image for {{$mod->name}}'>
        <a href='{{'/' . $mod->id}}'><span class='modName'>{{$mod->name}}</span></a>
        <div class='modDescription'>
            <hr>
            @if(strlen($mod->description) < 265)
                {{$mod->description}}
            @else
                {{substr($mod->description, 0, 262) . '...'}}
            @endif
        </div>

        <hr id='specHr'>
        <div class='modContent'>
            <em>By {{$mod->mod_author}}</em><br>
            Contributed by <em>{{$mod->user->name}}</em><br>
            <a href='{{$mod->mod_url}}' target="_blank">Download from Skyrim Nexus</a><br>
        </div>
    </div>
    <br>
    <div id='confirm'>
        <form class='edit' method='POST' action='/{{$mod->id}}/delete'>
            {{ csrf_field() }}
            {{method_field('DELETE')}}
            <input id='confirmButtonYes' type='submit' value='Yes'>
        </form>
        &emsp;
        <form class='edit' method='GET' action='/{{$mod->id}}'>
            <input id='confirmButtonNo' type='submit' value='No'>
        </form>
    </div>
@endsection