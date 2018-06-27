<?php

namespace App\Http\Controllers;

use App\Course;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view('questions.index')->with(['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all()->pluck('name', 'id');
        return view('questions.create', compact('courses'));
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
            'question' => 'required|max:255',
            'option1' => 'required|max:255',
            'option2' => 'required|max:255',
            'option3' => 'required|max:255',
            'option4' => 'required|max:255',
            'answer' => 'required',
            'course_id' => 'required',
        ]);
        $input = $request->only('question', 'option1', 'option2', 'option3', 'option4', 'answer', 'course_id');
        $input['added_by'] = Auth::id();
        $input['updated_by'] = Auth::id();
        $question = Question::create($input);
        return redirect()->route('questions.index')
            ->with('success', 'Question created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $courses = Course::find($question->course_id)->pluck('name', 'id');
        return view('questions.edit', compact('question', 'courses'));
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
            'question' => 'required|max:255',
            'option1' => 'required|max:255',
            'option2' => 'required|max:255',
            'option3' => 'required|max:255',
            'option4' => 'required|max:255',
            'answer' => 'required',
            'course_id' => 'required',
        ]);
        $input = $request->only('question', 'option1', 'option2', 'option3', 'option4', 'answer', 'course_id');
        $input['updated_by'] = Auth::id();

        $question = Question::find($id);
        $question->update($input); //update the question info
        return redirect()->route('questions.index')
            ->with('success', 'Question updated successfully');
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
        Question::find($id)->delete();
        return redirect()->route('questions.index')
            ->with('success', 'Question deleted successfully');
    }
}
