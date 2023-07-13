<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    function register_subjects() {
        $subjects = Subject::all();
        $student = Student::find(2);

        return view('subjects.register_subjects', compact('subjects', 'student'));
    }

    function register_subjects_data(Request $request) {
        $student = Student::find(2);

        // $student->subjects()->attach($request->sub_ids);
        // $student->subjects()->detach($request->sub_ids);
        $student->subjects()->sync($request->sub_ids);

        return redirect()->back();
    }

    function remove_subject($id) {
        $student = Student::find(2);
        $student->subjects()->detach([$id]);
        return redirect()->back();
    }
}
