@extends('layouts.app')

@section('title', 'Create new user')

@section('content')
    <a href="{{ route('auth.index') }}">Back</a>
    <h1>Create new user</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label>
            Email:
            <input type="email" name="email" value="{{ old('email') }}">
        </label>
        <br>
        @error('email')
            <small style="color: red;">{{ $message }}</small>
            <br>
        @enderror
        <label>
            Name:
            <input type="text" name="name" value="{{ old('name') }}">
        </label>
        <br>
        @error('name')
            <small style="color: red;">{{ $message }}</small>
            <br>
        @enderror
        <label>
            Lastname:
            <input type="text" name="lastname" value="{{ old('lastname') }}">
        </label>
        <br>
        @error('lastname')
            <small style="color: red;">{{ $message }}</small>
            <br>
        @enderror
        <label>
            Id document:
            <input type="text" name="document" value="{{ old('document') }}">
        </label>
        <br>
        @error('document')
            <small style="color: red;">{{ $message }}</small>
            <br>
        @enderror
        <label>
            Password:
            <input type="password" name="password" value="{{ old('password') }}">
        </label>
        <br>
        @error('password')
            <small style="color: red;">{{ $message }}</small>
            <br>
        @enderror
        <br>

        <input type="submit" value="Create user">
    </form>
@endsection
