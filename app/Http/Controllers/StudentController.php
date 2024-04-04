<?php

namespace App\Http\Controllers;

use App\Models\Students;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{
    public function index()
    {
        // $data = Students::all();
        // $data = Students::where('id', 1)->get();
        // $data = Students::where('first_name', 'like', '%lyn%')->get(); //wild card query kinukuha nya lahat ng may name na lyn
        // $data = Students::where('age', '>', 19)->orderBy('first_name', 'asc')->limit(5)->get(); //wild card query kinukuha nya lahat ng age greater than 19
        // $data = \DB::table('students')->select(\DB::raw('count(*) as gender_count, gender'))->groupBy('gender')->get(); //custom query
        // $data = Students::where('id', 101)->firstOrFail(); //Notfound Exception
        // return view('students.index', ['students' => $data]);
        $data = array("students" => DB::table('students')->orderBy('created_at', 'desc')->simplePaginate(10));
        return view('students.index', $data);
    }


    public function create()
    {
        return view('students.create')->with('title', 'Add New');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "first_name" => 'required',
            "last_name" => 'required',
            "gender" => 'required',
            "age" => 'required',
            "email" => ['required', 'email', Rule::unique('students', 'email')],
        ]);

        if ($request->hasFile('student_image')) {
            $request->validate([
                'student_image'=> 'mimes:jpeg,png,bmp,tiff |max:4096',
            ]);

            $filenameWithExtension = $request->file('student_image');

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file('student_image')->getClientOriginalExtension();

            $filenameToStore = $filename .'_'.time().'.'.$extension;

            $smallThumbnail = $filename .'_'.time().'.'.$extension;

            $request->file('student_image')->storeAs('public/student', $filenameToStore);

            $request->file('student_image')->storeAs('public/student/thumbnail', $smallThumbnail);

            $thumbNail = 'storage/student/thumbnail/' . $smallThumbnail;

            $this->createThumbnail($thumbNail, 150, 93);

            $validated['student_image'] = $filenameToStore;

        }

        Students::create($validated);

        return redirect('/')->with('message', 'New Student was added successfully!');
    }

    public function edit(Students $student){
        return view('students.edit', ['student'=> $student]);
    }

    public function show(Students $student){
        return view('students.show', ['student'=> $student]);
    }


    public function update(Request $request, Students $student)
    {
        $data = $request->validate([
            "first_name" => 'required',
            "last_name" => 'required',
            "gender" => 'required',
            "age" => 'required',
            "email" => 'required',
        ]);

        if ($request->hasFile('student_image')) {
            $request->validate([
                'student_image'=> 'mimes:jpeg,png,bmp,tiff |max:4096',
            ]);

            $filenameWithExtension = $request->file('student_image');

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file('student_image')->getClientOriginalExtension();

            $filenameToStore = $filename .'_'.time().'.'.$extension;

            $smallThumbnail = $filename .'_'.time().'.'.$extension;

            $request->file('student_image')->storeAs('public/student', $filenameToStore);

            $request->file('student_image')->storeAs('public/student/thumbnail', $smallThumbnail);

            $thumbNail = 'storage/student/thumbnail/' . $smallThumbnail;

            $this->createThumbnail($thumbNail, 150, 93);

            $data['student_image'] = $filenameToStore;

        }

        $student->update($data);
        return redirect('/')->with('message', 'Data was successfully updated!');


    }

    public function destroy(Students $student){
        $student->delete();
        return redirect('/')->with('message', 'Data was successfully deleted!');
    }


    public function createThumbnail($path, $width, $height){
        $img = Image::make($path)->resize($width, $height, function
        ($constraint){
            $constraint->aspectRatio();
        });
        $img->save($path);
    }
}
