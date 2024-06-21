@extends('layout')

@section('content')
    <h1>{{ $course->name }}</h1>
    <p>{{ $course->description }}</p>
    <a href="{{ route('courses.index') }}">Back to Courses</a>
@endsection
