@extends('layouts.app')
@section('content')

    @if(session()->has('message'))
        <h3 style="color: red;">{{ session()->get('message') }}</h3>
    @endif
    <h2>Форма редактирования пользователя</h2>
    <form action="{{route('user.update', [ 'user' => $user ])}}" method="post">
        @method('PUT')
        @csrf
        <label for="name">Имя</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" value="{{$user->email}}">
        @if($errors->has('email'))
            <div class="alert alert-danger">
                @foreach($errors->get('email') as $error)
                    <p style="margin-bottom: 0;">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <label for="phone">Телефон</label>
        <input type="text" name="phone" class="form-control" value="{{$user->phone}}"> <br>
        Администратор <input type="checkbox" name="is_admin"
        value="{{ true }}"
        @if ($user->is_admin === true) checked
        @endif
        ><br><br>

{{--        <label for="mem">Запомнить меня</label>--}}
{{--        <input type="checkbox" name="mem">--}}
        <button type="submit" class="btn btn-success">Жми!</button>
    </form>
@stop
