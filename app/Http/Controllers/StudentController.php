<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

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
        return view('students.index');
    }
}
