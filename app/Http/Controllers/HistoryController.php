<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Tag;
use App\Product;
use App\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historyPagi = History::with('product:id,product')->orderBy('updated_at','desc')->limit(60)->paginate(15);
        $brandCount = Brand::count();
        $catCount = Category::count();
        $productCount = Product::count();
        $tagProducts = Tag::all();
        $historyCount = History::count();
        $bellNoti = Product::where('inStock','<',4)->count();
        return view('history.index', compact('historyPagi','catCount','brandCount','tagProducts','productCount','historyCount','bellNoti'));
    }
    public function getByDate()
    {
        $day = request()->day;
        $month = request()->month;
        $year = request()->year;
        $historyPagi = History::whereDay('created_at', '=', $day )->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->orderBy('created_at','desc')->paginate(15);
        $brandCount = Brand::count();
        $catCount = Category::count();
        $productCount = Product::count();
        $tagProducts = Tag::all();
        $historyCount = History::count();
        $bellNoti = Product::where('inStock','<',4)->count();
        return view('history.sort', compact('historyPagi','catCount','brandCount','tagProducts','productCount','historyCount','bellNoti'));

    }
    public function deleteByMonth()
    {
        $month = request()->month;
        $year = request()->year;
        History::whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->delete();
        return redirect('histories')->with('success','Wow, သင် ရောင်းပြီးထုတ်ကုန်များကို လအလိုက် ပယ်ဖျက်တာ အောင်မြင်ပါသည်');

    }
    public function getByOutStock()
    {
        $outStockPagi = Product::where('inStock','<',4)->orderBy('updated_at','desc')->paginate(15);
        $brandCount = Brand::count();
        $catCount = Category::count();
        $productCount = Product::count();
        $tagProducts = Tag::all();
        $historyCount = History::count();
        $bellNoti = Product::where('inStock','<',4)->count();
        return view('history.stock', compact('outStockPagi','catCount','brandCount','tagProducts','productCount','historyCount','bellNoti'));

    }

}
