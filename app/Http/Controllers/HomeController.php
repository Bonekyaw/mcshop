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
        $catCount = \App\Category::count();
        $brandCount = \App\Brand::count();
        $productCount = \App\Product::count();
        $tagProducts = \App\Tag::with('products')->get();
        return view('home', compact('catCount','brandCount','tagProducts','productCount'));
    }
}
