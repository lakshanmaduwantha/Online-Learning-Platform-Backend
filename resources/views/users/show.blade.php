@extends('layout')

@section('content')
    <h1>{{ $user->first_name }} {{ $user->last_name }}</h1>
    <p>Email: {{ $user->email }}</p>
    <p>Phone: {{ $user->phone }}</p>
    <a href="{{ route('users.index') }}">Back to Users</a>
@endsection
