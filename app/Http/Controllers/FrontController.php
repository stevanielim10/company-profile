<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home(){
        return view ('front.home');
    }

    public function about(){
        return view ('front.about');
    }

    public function testi(){
        return view ('front.testi');
    }
    public function service(){
        return view ('front.service');
    }

    public function portfolio(){
        return view ('front.portfolio');
    }

    public function portfolioshow(){
        return view ('front.portfolioshow');
    }

    public function blog(){
        return view ('front.blog');
    }

    public function blogshow(){
        return view ('front.blogshow');
    }

    public function contact(){
        return view ('front.contact');
    }
}
