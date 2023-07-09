<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    function index() {
        $countries = Country::with('flag')->get();

        // dd($countries);
        // dd($countries->flag);

        return view('countries.index', compact('countries'));
    }
}
