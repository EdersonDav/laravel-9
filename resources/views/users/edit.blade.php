@extends('layouts.app')

@section('title', 'Edit user')

@section('content')
    <h1>Editar usuário {{$user->name}}</h1>
    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li class="error">{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{route('users.update', $user->id)}}" method="POST">
        @method('PUT')
        @csrf
        <input type="text" name="name" placeholder="Name:" value="{{$user->name}}">
        <input type="email" name="email" placeholder="Email:" value="{{$user->email}}">
        <input type="password" name="password" placeholder="Password:">
        <button type="submit">Send</button>
    </form>

@endsection
