@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <header>
        <a href="{{ route('users.create') }}">Register</a>
        <h1>Login</h1>
    </header>

    <section>
        @if ($users->isEmpty())
            <p>No users to login</p>
        @else
            <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                @foreach ($users as $user)
                    <label>
                        <input type="radio" name="user" value="{{ $user->email }}">
                        {{ $user->name }} {{ $user->lastname }}
                    </label>
                    <br>
                @endforeach
                <input type="submit" value="Login">
            </form>
        @endif
    </section>

@endsection
