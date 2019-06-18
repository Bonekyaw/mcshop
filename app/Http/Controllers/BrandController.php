<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Tag;
use App\Product;
use App\History;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Date;

class BrandController extends Controller
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
        $brandPagi = Brand::with('products:id')->orderBy('updated_at','desc')->paginate(30);
        $brandCount = Brand::count();
        $catCount = Category::count();
        $productCount = Product::count();
        $tagProducts = Tag::all();
        $historyCount = History::count();
        $bellNoti = Product::where('inStock','<',4)->count();
        return view('brand.index', compact('brandPagi','catCount','brandCount','tagProducts','productCount','historyCount','bellNoti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $date = Date::parse('2019-06-13 16:55:00')->isoFormat('LLLL');
        $brand = new Brand();
        $brandCount = Brand::count();
        $catCount = Category::count();
        $productCount = Product::count();
        $tagProducts = Tag::all();
        $historyCount = History::count();
        $bellNoti = Product::where('inStock','<',4)->count();
        return view('brand.create', compact('brand','catCount','brandCount','tagProducts','productCount','historyCount','bellNoti'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Brand::create($this->setValidate());
        return redirect('brands')->with('success','Wow, သင် Brand အမည်အသစ်တစ်ခု ထပ်ထည့်တာ အောင်မြင်ပါသည်');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        $brandCount = Brand::count();
        $catCount = Category::count();
        $productCount = Product::count();
        $tagProducts = Tag::all();
        $historyCount = History::count();
        $bellNoti = Product::where('inStock','<',4)->count();
        return view('brand.show', compact('brand', 'catCount','brandCount','tagProducts','productCount','historyCount','bellNoti'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $brandCount = Brand::count();
        $catCount = Category::count();
        $productCount = Product::count();
        $tagProducts = Tag::all();
        $historyCount = History::count();
        $bellNoti = Product::where('inStock','<',4)->count();
        return view('brand.edit', compact('brand','catCount','brandCount','tagProducts','productCount','historyCount','bellNoti'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update( Brand $brand)
    {
        $brand->update($this->setValidate());
        return redirect('brands')->with('success','Wow, သင် Brand အမည်အသစ် ပြောင်းလဲတာ အောင်မြင်ပါသည်');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect('brands')->with('success','Brand အဟောင်းကို ပယ်ဖျက်တာ အောင်မြင်ပါသည်');
    }
    public function setValidate()
    {
        return request()->validate([
            'brand' => ['required', 'string', 'max:255','unique:brands']
        ]);
    }

}
