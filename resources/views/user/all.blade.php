@extends('layouts.app')
@section('content')
    @foreach($users as $u)
        <p>Имя:{{$u['name']}}  Телефон:{{$u['phone']}}  Email:{{$u['email']}}</p>
    @endforeach
@stop
