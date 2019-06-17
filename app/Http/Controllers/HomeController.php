<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cats = \App\Category::with('products')->get();
        $brands = \App\Brand::with('products')->get();
        $bellNoti = \App\Product::where('inStock','<',4)->count();
        $products = \App\Product::all();
        $tagProducts = \App\Tag::with('products')->get();
        $histories = \App\History::all();
        return view('home', compact('cats','brands','tagProducts','products','bellNoti','histories'));
    }
}
