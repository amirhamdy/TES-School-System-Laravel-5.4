<?php

namespace App\Http\Controllers;

use App\CourseFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use SebastianBergmann\CodeCoverage\Node\File;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Input::get('c_id');
        $files = CourseFiles::where('professor', "=", Auth::user()->id)->where('course', "=", $id)->get();
        return view('files.index')->with(['files' => $files]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create');
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

            'filename' => 'required',
            'filename.*' => 'mimes:doc,pdf,docx,zip,flv,mkv,mp4'

        ]);

        if ($request->hasfile('filename')) {
            $data = "";
            foreach ($request->file('filename') as $course_files) {
                $name = $course_files->getClientOriginalName();
                $course_files->move(public_path() . '/course_material/', $name);
                $data = $name;
                //$data = $data . $name . "#@#";
            }
        }

        $file = new CourseFiles();
        $file->filename = ($data);
        $file->added_by = $request->user()->id;
        $file->updated_by = $request->user()->id;
        $file->professor = $request->user()->id;
        $file->course = $request->course_id;
        $file->save();

        return back()->with('success', 'Your files has been successfully added');
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
        //
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
        //
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
        CourseFiles::find($id)->delete();
        return redirect()->route('files.index')
            ->with('success', 'File deleted successfully');
    }
}
