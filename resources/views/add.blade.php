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
                Mod Section<br><input type='text' name='section_id' value='1'>
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