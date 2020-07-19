@extends('layouts.app')
@section('content')
{{--    @dd($users)--}}
    @foreach($users as $u)
        <a href="{{ route('user.edit', ['user' => $u] )}} ">Имя:{{$u->name}}  Телефон:{{$u->phone}}  Email:{{$u->email}}</a><br><br>
{{--        <a href="#">Имя:{{$u->name}}  Телефон:{{$u->phone}}  Email:{{$u->email}}</a>--}}
    @endforeach
@stop
