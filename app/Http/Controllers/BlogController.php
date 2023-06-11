<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index() {
        $page = 'Homepage';
        return view('blog.index', compact('page'));
    }

    function about() {
        $page = 'About Page';
        return view('blog.about', compact('page'));
    }

    function contact() {
        return view('blog.contact');
    }

    function post() {
        return view('blog.post');
    }

}
