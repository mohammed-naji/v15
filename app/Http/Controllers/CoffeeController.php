<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoffeeController extends Controller
{
    function index() {
        return view('coffee.index');
    }

    function about() {
        return view('coffee.about');
    }

    function products() {
        return view('coffee.products');
    }

    function store() {
        return view('coffee.store');
    }
}
