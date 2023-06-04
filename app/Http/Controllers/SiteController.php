<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        // return url('/contact');
        return route('site.contact');
    }

    public function about()
    {
        return 'about page';
    }

    public function services()
    {
        return 'services page';
    }

    public function team()
    {
        return 'team page';
    }

    public function contact()
    {
        return 'contact page';
    }

    public function home()
    {
        return view('home');
    }
}
