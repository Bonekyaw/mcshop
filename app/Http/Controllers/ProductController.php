<?php

namespace App\Http\Controllers;

use App\Product;
use App\Brand;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;

class ProductController extends Controller
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
        $products = Product::with(['category','brand','tags'])->orderBy('updated_at','desc')->paginate(16);
        $brandCount = Brand::count();
        $catCount = Category::count();
        $productCount = Product::count();
        $tagProducts = Tag::with('products')->get();
        return view('product.index', compact('products','brandCount','catCount','tagProducts','productCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        $brandCount = Brand::count();
        $catCount = Category::count();
        $productCount = Product::count();
        $brands = Brand::all();
        $categories = Category::all();
        $tags = Tag::all();
        $tagProducts = Tag::with('products')->get();
        return view('product.create', compact('product','brandCount','catCount','tagProducts','productCount','brands','categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;
        $product = Product::create($this->setValidate($id));
        $product->tags()->syncWithoutDetaching($request->tag_id);
        $this->storeToUploads($product);
        return redirect('products')->with('success','Wow, သင် Product အသစ်တစ်ခု ထပ်ထည့်တာ အောင်မြင်ပါသည်');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $brandCount = Brand::count();
        $catCount = Category::count();
        $productCount = Product::count();
        $tagProducts = Tag::with('products')->get();
        return view('product.show', compact('product', 'brandCount','catCount','tagProducts','productCount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brandCount = Brand::count();
        $catCount = Category::count();
        $productCount = Product::count();
        $tagProducts = Tag::with('products')->get();
        $brands = Brand::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('product.edit', compact('product', 'brandCount','catCount','tagProducts','productCount','brands','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $id = $product->id;
        Storage::delete('public/'.$product->photo);
        $product->update($this->setValidate($id));
        $product->tags()->syncWithoutDetaching($request->tag_id);
        $this->storeToUploads($product);
        return redirect('products')->with('success','Wow, သင် Product အမည်အသစ် ပြောင်းလဲတာ အောင်မြင်ပါသည်');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // if (file_exists(public_path('storage/'.$product->photo))) {
        //     unlink(public_path('storage/'.$product->photo));
        // }
        Storage::delete('public/'.$product->photo);
        $product->delete();
        $product->tags()->detach();
        return redirect('products')->with('success','Product အဟောင်းကို ပယ်ဖျက်တာ အောင်မြင်ပါသည်');
    }
    public function setValidate($id)
    {
         return request()->validate([
            'product' => "required|string|max:255|unique:products,product,$id",
            'brand_id' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'cost' => 'required',
            'discount' => 'sometimes', 
            'description' => 'sometimes',
            'benefit' => 'sometimes',
            'weight' => 'sometimes',
            'photo' => 'sometimes|file|image|max:5000',
            'inStock' => 'required',
        ]);

    }
    public function storeToUploads($product)
    {
        if (request()->has('photo')) {
            $product->update([
                'photo' => request()->photo->store('uploads','public')
            ]);
            $photo = Image::make(public_path('storage/'.$product->photo))->fit(180,120);
            $photo->save();
        }
    }
}
