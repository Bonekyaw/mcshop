@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        @include('layouts.nav')
        <div class="col-8 ">
          @if (session()->has('success'))
            <p class="alert alert-success text-center">{{session()->get('success')}}</p>
          @endif
          <p class="font-weight-bold h4 mt-3">
            {{$product->product}}  အကြောင်းအသေးစိတ်
            <a href="/products/{{$product->id}}/edit" class="h6 text-danger bg-warning ">Product အချက်အလက် ပြန်ပြောင်းလိုပါက</a>
            <form action="/products/{{$product->id}}" method="post" >
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
                      <h5 class="modal-title" id="exampleModalCenterTitle">{{$product->product}} ကို ပယ်ဖျက်ခြင်း</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      သင် ဒီ {{$product->product}} ကို ပယ်ဖျက်မှာ သေချာပြီလား ?
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
            <div class="col-4">
              @if ($product->photo)
                <img src="{{ asset('storage/'.$product->photo) }}" alt="..."  style="border-radius: 20px;">
              @else
                <img src="{{ asset('storage/uploads/pro.jpg') }}" alt="..." style="border-radius: 20px;">
              @endif
              @if ($product->inStock < 5 && $product->inStock != 0)
                <div class="alert alert-warning text-center mt-2 shadow-lg">သင့်ပစ္စည်းလက်ကျန် အရမ်းနည်းနေပါသည်</div>
              @elseif ($product->inStock === 0)
                <div class="alert alert-danger text-center mt-2 shadow-lg">ပစ္စည်းလက်ကျန် လုံးဝ မရှိတော့ပါ</div>
              @else
                <div class="alert alert-success text-center mt-2 shadow-lg">သင့်မှာ ပစ္စည်းလက်ကျန် {{$product->inStock}} ခု ကျန်ရှိပါသေးတယ်</div>
              @endif
            </div>
            <div class="col-8">
                <div  style="padding: 10px;border-radius: 6px;background: #efefef;color: #555;font-weight:bold;margin-bottom: 10px;">
                  အမည် - <em>{{$product->product}}</em>
                </div>
                <div  style="padding: 10px;border-radius: 6px;background: #efefef;color: #555;font-weight:bold;margin-bottom: 10px;">
                  ရောင်းဈေး - <em>{{$product->price}} ကျပ် </em>
                </div>
                <div  style="padding: 10px;border-radius: 6px;background: #efefef;color: #555;font-weight:bold;margin-bottom: 10px;">
                  ဝယ်ဈေး - <em>{{$product->cost}} ကျပ် </em>
                </div>
                <div  style="padding: 10px;border-radius: 6px;background: #efefef;color: #555;font-weight:bold;margin-bottom: 10px;">
                  လျော့ဈေး - <em>{{($product->price)*($product->discount/100)}} ကျပ် ( {{$product->discount}} % )</em>... ( ဆယ်ခုဈေး အတွက်သာ )
                </div>
                @if ($product->discount)
                  <div  style="padding: 10px;border-radius: 6px;background: #efefef;color: #555;font-weight:bold;margin-bottom: 10px;">
                    ၁၀ ခုဈေး - <em>{{(($product->price)-(($product->price)*($product->discount/100)))*10}} ကျပ် </em> ... ( Discount ဈေး )
                  </div>
                @endif
                <div  style="padding: 10px;border-radius: 6px;background: #efefef;color: #555;font-weight:bold;margin-bottom: 10px;">
                  အမြတ်ပမာဏ - <em>{{($product->price)-($product->cost)}} ကျပ်</em>
                </div>
                <div  style="padding: 10px;border-radius: 6px;background: #efefef;color: #555;font-weight:bold;margin-bottom: 10px;">
                  ပစ္စည်းလက်ကျန်အရေအတွက် - <em>{{$product->inStock}} ခု</em>
                </div>
                <div  style="padding: 10px;border-radius: 6px;background: #efefef;color: #555;font-weight:bold;margin-bottom: 10px;">
                  နောက်ဆုံးရောင်းရသည့်နေ့ - <em>{{Carbon\Carbon::parse($product->updated_at)->isoFormat('LLLL')}}</em>
                </div>
                <div  style="padding: 10px;border-radius: 6px;background: #efefef;color: #555;font-weight:bold;margin-bottom: 10px;">
                  {{$product->product}} အကြောင်းဖော်ပြချက် - <em>{{$product->description}}</em>
                </div>
                <div  style="padding: 10px;border-radius: 6px;background: #efefef;color: #555;font-weight:bold;margin-bottom: 10px;">
                  အမည် - <em>{{$product->product}}</em>
                </div>
                  
            </div>

        </div>
      </div>
        @include('layouts.side')
    </div>
</div>
@endsection
