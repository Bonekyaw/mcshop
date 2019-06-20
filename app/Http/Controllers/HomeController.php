<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Events\HistoryEvent;
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
        $productCount = \App\Product::count();
        $tagProducts = \App\Tag::all();
        $histories = \App\History::with('product:id,product')->wheredate('created_at', '=', now())->orderBy('created_at','desc')->get();
        $today = (\App\History::wheredate('created_at', '=', now())->count()/100)*100;
        $yesterday = (\App\History::wheredate('created_at', '=', Carbon::yesterday())->count()/100)*100;
        return view('home', compact('cats','brands','tagProducts','productCount','bellNoti','histories','today','yesterday'));
    }
     public function search(Request $request)
     {
        $search = $request->get('search');
        $products = \App\Product::where('product','LIKE','%'.$search.'%')->paginate(5);
        $cats = \App\Category::with('products')->get();
        $brands = \App\Brand::with('products')->get();
        $bellNoti = \App\Product::where('inStock','<',4)->count();
        $productCount = \App\Product::count();
        $tagProducts = \App\Tag::all();
        $histories = \App\History::with('product:id,product')->wheredate('created_at', '=', now())->orderBy('created_at','desc')->get();
        $today = (\App\History::wheredate('created_at', '=', now())->count()/100)*100;
        $yesterday = (\App\History::wheredate('created_at', '=', Carbon::yesterday())->count()/100)*100;
        return view('home', compact('products','cats','brands','tagProducts','productCount','bellNoti','histories','today','yesterday'));
        
     }

}
