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
                Name<br><input type='text' name='name' value='@if(old('name')){{old('name')}}@else{{$mod->name}}@endif'>
                @include('error-field', ['fieldName' => 'name'])
            </label>
            <br><br>
            <label>
                Description<br><textarea rows="8" cols="50" name='description'>@if(old('description')){{old('description')}}@else{{$mod->description}}@endif</textarea>
                @include('error-field', ['fieldName' => 'description'])
            </label>
            <br><br>
            <label>
                Picture URL<br><input type='text' name='picture_url' value='@if(old('picture_url')){{old('picture_url')}}@else{{$mod->picture_url}}@endif'>
                @include('error-field', ['fieldName' => 'picture_url'])
            </label>
            <br><br>
            <label>
                Mod URL<br><input type='text' name='mod_url' value='@if(old('mod_url')){{old('mod_url')}}@else{{$mod->mod_url}}@endif'>
                @include('error-field', ['fieldName' => 'mod_url'])
            </label>
            <br><br>
            <label>
                Mod Author<br><input type='text' name='mod_author' value='@if(old('mod_author')){{old('mod_author')}}@else{{$mod->mod_author}}@endif'>
                @include('error-field', ['fieldName' => 'mod_author'])
            </label>
            <br><br>
            <label>
                Mod Section<br>
                <select id='sectionSelect' name='section_id'>
                    <option value='1' @if(old('section_id') == '1' || $mod->section_id == 1){{'selected'}}@endif>Armor/Clothing</option>
                    <option value='2' @if(old('section_id') == '2' || $mod->section_id == 2){{'selected'}}@endif>Audio</option>
                    <option value='3' @if(old('section_id') == '3' || $mod->section_id == 3){{'selected'}}@endif>Character</option>
                    <option value='4' @if(old('section_id') == '4' || $mod->section_id == 4){{'selected'}}@endif>Crafting</option>
                    <option value='5' @if(old('section_id') == '5' || $mod->section_id == 5){{'selected'}}@endif>Creatures</option>
                    <option value='6' @if(old('section_id') == '6' || $mod->section_id == 6){{'selected'}}@endif>Dungeons</option>
                    <option value='7' @if(old('section_id') == '7' || $mod->section_id == 7){{'selected'}}@endif>Followers</option>
                    <option value='8' @if(old('section_id') == '8' || $mod->section_id == 8){{'selected'}}@endif}>Immersion</option>
                    <option value='9' @if(old('section_id') == '9' || $mod->section_id == 9){{'selected'}}@endif>Items/Objects</option>
                    <option value='10' @if(old('section_id') == '10' || $mod->section_id == 10){{'selected'}}@endif>Models/Textures</option>
                    <option value='11' @if(old('section_id') == '11' || $mod->section_id == 11){{'selected'}}@endif>Mounts</option>
                    <option value='12' @if(old('section_id') == '12' || $mod->section_id == 12){{'selected'}}@endif>NPCs</option>
                    <option value='13' @if(old('section_id') == '13' || $mod->section_id == 13){{'selected'}}@endif>New Lands</option>
                    <option value='14' @if(old('section_id') == '14' || $mod->section_id == 14){{'selected'}}@endif>Player Homes</option>
                    <option value='15' @if(old('section_id') == '15' || $mod->section_id == 15){{'selected'}}@endif>Quests</option>
                    <option value='16' @if(old('section_id') == '16' || $mod->section_id == 16){{'selected'}}@endif>Skills/Leveling</option>
                    <option value='17' @if(old('section_id') == '17' || $mod->section_id == 17){{'selected'}}@endif>Towns/Cities</option>
                    <option value='18' @if(old('section_id') == '18' || $mod->section_id == 18){{'selected'}}@endif>Weapons</option>
                </select>
            </label>
            <br><br>
            <input class='showButton' type='submit' value='Update'>
            <br><br>

        </form>
    </div>
    <br>
    @include('_mod')
@endsection