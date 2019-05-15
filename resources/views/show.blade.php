@extends('master')

@section('title')
    {{$mod->name}}
@endsection

@section('content')
    <div id='modWrapperSingle'>
        <img id='modImgSingle' src='{{$mod->picture_url}}' alt='Mod image for {{$mod->name}}'>
        <span id='modNameSingle'>{{$mod->name}}</span>
        <div id='modDescriptionSingle'>
            <hr>
            {{$mod->description}}
            <hr>
        </div>
        <div id='modContentSingle'>
            <em>By {{$mod->mod_author}}</em><br>
            Contributed by <em>{{$mod->user->name}}</em><br>
            <a href='{{$mod->mod_url}}' target="_blank">Download from Skyrim Nexus</a><br><br>

        <!-- if user is logged in and the owner of the mod, show buttons to edit or delete the mod -->
            @if(isset($user) && $user->name == $mod->user->name)
                <form class='edit' method='GET' action='/{{$mod->id}}/edit'>
                    <input class='showButton' type='submit' value='Edit'>
                </form>
            &emsp;
                <form class='edit' method='POST' action='/{{$mod->id}}/delconfirm'>
                    {{ csrf_field() }}
                    <input class='showButton' type='submit' value='Delete'>
                </form>
                <br><br>
            @endif

            <span id='commentHeading'>Comments</span>
        </div>
        @foreach($comments as $comment)
            @include('_comment')
        @endforeach

    <!-- if user is logged in, show comment form, else show a link to login page -->
        @if(isset($user))
            <br>
            <form method='POST' action='/{{$mod->id}}/comment'>
                {{ csrf_field() }}
                <textarea id='comment' name='comment' rows="4" cols="50">Enter your comment here...</textarea><br>
                <input class='showButton' type='submit' value='Comment'>
            </form>
            <br>
        @else
            <br>
            <span class='showAlert'>Please <a href='/login'>log in</a> to post a new comment!</span>
            <br><br>
        @endif
    </div>
    <br>
@endsection