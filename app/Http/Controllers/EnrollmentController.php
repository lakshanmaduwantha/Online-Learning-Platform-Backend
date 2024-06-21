<?php 

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with('user', 'course')->get();
        return response()->json(['enrollments' => $enrollments]);
    }

    public function create()
    {
        $users = User::all();
        $courses = Course::all();
        return response()->json(['users' => $users, 'courses' => $courses]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $enrollment = Enrollment::create($request->all());

        return response()->json(['message' => 'Enrollment created successfully.', 'enrollment' => $enrollment]);
    }

    public function show(Enrollment $enrollment)
    {
        return response()->json(['enrollment' => $enrollment]);
    }

    public function edit(Enrollment $enrollment)
    {
        $users = User::all();
        $courses = Course::all();
        return response()->json(['enrollment' => $enrollment, 'users' => $users, 'courses' => $courses]);
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $enrollment->update($request->all());

        return response()->json(['message' => 'Enrollment updated successfully.', 'enrollment' => $enrollment]);
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return response()->json(['message' => 'Enrollment deleted successfully.']);
    }
}
