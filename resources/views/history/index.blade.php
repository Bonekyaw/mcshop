@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        @include('layouts.nav')
        <div class="col-9 ">
          @if (session()->has('success'))
            <p class="alert alert-success text-center">{{session()->get('success')}}</p>
          @endif
          <div class="row d-flex">
            <p class="font-weight-bold h4 mr-5 text-secondary">
                ရက်အလိုက် ရောင်းပြီး ကုန်ပစ္စည်းများ စာရင်း
            </p>
              <form action="/histories" method="post" class="row d-flex">
                @csrf
                    <div class="form-group mr-2">
                        <select class="form-control shadow-sm" id="day" name="day" >
                          <option value="">ရက်</option>
                          @for ($i = 1; $i < 32 ; $i++)
                            <option value="{{$i }}">{{$i }}</option>
                          @endfor
                        </select>
                    </div>
                    <div class="form-group mr-2">
                        <select class="form-control shadow-sm" id="month" name="month" >
                          <option value="">လ</option>
                          @for ($i = 1; $i < 13 ; $i++)
                            <option value="{{$i }}">{{$i }}</option>
                          @endfor
                        </select>
                    </div>
                    <div class="form-group mr-2">
                        <select class="form-control shadow-sm" id="year" name="year" >
                          <option value="">နှစ်</option>
                          <option value="2019">2019</option>
                          <option value="2019">2020</option>
                          <option value="2019">2021</option>
                          <option value="2019">2022</option>
                          <option value="2023">2023</option>
                          <option value="2024">2024</option>
                          <option value="2025">2025</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> ရှာဖွေမယ်</button>
                    </div>
              </form>
        @can('create', App\History::class)
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
              <i class="fas fa-times"></i> စာရင်းများကို ပယ်ဖျက်လိုပါက နှိပ်ရန်</button>
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title font-weight-bold " id="exampleModalLabel">လ အပိုင်းအခြားဖြင့် ပယ်ဖျက်ခြင်း</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <form action="/histories/delete" method="post">
                      @csrf
                      
                      <div class="form-group mr-2">
                        <label for="month" class="col-form-label">ဖျက်မယ့် လ ကို ရွေးချယ်ပေးပါ</label>
                        <select class="form-control shadow-sm" id="month" name="month" >
                          @php
                            $month = ['ဇန်နဝါရီ','ဖေဖော်ဝါရီ','မတ်','ဧပရယ်','မေ','ဇွန်','ဇူလှိုင်','ဩဂတ်','စက်တင်ဘာ','အောက်တိုဘာ','နိုဝင်ဘာ','ဒီဇင်ဘာ'];
                          @endphp
                          @for ($i = 0; $i < 12 ; $i++)
                            <option value="{{$i + 1 }}">{{$month[$i] }}</option>
                          @endfor
                        </select>
                      </div>
                      <div class="form-group mr-2">
                        <label for="year" class="col-form-label">ဖျက်မယ့် နှစ် ကို ရွေးချယ်ပေးပါ</label>
                        <select class="form-control shadow-sm" id="year" name="year" >
                          <option value="2019">2019</option>
                          <option value="2019">2020</option>
                          <option value="2019">2021</option>
                          <option value="2019">2022</option>
                          <option value="2023">2023</option>
                          <option value="2024">2024</option>
                          <option value="2025">2025</option>
                        </select>
                      </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-thumbs-down"></i> မဖျက်တော့ပါ</button>
                    <button type="submit" class="btn btn-danger"><i class="far fa-thumbs-up"></i> ပယ်ဖျက်မည်</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>          
        @endcan
          </div>

            <br>
          <div class="row ">

                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">နံပါတ်စဉ်</th>
                      <th scope="col">ထုတ်ကုန်အမည်</th>
                      <th scope="col">အရေအတွက်</th>
                      <th scope="col">ရောင်းရသည့်နေ့</th>
                      <th scope="col">အရောင်းဝန်ထမ်း</th>
                    </tr>
                  </thead>
                  <tbody>
            @php
                $i = 0;
            @endphp          
                    @foreach ($historyPagi as $history)
                    <tr>
                      <th scope="row">@php
                        echo ++$i ;
                      @endphp</th>
                      <td>{{$history->product->product}}</td>
                      <td>{{$history->quantity}}</td>
                      <td>{{Carbon\Carbon::parse($history->created_at)->isoFormat('LLLL')}}</td>
                      <td>{{$history->user->name}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>           

          </div>
          <div class="mt-2">
               {{$historyPagi->links()}}
          </div>

        </div>
    </div>
</div>
@endsection
