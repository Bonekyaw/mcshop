<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::with('products')->orderBy('id','desc')->paginate(15);
        $brandCount = Brand::count();
        $catCount = Category::count();
        $tagProducts = Tag::with('products')->get();
        return view('brand.index', compact('brands','brandCount','catCount','tagProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = new Brand();
        $brandCount = Brand::count();
        $catCount = Category::count();
        $tagProducts = Tag::with('products')->get();
        return view('brand.create', compact('brand','brandCount','catCount','tagProducts'));
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
        $tagProducts = Tag::with('products')->get();
        return view('brand.show', compact('brand', 'brandCount','catCount','tagProducts'));
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
        $tagProducts = Tag::with('products')->get();
        return view('brand.edit', compact('brand', 'brandCount','catCount','tagProducts'));
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
