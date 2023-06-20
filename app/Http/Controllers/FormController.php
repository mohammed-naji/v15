<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalRequest;
use App\Mail\ContactUsMail;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

    function form3() {

        return view('forms.form3');
    }

    function form3_data(Request $request) {
        $request->validate([
            'name' => 'required',
            // 'email' => 'required',
            // 'age' => 'required',
            // 'gender' => 'required',
            // 'education' => 'required',
        ]);

        dd($request->all());
    }

    function form4() {
        // dd(time());
        return view('forms.form4');
    }

    function form4_data(Request $request) {

        $name = rand(). time(). $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads'), $name);

        // move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$_FILES['image']['name']); // PHP Pure

    }

    function form5() {
        return view('forms.form5');
    }

    function form5_data (Request $request) {
        // dd($request->all());
        // Validate
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $data = $request->except('_token');

        date_default_timezone_set('Asia/Gaza');
        // Upload CV
        $ex = $request->file('cv')->getClientOriginalExtension();
        $cvname = strtolower($request->name) . '-cv-' . date('Y m d - h i s') . '.' . $ex;
        $request->file('cv')->move(public_path('uploads/cv'), $cvname);

        $data['cv'] = $cvname;



        // Send Mail
        Mail::to('mohammed.almassri.2020@gmail.com')->send(new ContactUsMail($data));


        // validation

        // upload files

        // add to database or any logic

        // redirect to another page

    }
}
