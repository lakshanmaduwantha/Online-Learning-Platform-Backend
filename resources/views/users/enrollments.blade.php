@extends('layout')

@section('content')
    <h1>Enrollments for {{ $user->name }}</h1>
    <table>
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enrollments as $enrollment)
                <tr>
                    <td>{{ $enrollment->course->name }}</td>
                    <td>{{ $enrollment->course->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
