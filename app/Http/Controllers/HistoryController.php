<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Tag;
use App\Product;
use App\History;
use Illuminate\Http\Request;
use App\Events\ProductEvent;


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
        $historyPagi = History::with(['product:id,product','user:id,name'])->orderBy('created_at','desc')->limit(60)->paginate(15);
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
    public function edit(History $history)
    {
        // $this->authorize('update',$history);
        $brandCount = Brand::count();
        $catCount = Category::count();
        $productCount = Product::count();
        $tagProducts = Tag::all();
        $historyCount = History::count();
        $bellNoti = Product::where('inStock','<',4)->count();
        return view('history.edit', compact('history','catCount','brandCount','tagProducts','productCount','historyCount','bellNoti'));
    }
    public function update(History $history)
    {
        $quantityEdited = request()->quantity;
        $quantityBefore = $history->quantity;
        $quantityBetween = $quantityBefore - $quantityEdited;
        $product = $history->product;
        $productStock = $product->inStock;

        if ($quantityEdited > 0 && (($productStock + $quantityBefore) - $quantityEdited) >= 0 ) {
            $history->update(['quantity' => $quantityEdited]);
            event(new ProductEvent($product, $quantityBetween));
            return redirect('home');
        } else {
            return back()->with('fail','သင် အရောင်းစာရင်းသွင်းတာ တခုခု လွဲမှားနေပါသည်... ပစ္စည်းလက်ကျန်စစ်ပါ');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $history)
    {
        $product = $history->product;
        $quantityBetween = $history->quantity;
        $this->authorize('delete',$history);
        $history->delete();
        event(new ProductEvent($product, $quantityBetween));
        return redirect('home');
    }
    public function displayEdited()
    {
        $historyPagi = History::with(['product:id,product','user:id,name'])->whereColumn('updated_at','>','created_at')->orderBy('updated_at','desc')->paginate(15);
        $brandCount = Brand::count();
        $catCount = Category::count();
        $productCount = Product::count();
        $tagProducts = Tag::all();
        $historyCount = History::count();
        $bellNoti = Product::where('inStock','<',4)->count();
        return view('history.displayEdited', compact('historyPagi','catCount','brandCount','tagProducts','productCount','historyCount','bellNoti'));
    }
}
