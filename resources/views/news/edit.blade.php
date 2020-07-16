@extends('layouts.app')
@section('content')
{{--    @dd($news->category);--}}
    Редактирование новости c id - {{$news->id}}
{{--    @isset($save)--}}
{{--        <p>Новость успешно сохранена</p>--}}
{{--    @endisset--}}
{{--@if (!empty($errors->all)) dd($errors->all()) @endif--}}

<form action="{{ route('news.update',['news'=> $news]) }}" method="post">
    @method('PUT')
    @csrf
    <label for="title">Заголовок</label>
    <input type="text" name="title" value="{{$news->title}}" class="form-control">
    @if($errors->has('title'))
        <div class="alert alert-danger">
            @foreach($errors->get('title') as $error)
                <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <label for="description">Описание</label>
    <input type="text" name="description" value="{{$news->description}}" class="form-control">
    @if($errors->has('description'))
        <div class="alert alert-danger">
            @foreach($errors->get('description') as $error)
                <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <label for="text">Содержание</label>
    <textarea name="text" cols="50" rows="10" class="form-control">{{$news->text}}</textarea>
    @if($errors->has('text'))
        <div class="alert alert-danger">
            @foreach($errors->get('text') as $error)
                <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <p>Отметь нужную категорию:</p>
    @foreach($allCategories as $cat)
        {{$cat->name}}   <input type="checkbox"
                                name="category_id_m[]"
                                value="{{$cat->id}}"
                                @foreach ($news->categories()->get() as $attr)
                                @if ($attr->id == $cat->id)
                                    checked
                                @endif
                                @endforeach
        ><br>
    @endforeach
    @if($errors->has('category_id_m'))
        <div class="alert alert-danger">
            @foreach($errors->get('category_id_m') as $error)
                <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <button type="submit" class="btn btn-success">Жми!</button>
</form>
@stop
