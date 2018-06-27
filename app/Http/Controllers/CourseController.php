<?php

namespace App\Http\Controllers;

use App\Course;
use App\Professor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasRole('admin')) {
            $courses = Course::all();
        } elseif (Auth::user()->hasRole('student')) {
            $courses = Course::where('level', "=", Auth::user()->student()->level)->where('status', "=", 1)->get();
        } else {
            $courses = Course::where('professor', "=", Auth::user()->id)->where('status', "=", 1)->get();
        }
        return view('courses.index')->with(['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professors = User::whereHas('roles', function ($q) {
            $q->where('name', 'professor');
        })->pluck('name', 'id');
        return view('courses.create', compact('professors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'level' => 'required|max:255',
            'status' => 'required|max:255',
            'professor' => 'required|max:255',
        ]);
        $input = $request->only('name', 'level', 'status', 'professor');
        $input['added_by'] = Auth::id();
        $input['updated_by'] = Auth::id();
        $course = Course::create($input); //Create Course table entry
        return redirect()->route('courses.index')
            ->with('success', 'Course created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $user = User::find($course->added_by);
        $professors = User::whereHas('roles', function ($q) {
            $q->where('name', 'professor');
        })->pluck('name', 'id');
        return view('courses.edit', compact('course', 'user', 'professors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'level' => 'required|max:255',
            'status' => 'required|max:255',
            'professor' => 'required|max:255',
        ]);
        $input = $request->only('name', 'level', 'status', 'professor');
        $input['updated_by'] = Auth::id();

        $course = Course::find($id);
        $course->update($input); //update the course info
        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::find($id)->delete();
        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully');
    }
}
