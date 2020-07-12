@extends('layouts.app')
@section('content')
    <h3>Категория новостей - {{$name}}</h3><br>

<form action="{{ route('saveNews') }}" method="post">
    @csrf
    <input type="text" style="display: none" name="category_id" value="{{$category_id}}">
    <label for="title">Заголовок</label>
    <input type="text" name="title" value="{{old('title')}}" class="form-control">
    <label for="description">Описание</label>
    <input type="text" name="description"  value="{{old('description')}}" class="form-control">
    <label for="text">Содержание</label>
    <textarea name="text" cols="50" rows="10" class="form-control">{{old('text')}}</textarea>

        @foreach($allCategories as $cat)
        {{$cat->name}}   <input type="checkbox" name="category_id_m[]" value="{{$cat->id}}"><br>
        @endforeach

    <button type="submit" class="btn btn-success">Жми!</button>
</form>
@stop
