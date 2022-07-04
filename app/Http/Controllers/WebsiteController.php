<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function job(){
        return view('website.job');
    }

    public function about(){

        return view('website.about');
    }

    public function contact(){
        return view('website.contact');
    }
}
