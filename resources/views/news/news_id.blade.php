@extends('layouts.app')
@section('content')
    <h2>{!! $news['title'] !!}</h2>
    <p>{!! $news['text'] !!}</p>
@stop
