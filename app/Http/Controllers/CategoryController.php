<?php

namespace App\Http\Controllers;

use App\Category;
use App\Brand;
use App\Tag;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $catPagi = Category::with('products')->orderBy('updated_at','desc')->paginate(30);
        $brandCount = Brand::count();
        $catCount = Category::count();
        $productCount = Product::count();
        $tagProducts = Tag::with('products')->get();
        return view('category.index', compact('catPagi','catCount','brandCount','tagProducts','productCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        $brandCount = Brand::count();
        $catCount = Category::count();
        $productCount = Product::count();
        $tagProducts = Tag::with('products')->get();
        return view('category.create', compact('category','catCount','brandCount','tagProducts','productCount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Category::create($this->setValidate());
        return redirect('categories')->with('success','Wow, သင် Category အမည်အသစ်တစ်ခု ထပ်ထည့်တာ အောင်မြင်ပါသည်');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $brandCount = Brand::count();
        $catCount = Category::count();
        $productCount = Product::count();
        $tagProducts = Tag::with('products')->get();
        return view('category.show', compact('category','catCount','brandCount','tagProducts','productCount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $brandCount = Brand::count();
        $catCount = Category::count();
        $productCount = Product::count();
        $tagProducts = Tag::with('products')->get();
        return view('category.edit', compact('category','catCount','brandCount','tagProducts','productCount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Category $category)
    {
        $category->update($this->setValidate());
        return redirect('categories')->with('success','Wow, သင် Category အမည်အသစ် ပြောင်းလဲတာ အောင်မြင်ပါသည်');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('categories')->with('success','Category အဟောင်းကို ပယ်ဖျက်တာ အောင်မြင်ပါသည်');
    }
    public function setValidate()
    {
        return request()->validate([
            'category' => ['required', 'string', 'max:255','unique:categories']
        ]);
    }
}
