@extends('layout')

@section('content')
    <h1>Enrollments</h1>
    <a href="{{ route('enrollments.create') }}">Create Enrollment</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Course</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enrollments as $enrollment)
                <tr>
                    <td>{{ $enrollment->id }}</td>
                    <td>{{ $enrollment->user->name }}</td>
                    <td>{{ $enrollment->course->name }}</td>
                    <td>
                        <a href="{{ route('enrollments.show', $enrollment->id) }}">View</a>
                        <a href="{{ route('enrollments.edit', $enrollment->id) }}">Edit</a>
                        <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
