@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        @include('layouts.nav')
        <div class="col-9 ">
          @if (session()->has('success'))
            <p class="alert alert-success text-center">{{session()->get('success')}}</p>
          @else
            <p class="font-weight-bold h4 text-secondary">
                Product ထုတ်ကုန်များ ပြသခြင်း
            </p>
            <hr>
          @endif
{{--           @foreach ($products as $product)
              @if ($product->inStock < 5 && $product->inStock != 0)
                <div class="bg-warning text-center py-1 mb-sm-1 text-danger">{{$product->product}} မှာ ပစ္စည်းလက်ကျန် {{$product->inStock}} ခုသာ ကျန်ရှိပါတော့တယ်</div>
              @elseif ($product->inStock === 0)
                <div class="bg-danger text-center py-1 mb-sm-1 text-warning">{{$product->product}} မှာ ပစ္စည်းလက်ကျန် လုံးဝ မရှိတော့ပါ</div>
              @else
              @endif
          @endforeach
 --}}
          <div class="row d-flex">

           @foreach ($productPagi as $product)

            <div class=" mb-3 ml-2 mr-3 d-flex flex-column  text-center">
              @if ($product->photo)
                <div  style="width: 11rem;margin: 5px;padding-top: 65px;border-radius: 20px; height: 110px; background: url({{ asset('storage/'.$product->photo)  }});">
              @else
                <div  style="width: 11rem;margin: 5px;padding-top: 65px;border-radius: 20px; height: 110px; background: url({{ asset('storage/uploads/pro.jpg')  }});">
              @endif
              @if ($product->inStock === 0 )
                   <a href="/products/{{$product->id}}" class="btn btn-danger font-weight-bold text-warning h4" 
                    style="border-radius: 12px;">{{$product->price}} Ks   ( {{$product->inStock}} )</a>
              @else                              
                   <a href="/products/{{$product->id}}" class="btn btn-warning font-weight-bold text-danger h4" 
                    style="border-radius: 12px;">{{$product->price}} Ks   ( {{$product->inStock}} )</a>                              
              @endif
                  
                </div>
                <a href="/products/{{$product->id}}" class=" btn btn-outline-primary font-weight-bold h3 mx-3 " style="border-radius: 12px;">
                   {{mb_substr($product->product, 0,16)}}
                </a>
            </div>

          @endforeach

        </div>
          <div class="mt-2">
               {{$productPagi->links()}}
          </div>

        </div>
    </div>
</div>
@endsection
