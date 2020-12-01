<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\General;
class FrontController extends Controller
{
    public function home()
    {
        $general = General::find(1);
        return view ('front.home',compact('general'));
    }

    public function about()
    {
        $general = General::find(1);
        return view ('front.about',compact('general'));
    }

    public function testi()
    {
        $general = General::find(1);
        return view ('front.testi',compact('general'));
    }
    public function service()
    {
        $general = General::find(1);
        return view ('front.service',compact('general'));
    }

    public function portfolio()
    {
        $general = General::find(1);
        return view ('front.portfolio',compact('general'));
    }

    public function portfolioshow()
    {
        $general = General::find(1);
        return view ('front.portfolioshow',compact('general'));
    }

    public function blog()
    {
        $general = General::find(1);
        return view ('front.blog',compact('general'));
    }

    public function blogshow(){
        $general = General::find(1);
        return view ('front.blogshow',compact('general'));
    }

}
