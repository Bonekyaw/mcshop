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
                စာရင်း ပြန်ပြင်ထားသော ကုန်ပစ္စည်းများ စာရင်း
            </p>
          </div>

            <br>
          <div class="row ">

                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">ထုတ်ကုန်အမည်</th>
                      <th scope="col">အရေအတွက်</th>
                      <th scope="col">ရောင်းရသည့်နေ့</th>
                      <th scope="col">ပြန်ပြင်သည့်နေ့</th>
                      <th scope="col">အရောင်းဝန်ထမ်း</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($historyPagi as $history)
                    <tr>
                      <td>
                        <a href="/histories/{{$history->id}}/edit" class="text-decoration-none">{{$history->product->product}}</a>                        
                      </td>
                      <td>{{$history->quantity}}</td>
                      <td>{{Carbon\Carbon::parse($history->created_at)->isoFormat('LLLL')}}</td>
                      <td>{{Carbon\Carbon::parse($history->updated_at)->isoFormat('D,M,Y')}}</td>
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
