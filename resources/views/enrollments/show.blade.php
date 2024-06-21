@extends('layout')

@section('content')
    <h1>Enrollment Details</h1>
    <p>User: {{ $enrollment->user->name }}</p>
    <p>Course: {{ $enrollment->course->name }}</p>
    <a href="{{ route('enrollments.index') }}">Back to Enrollments</a>
@endsection
