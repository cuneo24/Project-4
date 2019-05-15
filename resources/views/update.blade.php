@extends('master')

@section('title')
    Update {{$mod->name}}
@endsection

@section('content')
    <div class='genericWrapper'>
        <h1>Update {{$mod->name}}</h1>
        <form id='update' method='POST' action='/{{$mod->id}}/update'>
            {{ csrf_field() }}
            {{method_field('PUT')}}
            <label>
                Name<br><input type='text' name='name' value='{{$mod->name}}'>
            </label>
            <br><br>
            <label>
                Description<br><textarea rows="8" cols="50" name='description'>{{$mod->description}}</textarea>
            </label>
            <br><br>
            <label>
                Picture URL<br><input type='text' name='picture_url' value='{{$mod->picture_url}}'>
            </label>
            <br><br>
            <label>
                Mod URL<br><input type='text' name='mod_url' value='{{$mod->mod_url}}'>
            </label>
            <br><br>
            <label>
                Mod Author<br><input type='text' name='mod_author' value='{{$mod->mod_author}}'>
            </label>
            <br><br>
            <label>
                Mod Section<br><input type='text' name='section_id' value='{{$mod->section_id}}'>
            </label>
            <br><br>
            <input class='showButton' type='submit' value='Update'>
            <br><br>

            @if ($errors->any())
                <div class="genericAlert">
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br>
                    @endforeach
                </div>
                <br>
            @endif
        </form>
    </div>
    <br>
    @include('_mod')
@endsection