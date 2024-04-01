<?php

namespace App\Http\Controllers;

use App\Models\Students;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function show($id)
    {
        $data = Students::findOrFail($id);
        return view('students.edit', ['student' => $data]);
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

        Students::create($validated);

        return redirect('/')->with('message', 'New Student was added successfully!');
    }

    public function update(Students $student, Request $request)
    {
        $data = $request->validate([
            "first_name" => 'required',
            "last_name" => 'required',
            "gender" => 'required',
            "age" => 'nullable',
            "email" => ['required', 'email'],
        ]);

        $student->update($data);

        return back()->with('message', 'Data was successfully updated!');
    }




}
