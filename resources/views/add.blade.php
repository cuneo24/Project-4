@extends('master')

@section('title')
    Create Mod
@endsection

@section('content')
    <div class='genericWrapper'>
        <h1>Add New Mod</h1>
        <form method='POST' action='/store'>
            {{ csrf_field() }}
            <label>
                Name<br><input type='text' name='name' value='{{old('name')}}'>
            </label>
            <br><br>
            <label>
                Description<br><textarea rows="8" cols="50" name='description'>{{old('description')}}</textarea>
            </label>
            <br><br>
            <label>
                Picture URL<br><input type='text' name='picture_url' value='{{old('picture_url')}}'>
            </label>
            <br><br>
            <label>
                Mod URL<br><input type='text' name='mod_url' value='{{old('mod_url')}}'>
            </label>
            <br><br>
            <label>
                Mod Author<br><input type='text' name='mod_author' value='{{old('mod_author')}}'>
            </label>
            <br><br>
            <label>
                Mod Section<br>
                <select id='sectionSelect' name='section_id'>
                    <option value='none'>Choose one...</option>
                    <option value='1' @if(old('section_id') == '1'){{'selected'}}@endif>Armor/Clothing</option>
                    <option value='2' @if(old('section_id') == '2'){{'selected'}}@endif>Audio</option>
                    <option value='3' @if(old('section_id') == '3'){{'selected'}}@endif>Character</option>
                    <option value='4' @if(old('section_id') == '4'){{'selected'}}@endif>Crafting</option>
                    <option value='5' @if(old('section_id') == '5'){{'selected'}}@endif>Creatures</option>
                    <option value='6' @if(old('section_id') == '6'){{'selected'}}@endif>Dungeons</option>
                    <option value='7' @if(old('section_id') == '7'){{'selected'}}@endif>Followers</option>
                    <option value='8' @if(old('section_id') == '8'){{'selected'}}@endif}>Immersion</option>
                    <option value='9' @if(old('section_id') == '9'){{'selected'}}@endif>Items/Objects</option>
                    <option value='10' @if(old('section_id') == '10'){{'selected'}}@endif>Models/Textures</option>
                    <option value='11' @if(old('section_id') == '11'){{'selected'}}@endif>Mounts</option>
                    <option value='12' @if(old('section_id') == '12'){{'selected'}}@endif>NPCs</option>
                    <option value='13' @if(old('section_id') == '13'){{'selected'}}@endif>New Lands</option>
                    <option value='14' @if(old('section_id') == '14'){{'selected'}}@endif>Player Homes</option>
                    <option value='15' @if(old('section_id') == '15'){{'selected'}}@endif>Quests</option>
                    <option value='16' @if(old('section_id') == '16'){{'selected'}}@endif>Skills/Leveling</option>
                    <option value='17' @if(old('section_id') == '17'){{'selected'}}@endif>Towns/Cities</option>
                    <option value='18' @if(old('section_id') == '18'){{'selected'}}@endif>Weapons</option>
                </select>
            </label>
            <br><br>
            <input class='showButton' type='submit' value='Create'>
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
@endsection