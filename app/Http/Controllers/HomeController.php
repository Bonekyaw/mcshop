<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Events\HistoryEvent;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth','verified']);
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bellNoti = \App\Product::where('inStock','<',4)->count();
        $tagProducts = \App\Tag::all();
        $histories = \App\History::with('product:id,product,price')->wheredate('created_at', '=', now())->orderBy('created_at','desc')->get();
        $result = $histories->map(function($history){
            return $history->product->price * $history->quantity;
        });
        $total = $result->sum();
        $today = ($histories->count()/100)*100;
        $yesterday = (\App\History::wheredate('created_at', '=', Carbon::yesterday())->count()/100)*100;
        return view('home', compact('tagProducts','bellNoti','histories','today','yesterday','total'));
    }
     public function search(Request $request)
     {
        $search = $request->get('search');
        $products = \App\Product::where('product','LIKE','%'.$search.'%')->paginate(30);
        $bellNoti = \App\Product::where('inStock','<',4)->count();
        $tagProducts = \App\Tag::all();
        $histories = \App\History::with('product:id,product,price')->wheredate('created_at', '=', now())->orderBy('created_at','desc')->get();
        $result = $histories->map(function($history){
            return $history->product->price * $history->quantity;
        });
        $total = $result->sum();
        $today = ($histories->count()/100)*100;
        $yesterday = (\App\History::wheredate('created_at', '=', Carbon::yesterday())->count()/100)*100;
        return view('home', compact('products','tagProducts','bellNoti','histories','today','yesterday','total'));

     }

}
