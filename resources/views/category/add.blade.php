@extends('layouts.app')
@section('content')
    <h3>Создание категории</h3><br>

<form action="{{ route('category.store') }}" method="post">
    @csrf

    <label for="title">Заголовок</label>
    <input type="text" name="name" value="{{old('name')}}" class="form-control">
    @if($errors->has('name'))
        <div class="alert alert-danger">
            @foreach($errors->get('name') as $error)
                <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
    @endif
<br>
    <button type="submit" class="btn btn-success">Жми!</button>
</form>
@stop
