@extends('layouts.app')
@section('content')
    <h3>Создание новости</h3><br>

<form action="{{ route('news.store') }}" method="post">
    @csrf

{{--    <input type="text" style="display: none" name="category_id" value="{{$category_id}}">--}}
    <label for="title">Заголовок</label>
    <input type="text" name="title" value="{{old('title')}}" class="form-control">
    @if($errors->has('title'))
        <div class="alert alert-danger">
            @foreach($errors->get('title') as $error)
                <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <label for="description">Описание</label>
    <input type="text" name="description"  value="{{old('description')}}" class="form-control">
    @if($errors->has('description'))
        <div class="alert alert-danger">
            @foreach($errors->get('description') as $error)
                <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <label for="text">Содержание</label>
    <textarea name="text" cols="50" rows="10" class="form-control">{{old('text')}}</textarea>
    @if($errors->has('text'))
        <div class="alert alert-danger">
            @foreach($errors->get('text') as $error)
                <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <p>Отметь нужную категорию:</p>
        @foreach($allCategories as $cat)
        {{$cat->name}}   <input type="checkbox" name="category_id_m[]" value="{{$cat->id}}"><br>
        @endforeach

    <button type="submit" class="btn btn-success">Жми!</button>
</form>
@stop
