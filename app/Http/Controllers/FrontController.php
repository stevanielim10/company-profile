<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{About, Banner, Category, General, Link, Page, Pcategory, Portfolio, Post, Tag, Testimonial};
class FrontController extends Controller
{
    public function home()
    {
        $about = About::find(1);
        $banner = Banner::all();
        $general = General::find(1);
        $pcategories = Pcategory::all();
        $portfolio = Portfolio::all();
        $link = Link::orderBy('name','asc')->get();
        return view ('front.home',compact('about','banner','general','link','pcategories','portfolio'));
    }

    public function about()
    {
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        return view ('front.about',compact('general','link'));
    }

    public function testi()
    {
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        $testi = Testimonial::orderBy('name','asc')->paginate(6);
        return view ('front.testi',compact('general','link','testi'));
    }
    public function service()
    {
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        return view ('front.service',compact('general','link'));
    }

    public function portfolio()
    {
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        $pcategories = Pcategory::all();
        $portfolio = Portfolio::all();
        return view ('front.portfolio',compact('general','link','pcategories','portfolio'));
    }

    public function portfolioshow($slug)
    {
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        $portfolio = Portfolio::where('slug', $slug)->firstOrFail();
        return view ('front.portfolioshow',compact('general','link','portfolio'));
    }

    public function blog()
    {
        $categories = Category::all();
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        $posts = Post::where('status','=','PUBLISH')->orderBy('id','desc')->paginate(3);
        $recent = Post::orderBy('id','desc')->limit(5)->get();
        $tags = Tag::all();
        
        return view ('front.blog',compact('categories','general','link','posts','recent','tags'));
    }

    public function blogshow($slug)
    {
        $categories = Category::all();
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        $post = Post::where('slug', $slug)->firstOrFail();
        $old = $post->views;
        $new = $old + 1;
        $post->views = $new;
        $post->update();
        $recent = Post::orderBy('id','desc')->limit(5)->get();
        $tags = Tag::get();

        return view ('front.blogshow',compact('categories','general','link','post','recent','tags'));
    }

    public function category(Category $category)
    {
        $categories = Category::all();
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        $posts = $category->posts()->latest()->paginate(6);
        // $link = Link::orderBy('id','asc')->get();
        // $lpost = Post::orderBy('id','desc')->limit(5)->get();
        $recent = Post::orderBy('id','desc')->limit(5)->get();
        $tags = Tag::all();
        return view ('front.blog',compact('categories','general','link','posts','recent','tags'));
    }

    public function tag(Tag $tag)
    {
        $categories = Category::all();
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        $posts = $tag->posts()->latest()->paginate(12);
        // $link = Link::orderBy('id','asc')->get();
        // $lpost = Post::orderBy('id','desc')->limit(5)->get();
        $recent = Post::orderBy('id','desc')->limit(5)->get();
        $tags = Tag::all();
        return view ('front.blog',compact('categories','general','link','posts','recent','tags'));
    }

    public function search()
    {
       
        $query = request("query");
        
        $categories = Category::all();
        $general = General::find(1); 
        $link = Link::orderBy('name','asc')->get();
        $posts = Post::where("title","like","%$query%")->latest()->paginate(9);
        $recent = Post::orderBy('id','desc')->limit(5)->get();
        $tags = Tag::all();
        
        return view('front.blog',compact('categories','general','link','posts','query','recent','tags'));
    }

    public function page($slug)
    {
        $general = General::find(1);
        $link = Link::orderBy('name','asc')->get();
        // $lpost = Post::orderBy('id','desc')->limit(5)->get();
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('front.page',compact('general','link','page'));
    }
}
