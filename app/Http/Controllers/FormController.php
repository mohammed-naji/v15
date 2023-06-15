<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    function form1() {
        return view('forms.form1');
    }

    function form1_data(Request $request) {
        // dd( $request->all() );
        // dd( $request->except('_token') );
        // dd( $request->only('_token', 'name') );

        // $name = $request->input('name');
        // $age = $request->input('age');
        $accept = $request->input('accept', 'No');
        $name = $request->name;
        $age = $request->age;

        return "Welcome $name, your age is $age, Accept: $accept";
    }

    function form2() {
        return view('forms.form2');
    }

    function form2_data(PersonalRequest $request) {

        // 1. Request Validation
        // $request->validate([
        //     'name' => 'required|min:3|max:20',
        //     'email' => 'required|ends_with:@gmail.com'
        //     'email' => 'required|ends_with:@gmail.com'
        //     'email' => 'required|ends_with:@gmail.com'
        //     'email' => 'required|ends_with:@gmail.com'
        //     'email' => 'required|ends_with:@gmail.com'
        //     'email' => 'required|ends_with:@gmail.com'
        // ]);

        // 2. Validator Class
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|min:3|max:20',
        //     'email' => 'required|ends_with:@gmail.com'
        // ]);

        // if($validator->fails()) {
        //     return [
        //         'data' => 'There is an error'
        //     ];
        // }

        // 3. File Request


        // dd($request->all());
        $name = $request->name;
        $email = $request->email;

        return view('forms.form2_data', compact('name', 'email'));
    }
}
