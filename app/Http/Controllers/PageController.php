<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function About()
    {
        return view('pages.about');
    }

    public function Services()
    {
        return view('pages.services');
    }

    public function Blog()
    {
        return view('pages.blog');
    }

    public function Contact()
    {
        return view('pages.contact');
    }

}
