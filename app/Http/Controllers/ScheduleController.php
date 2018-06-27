<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('student')) {
            $schedules = Schedule::where('level', "=", Auth::user()->student()->level)->get();
        } else {
            $schedules = Schedule::all();
        }
        return view('schedules.index')->with(['schedules' => $schedules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exams = Exam::all()->pluck('name', 'id');
        return view('schedules.create', compact('exams'));
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
            'start' => 'required',
            'end' => 'required',
            'level' => 'required|max:255',
            'exam_id' => 'required',
        ]);
        $input = $request->only('start', 'end', 'level', 'exam_id');
        $input['added_by'] = Auth::id();
        $input['updated_by'] = Auth::id();
        $schedule = Schedule::create($input);
        return redirect()->route('schedules.index')
            ->with('success', 'Schedule created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Schedule::find($id);
        $exams = Exam::find($schedule->exam_id)->pluck('name', 'id');
        return view('schedules.edit', compact('schedule', 'exams'));

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
            'start' => 'required',
            'end' => 'required',
            'level' => 'required|max:255',
            'exam_id' => 'required',
        ]);
        $input = $request->only('start', 'end', 'level', 'exam_id');
        $input['updated_by'] = Auth::id();

        $schedule = Schedule::find($id);
        $schedule->update($input); //update the schedule info
        return redirect()->route('schedules.index')
            ->with('success', 'Schedule updated successfully');
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
        Schedule::find($id)->delete();
        return redirect()->route('schedules.index')
            ->with('success', 'Schedule deleted successfully');
    }
}
