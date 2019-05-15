@extends('master')

@section('title')
    Home
@endsection

@section('content')
    @foreach($mods as $mod)
        @include('_mod')
    @endforeach
@endsection

