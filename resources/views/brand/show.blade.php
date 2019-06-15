@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        @include('layouts.nav')
        <div class="col-9 ">
          @if (session()->has('success'))
            <p class="alert alert-success text-center">{{session()->get('success')}}</p>
          @endif
          <p class="font-weight-bold h4 mt-3">
            {{$brand->brand}} နှင့် ပတ်သက်သော ထုတ်ကုန်များ 
            <a href="/brands/{{$brand->id}}/edit" class="h6 text-danger bg-warning ">Brand အမည်ပြန်ပြောင်းလိုပါက</a>
            <form action="/brands/{{$brand->id}}" method="post" >
              @method('DELETE')
              @csrf
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter">
                ပယ်ဖျက်လိုပါကနှိပ်ရန်
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">{{$brand->brand}} ကို ပယ်ဖျက်ခြင်း</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      သင် ဒီ {{$brand->brand}} ကို ပယ်ဖျက်မှာ သေချာပြီလား ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">မပယ်ဖျက်တော့ပါ</button>
                      <button type="submit" class="btn btn-danger">သေချာပါသည်</button>
                    </div>
                  </div>
                </div>
              </div>            
              
            </form>
          </p>
          <hr>

          <div class="row d-flex">

           @foreach ($brand->products as $product)

            <div class=" mb-3 ml-2 mr-3 d-flex flex-column  text-center">
              @if ($product->photo)
                <div  style="width: 11rem;margin: 5px;padding-top: 65px;border-radius: 20px; height: 110px; background: url({{ asset('storage/'.$product->photo)  }});">
              @else
                <div  style="width: 11rem;margin: 5px;padding-top: 65px;border-radius: 20px; height: 110px; background: url({{ asset('storage/uploads/pro.jpg')  }});">
              @endif
              @if ($product->inStock === 0)
                   <a href="/products/{{$product->id}}" class="btn btn-danger font-weight-bold text-warning h4" 
                    style="border-radius: 12px;">{{$product->price}} Ks | Qt - {{$product->inStock}}</a>
              @else                              
                   <a href="/products/{{$product->id}}" class="btn btn-warning font-weight-bold text-danger h4" 
                    style="border-radius: 12px;">{{$product->price}} Ks | Qt - {{$product->inStock}}</a>                              
              @endif
                  
                </div>
                <a href="/products/{{$product->id}}" class=" btn btn-outline-primary font-weight-bold h3 mx-3 " style="border-radius: 12px;">
                   {{mb_substr($product->product, 0,11)}}
                </a>
            </div>

          @endforeach

        </div>
</div>
    </div>
</div>
@endsection
