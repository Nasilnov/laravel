@extends('layouts.app')
@section('content')
    <h3>Редактирование категории</h3><br>
    @if(session()->has('message'))
        <h3 style="color: red;">{{ session()->get('message') }}</h3>
    @endif
<form action="{{ route('category.update', ['category' => $category]) }}" method="post">
    @method('PUT')
    @csrf

    <label for="title">Заголовок</label>
    <input type="text" name="name" value="{{ $category->name }}" class="form-control"><br><br>
    @if($errors->has('name'))
        <div class="alert alert-danger">
            @foreach($errors->get('name') as $error)
                <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <button type="submit" class="btn btn-success">Изменить!</button>
</form><br>

    <form action="{{ route('category.destroy', ['category' => $category ]) }}" method="POST">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button>Удалить категорию</button>
@stop
