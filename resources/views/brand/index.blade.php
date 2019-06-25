@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        @include('layouts.nav')
        <div class="col-8 ">
          @if (session()->has('success'))
            <p class="alert alert-success text-center">{{session()->get('success')}}</p>
          @endif
            <p class="font-weight-bold h4 text-secondary">
                Brand တံဆိပ်များ 
            </p>
            <hr>


                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th scope="col">တံဆိပ်အမည်</th>
                      <th scope="col">ထုတ်ထားသောပစ္စည်းများ စုစုပေါင်း</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($brandPagi as $brand)
                    <tr>
                      <td>
                      </td>
                      <td>
                            <a href="/brands/{{$brand->id}}" class=" text-decoration-none " 
                            >{{$brand->brand}}</a>                      
                      </td>
                      <td>
                            {{$brand->products()->count()}}
                      </td>
                      <td>
                           @can('update', $brand)
                                  <a href="/brands/{{$brand->id}}" class="btn btn-success "> ပစ္စည်းကြည့်မယ်</a>
                                  <a href="/brands/{{$brand->id}}/edit" class="btn btn-primary "> အမည်ပြောင်းမယ်</a>
                          @endcan

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="mt-4">
                      {{$brandPagi->links()}}
                </div>           
 

          </div>
          @include('layouts.side')
    </div>
</div>
@endsection
