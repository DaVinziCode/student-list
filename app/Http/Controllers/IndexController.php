<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index($id)
    {
        $data = array(
            "id" => $id,
            "name" => 'DaVinziCode',
            "age" => '30',
            "email" => 'beingalvinmerano@gmail.com',
        );

        // return view('index', ['data' => $data]);
        return view('index', $data);
    }

    // this is another way to pass data
    public function show($id)
    {
        $data = ['data' => 'data from database'];
        return view('user')
            ->with('data', $data)
            ->with('id', $id)
            ->with('name', 'DaVinziCode')
            ->with('age', '30')
            ->with('email', 'beingalvinmerano@gmail.com');
    }
}
