<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Brand;
use App\Category;
use App\Product;
use App\History;
use Illuminate\Http\Request;

class TagController extends Controller
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
        $tagPagi = Tag::with('products')->orderBy('updated_at','desc')->paginate(15);
        $brandCount = Brand::count();
        $catCount = Category::count();
        $productCount = Product::count();
        $tagProducts = Tag::all();
        $historyCount = History::count();
        $bellNoti = Product::where('inStock','<',4)->count();
        return view('tag.index', compact('tagPagi','catCount','brandCount','tagProducts','productCount','historyCount','bellNoti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Tag::class);
        $tag = new Tag();
        $brandCount = Brand::count();
        $catCount = Category::count();
        $productCount = Product::count();
        $tagProducts = Tag::all();
        $historyCount = History::count();
        $bellNoti = Product::where('inStock','<',4)->count();
        return view('tag.create', compact('tag','catCount','brandCount','tagProducts','productCount','historyCount','bellNoti'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Tag::create($this->setValidate());
        return redirect('tags')->with('success','Wow, သင် Tag အမည်အသစ်တစ်ခု ထပ်ထည့်တာ အောင်မြင်ပါသည်');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        $tagProduct = $tag->products()->paginate(12);
        $brandCount = Brand::count();
        $catCount = Category::count();
        $productCount = Product::count();
        $tagProducts = Tag::all();
        $historyCount = History::count();
        $bellNoti = Product::where('inStock','<',4)->count();
        return view('tag.show', compact('tag', 'catCount','brandCount','tagProducts','productCount','historyCount','bellNoti','tagProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $this->authorize('update',$tag);
        $brandCount = Brand::count();
        $catCount = Category::count();
        $productCount = Product::count();
        $tagProducts = Tag::all();
        $historyCount = History::count();
        $bellNoti = Product::where('inStock','<',4)->count();
        return view('tag.edit', compact('tag', 'catCount','brandCount','tagProducts','productCount','historyCount','bellNoti'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update( Tag $tag)
    {
        $tag->update($this->setValidate());
        return redirect('tags')->with('success','Wow, သင် Tag အမည်အသစ် ပြောင်းလဲတာ အောင်မြင်ပါသည်');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $this->authorize('delete',$tag);
        $tag->delete();
        return redirect('tags')->with('success','Tag အဟောင်းကို ပယ်ဖျက်တာ အောင်မြင်ပါသည်');
    }
        public function setValidate()
    {
        return request()->validate([
            'tag' => ['required', 'string', 'max:255','unique:tags']
        ]);
    }
}
