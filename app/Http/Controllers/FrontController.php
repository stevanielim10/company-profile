<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{About, Banner, General, Pcategory, Portfolio};
class FrontController extends Controller
{
    public function home()
    {
        $about = About::find(1);
        $banner = Banner::all();
        $general = General::find(1);
        $pcategories = Pcategory::all();
        $portfolio = Portfolio::all();
        return view ('front.home',compact('about','banner','general','pcategories','portfolio'));
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
        $pcategories = Pcategory::all();
        $portfolio = Portfolio::all();
        return view ('front.portfolio',compact('general','pcategories','portfolio'));
    }

    public function portfolioshow($slug)
    {
        $general = General::find(1);
        $portfolio = Portfolio::where('slug', $slug)->firstOrFail();
        return view ('front.portfolioshow',compact('general','portfolio'));
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
