@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        @include('layouts.nav')
        <div class="col-8 ">
          @if (session()->has('success'))
            <p class="alert alert-success text-center">{{session()->get('success')}}</p>
          @else
            <p class="font-weight-bold h4 ">
                Product ထုတ်ကုန်များ ပြသခြင်း
            </p>
            <hr>
          @endif
          @foreach ($products as $product)
              @if ($product->inStock < 5 && $product->inStock != 0)
                <div class="bg-warning text-center py-1 text-danger">{{$product->product}} မှာ ပစ္စည်းလက်ကျန် {{$product->inStock}} ခုသာ ကျန်ရှိပါတော့တယ်</div>
              @elseif ($product->inStock === 0)
                <div class="bg-danger text-center py-1 text-warning">{{$product->product}} မှာ ပစ္စည်းလက်ကျန် လုံးဝ မရှိတော့ပါ</div>
              @else
              @endif
          @endforeach

          <div class="row d-flex">

           @foreach ($products as $product)

              @if ($product->photo)
                <div class=" card m-2 " style="width: 14rem;border-radius: 20px; height: 200px; background: url({{ asset('storage/'.$product->photo)  }});">
              @else
                <div class=" card m-2" style="width: 14rem;border-radius: 20px; height: 200px; background: url({{ asset('storage/uploads/pro.jpg')  }});">
              @endif
                  <div class="card-body d-flex flex-column justify-content-end text-center">
                        <a href="/products/{{$product->id}}" class=" font-weight-bold text-white h3 " style="text-decoration: none;">
                          {{$product->product}} <small class="h6">({{$product->inStock}})</small>
                        </a>
                        <a href="/products/{{$product->id}}" class="btn btn-success font-weight-bold h4">{{$product->price}}</a>            
                  </div>
                </div>
           @endforeach

          </div>
          <div class="mt-2">
               {{$products->links()}}
          </div>

        </div>
        @include('layouts.side')
    </div>
</div>
@endsection
