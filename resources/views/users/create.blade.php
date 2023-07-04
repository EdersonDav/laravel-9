@extends('layouts.app')

@section('title', 'Create a new user')

@section('content')
    <h1>Novo usuário</h1>
    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li class="error">{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{route('users.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name:" value="{{old('name')}}">
        <input type="email" name="email" placeholder="Email:" value="{{old('email')}}">
        <input type="password" name="password" placeholder="Password:">
        <button type="submit">Send</button>
    </form>

@endsection
