@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        @include('layouts.nav')
        <div class="col-9 ">
            <p class="font-weight-bold h4 mb-2 text-secondary">
                လက်ကျန်ပြတ်နေပြီဖြစ်သော ကုန်ပစ္စည်းများ စာရင်း
            </p>
            <br>
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">နံပါတ်စဉ်</th>
                      <th scope="col">ထုတ်ကုန်အမည်</th>
                      <th scope="col">လက်ကျန်အရေအတွက်</th>
                      <th scope="col">ဈေးနှုန်း</th>
                      <th scope="col">နောက်ဆုံးရောင်းရရက်</th>
                    </tr>
                  </thead>
                  <tbody>
            @php
                $i = 0;
            @endphp          
                    @foreach ($outStockPagi as $product)
                    <tr>
                      <th scope="row">
                        @php
                        echo ++$i ;
                        @endphp
                      </th>
                      <td>
                        <a href="/products/{{$product->id}}" class="text-decoration-none">{{$product->product}}</a>                        
                      </td>
                      <td>{{$product->inStock}}</td>
                      <td>{{$product->price}}</td>
                      <td>{{Carbon\Carbon::parse($product->updated_at)->isoFormat('LLLL')}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>           
              {{$outStockPagi->links()}}
        </div>
    </div>
</div>
@endsection
