@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        @include('layouts.nav')
        <div class="col-8 ">
          @if (session()->has('fail'))
            <p class="alert alert-success text-center">{{session()->get('fail')}}</p>
          @endif
          <p class="font-weight-bold h4 mt-3 text-secondary">
            {{$product->product}}  အကြောင်းအသေးစိတ်
          </p>
          @can('view', $product)
          <div class="row d-flex ">
                <a href="/products/{{$product->id}}/edit" class="btn btn-outline-warning text-primary mr-3"><i class="fas fa-redo"></i> &nbsp; Product အချက်အလက် ပြန်ပြောင်းလိုပါက</a>
                <form action="/products/{{$product->id}}" method="post" >
                  @method('DELETE')
                  @csrf

                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="fas fa-times"></i> ပယ်ဖျက်လိုပါကနှိပ်ရန်
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle">{{$product->product}} ကို ပယ်ဖျက်ခြင်း</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          သင် ဒီ {{$product->product}} ကို ပယ်ဖျက်မှာ သေချာပြီလား ?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="far fa-thumbs-down"></i> မပယ်ဖျက်တော့ပါ</button>
                          <button type="submit" class="btn btn-danger"><i class="far fa-thumbs-up"></i> သေချာပါသည်</button>
                        </div>
                      </div>
                    </div>
                  </div>            

                </form>
            </div>
          @endcan
          <hr>

          <div class="row d-flex">
            <div class="col-4">
              @if ($product->photo)
                <img src="{{ asset('storage/'.$product->photo) }}" alt="..."  style="border-radius: 20px;">
              @else
                <img src="{{ asset('storage/uploads/pro.jpg') }}" alt="..." style="border-radius: 20px;">
              @endif
              @if ($product->inStock < 4 && $product->inStock != 0)
                <div class="alert alert-warning text-center mt-2 shadow-lg">သင့်ပစ္စည်းလက်ကျန် အရမ်းနည်းနေပါသည်</div>
              @elseif ($product->inStock === 0)
                <div class="alert alert-danger text-center mt-2 shadow-lg">ပစ္စည်းလက်ကျန် လုံးဝ မရှိတော့ပါ</div>
              @else
                <div class="alert alert-success text-center mt-2 shadow-lg">သင့်မှာ ပစ္စည်းလက်ကျန် {{$product->inStock}} ခု ကျန်ရှိပါသေးတယ်</div>
              @endif
              <hr>
              <form action="/sold" method="post" >
                @csrf
                      <input type="hidden" name="id" value="{{$product->id}}"> 
                    <div class="form-group ">
                      <label for="sold" class="text-primary font-weight-bold ">ရောင်းရသည့်အရေအတွက် </label>
                      <input type="number" class="form-control shadow-sm" name="sold" id="sold" placeholder="eg. 5" 
                      value="1">
                    </div>
                  @if ($errors->first('sold'))
                     <div class="alert alert-danger ">{{$errors->first('sold')}}</div>
                  @endif
                  <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i> စာရင်းသွင်းမည်</button>

              </form>
            </div>
            <div class="col-8 shadow-sm p-4">
                <div class="mb-2">
                  <strong>အမည်</strong> - <em class="text-success">{{$product->product}}</em>
                </div>
                <div  class="mb-2">
                  <strong>ရောင်းဈေး</strong> - <em class="text-danger font-weight-bold">{{$product->price}} ကျပ် </em>
                </div>
                <div  class="mb-2">
                  <strong>ဝယ်ဈေး</strong> - <em class="text-success">{{$product->cost}} ကျပ် </em>
                </div>
                <div  class="mb-2">
                  <strong>လျော့ဈေး</strong> - <em class="text-success">{{($product->price)*($product->discount/100)}} ကျပ် ( {{$product->discount}} % )</em>
                  <span class="badge badge-warning">... ( ဆယ်ခုဈေး အတွက်သာ )</span>
                </div>
                @if ($product->discount)
                  <div class="mb-2">
                    <strong>၁၀ ခုဈေး</strong> - <em class="text-success">{{(($product->price)-(($product->price)*($product->discount/100)))*10}} ကျပ် </em> 
                    <span class="badge badge-warning">... ( Discount ဈေး )</span>
                  </div>
                @endif
                <div class="mb-2">
                  <strong>အမြတ်ပမာဏ</strong> - <em class="text-success">{{($product->price)-($product->cost)}} ကျပ်</em>
                </div>
                <div  class="mb-2">
                  <strong>ပစ္စည်းလက်ကျန်အရေအတွက်</strong> - <em class="text-danger font-weight-bold">{{$product->inStock}} ခု</em>
                </div>
                <div class="mb-2">
                  <strong>နောက်ဆုံးရောင်းရသည့်နေ့</strong> - <em class="text-success">{{Carbon\Carbon::parse($product->updated_at)->isoFormat('LLLL')}}</em>
                </div>
                <div class="mb-2">
                  <strong>ထုတ်ကုန်အကြောင်းဖော်ပြချက်</strong>  - <em class="text-secondary">{{$product->description ?? 'N/A'}}</em>
                </div>
                <div  class="mb-2">
                  <strong>ကောင်းကျိုးများ</strong> - <em class="text-secondary">{{$product->benefit ?? 'N/A'}}</em>
                </div>
                <div  class="mb-2">
                  <strong>အလေးချိန်</strong> - <em class="text-success">{{$product->weight ?? 'N/A'}}</em>
                </div>
                <div  class="mb-2">
                  <strong>ထုတ်ကုန်တံဆိပ်</strong> - 
                    <a href="/brands/{{$product->brand->id}}" class="text-success font-italic"> {{$product->brand->brand }}</a>                    
                </div>
                <div  class="mb-2">
                  <strong>မျိုးကွဲခေါင်းစဉ်</strong> - 
                    <a href="/categories/{{$product->category->id}}" class="text-success font-italic"> {{$product->category->category }}</a>                    
                </div>
                <div  class="mb-2">
                  <strong>မျိုးတူရာတူရာများ</strong> - <em class="text-success">
                    @foreach ($product->tags as $tag)
                      <a href="/tags/{{$tag->id}}" class="text-success font-italic"> {{$tag->tag }},  &nbsp;</a>                  
                      
                    @endforeach
                  </em>
                </div>
                  
            </div>

        </div>
      </div>
        @include('layouts.side')
    </div>
</div>
@endsection
