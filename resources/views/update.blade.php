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
            </label>
            <br><br>
            <label>
                Description<br><textarea rows="8" cols="50" name='description'>@if(old('description')){{old('description')}}@else{{$mod->description}}@endif</textarea>
            </label>
            <br><br>
            <label>
                Picture URL<br><input type='text' name='picture_url' value='@if(old('picture_url')){{old('picture_url')}}@else{{$mod->picture_url}}@endif'>
            </label>
            <br><br>
            <label>
                Mod URL<br><input type='text' name='mod_url' value='@if(old('mod_url')){{old('mod_url')}}@else{{$mod->mod_url}}@endif'>
            </label>
            <br><br>
            <label>
                Mod Author<br><input type='text' name='mod_author' value='@if(old('mod_author')){{old('mod_author')}}@else{{$mod->mod_author}}@endif'>
            </label>
            <br><br>
            <label>
                Mod Section<br><input type='text' name='section_id' value='@if(old('section_id')){{old('section_id')}}@else{{$mod->section_id}}@endif'>
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