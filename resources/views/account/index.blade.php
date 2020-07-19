@extends('layouts.app')
@section('content')
    @if(session()->has('error'))
        <h3 style="color: red;">{{ session()->get('error') }}</h3>
        @endif
    <h2 >Это кабинет пользователя, привет {{auth()->user()->name}} </h2>
    @if(session()->has('message'))
        <h3 style="color: red;">{{ session()->get('message') }}</h3>
    @endif
    <form action="{{route('user.save')}}" method="post">
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
        @if($errors->has('phone'))
            <div class="alert alert-danger">
                @foreach($errors->get('phone') as $error)
                    <p style="margin-bottom: 0;">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <label for="password">Старый пароль</label>
        <input type="password" name="password" class="form-control" value="" placeholder="Введите старый пароль">
        @if($errors->has('password'))
            <div class="alert alert-danger">
                @foreach($errors->get('password') as $error)
                    <p style="margin-bottom: 0;">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <label for="newpassword">Новый пароль</label>
        <input type="password" name="newpassword" class="form-control" value="" placeholder="Введите новый пароль"><br>
        @if($errors->has('newpassword'))
            <div class="alert alert-danger">
                @foreach($errors->get('newpassword') as $error)
                    <p style="margin-bottom: 0;">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <button type="submit" class="btn btn-success">Изменить!</button>
    </form>


@stop

