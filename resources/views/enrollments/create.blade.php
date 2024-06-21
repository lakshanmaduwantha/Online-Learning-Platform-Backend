@extends('layout')

@section('content')
    <h1>Create Enrollment</h1>
    <form action="{{ route('enrollments.store') }}" method="POST">
        @csrf
        <div>
            <label for="user_id">User</label>
            <select id="user_id" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="course_id">Course</label>
            <select id="course_id" name="course_id" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
