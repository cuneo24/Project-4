@extends('master')

@section('title')
    Create Mod
@endsection

<form id='testAdd' method='POST' action='/store'>
    {{ csrf_field() }}
    <label>
        <input type='text' name='name' value='@if(isset($name)){{$name}}@endif'>Name
    </label>
    <label>
        <input type='textarea' name='description' value='@if(isset($description)){{$description}}@endif'>Description
    </label>
    <label>
        <input type='text' name='picture_url' value='@if(isset($picture_url)){{$picture_url}}@endif'>Picture URL
    </label>
    <label>
        <input type='text' name='mod_url' value='@if(isset($mod_url)){{$mod_url}}@endif'>Mod URL
    </label>
    <label>
        <input type='text' name='mod_author' value='@if(isset($mod_author)){{$mod_author}}@endif'>Mod Author
    </label>
    <label>
        <input type='text' name='section_id' value='1'>Mod Section
    </label>
    <input type='submit' value='Create'>

    @if ($errors->any())
        <div class="genericAlert">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
        <br>
    @endif

</form>