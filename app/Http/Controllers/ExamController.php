<?php

namespace App\Http\Controllers;

use App\Course;
use App\Exam;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('student')) {
            //$exams = Exam::where('level', "=", Auth::user()->student()->level)->get();
            $exams = Schedule::where('level', "=", Auth::user()->student()->level)->get();
        } else {
            $exams = Exam::all();
        }
        return view('exams.index')->with(['exams' => $exams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all()->pluck('name', 'id');
        return view('exams.create', compact('courses'));
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
            'course_id' => 'required',
        ]);
        $input = $request->only('name', 'level', 'course_id');
        $input['added_by'] = Auth::id();
        $input['updated_by'] = Auth::id();
        $exam = Exam::create($input);
        return redirect()->route('exams.index')
            ->with('success', 'Exam created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exam = Exam::find($id);
        return view('exams.show', compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::find($id);
        $courses = Course::find($exam->course_id)->pluck('name', 'id');
        return view('exams.edit', compact('exam', 'courses'));
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
            'course_id' => 'required',
        ]);
        $input = $request->only('name', 'level', 'course_id');
        $input['updated_by'] = Auth::id();

        $exam = Exam::find($id);
        $exam->update($input); //update the exam info
        return redirect()->route('exams.index')
            ->with('success', 'Exam updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        Exam::find($id)->delete();
        return redirect()->route('exams.index')
            ->with('success', 'Exam deleted successfully');
    }

    public function take()
    {
        return view('exams.take');
    }

    public function submit(Request $request)
    {
        $input = $request->all();
        //$json = $input['questions'];
        //$questions = json_decode($json, JSON_FORCE_OBJECT);
        //print_r($json[1]);
        //print_r($input);
        return view('exams.submit', compact('input'));
    }

}
