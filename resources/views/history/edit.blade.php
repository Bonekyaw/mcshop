@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        @include('layouts.nav')
        <div class="col-8 px-5 mt-3">
          @if (session()->has('fail'))
            <p class="alert alert-success text-center">{{session()->get('fail')}}</p>
          @endif
            <h3 class="text-secondary font-weight-bold">(ရောင်းပြီး) 
              <a href="/products/{{$history->product->id}}"  class="text-decoration-none">{{$history->product->product}} </a>
            </h3>
            <div class="mt-3">
              
            </div>
              <form action="/histories/{{$history->id}}/delete" method="post" >
                @csrf
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter">
                  <i class="fas fa-times"></i> ဒီစာရင်းကို ပယ်ဖျက်လိုပါကနှိပ်ရန်
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle"> (ရောင်းပြီး) {{$history->product->product}} ကို ပယ်ဖျက်ခြင်း</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        သင် ဒီ စာရင်း ကို ပယ်ဖျက်မှာ သေချာပြီလား ?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="far fa-thumbs-down"></i> မပယ်ဖျက်တော့ပါ</button>
                        <button type="submit" class="btn btn-danger"><i class="far fa-thumbs-up"></i> သေချာပါသည်</button>
                      </div>
                    </div>
                  </div>
                </div>            
                
              </form>

            <hr>
            <div class="">
               <p>ရောင်းရသည့်နေ့ - {{Carbon\Carbon::parse($history->created_at)->isoFormat('LLLL')}} </p>
               <p>ရောင်းဈေး - {{$history->product->price}} ကျပ် </p>
               <p>ရောင်းရသည့် အရေအတွက် - {{$history->quantity}} ခု </p>
            </div>

            <form action="/histories/{{$history->id}}/update" method="post" >
              @csrf
              <div class="form-group">
                <label for="quantity" class="text-info h5 font-weight-bold "> ရောင်းပြီး အရေအတွက်ကို ပြောင်းလဲရန်</label>
                <input type="number" class="form-control shadow-sm mt-3" id="quantity" name="quantity" 
                 value="{{ $history->quantity}}">
              </div>
              @if ($errors->first('history'))
                 <div class="alert alert-danger ">{{$errors->first('history')}}</div>
              @endif

              <button type="submit" class="btn btn-primary shadow"><i class="fas fa-check"></i> ပြောင်းလဲမည်</button>
              <a href="/home"  class="btn btn-danger shadow"><i class="fas fa-times"></i> မပြောင်းလဲတော့ပါ</a>

            </form>
        </div>
        @include('layouts.side')
    </div>
</div>
@endsection
