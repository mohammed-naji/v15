<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site1Controller extends Controller
{
    public function index()
    {

        // $imgname = 'abc.new.aa.png';
        // $ex = pathinfo($imgname, PATHINFO_EXTENSION );
        // $path = explode('.', $imgname);
        // $ex = $path[ count($path) - 1 ];

        // $ex = end($path);

        // dd($ex);

        $name = 'Kamel';
        $age = 20;

        // return view('index')->with('name', $name)->with('age', $age);
        // return view('index', compact('name', 'age'));
        // return view('index', [
        //     'myname' => $name,
        //     'age' => $age
        // ]);

        return view('site1.index');
    }

    public function resume()
    {
        return view('site1.resume');
    }

    public function projects()
    {
        return view('site1.projects');
    }

    public function contact()
    {
        return view('site1.contact');
    }


}


// compact('name', 'age', 'collage');

// $params = ['name', 'age', 'collage'];

// $vals = [];

// foreach($params as $parm) {
//     $vals[$parm] = $GLOBALS[$parm];
// }

// extract($vals);



