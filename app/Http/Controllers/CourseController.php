<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return response()->json($courses);
    }

    public function create()
    {
        // For creating a course, you might redirect to a form in your frontend,
        // handled separately from API endpoint.
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $course = Course::create($request->all());

        return response()->json($course, 201); // Return the created course with HTTP status 201
    }

    public function show(Course $course)
    {
        return response()->json($course);
    }

    public function edit(Course $course)
    {
        // Similar to create(), handled separately from API endpoint.
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $course->update($request->all());

        return response()->json($course);
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return response()->json(['message' => 'Course deleted successfully']);
    }

}
