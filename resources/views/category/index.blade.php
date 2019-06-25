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
                Category မျိုးကွဲများ 
            </p>
            <hr>
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th scope="col">မျိုးကွဲအမည်</th>
                      <th scope="col">ပစ္စည်းများ စုစုပေါင်း</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($catPagi as $category)
                    <tr>
                      <td>
                      </td>
                      <td>
                            <a href="/categories/{{$category->id}}" class=" text-decoration-none " 
                            >{{$category->category}}</a>                      
                      </td>
                      <td>
                            {{$category->products()->count()}}
                      </td>
                      <td>
                           @can('update', $category)
                                  <a href="/categories/{{$category->id}}" class="btn btn-success "> ပစ္စည်းကြည့်မယ်</a>
                                  <a href="/categories/{{$category->id}}/edit" class="btn btn-primary "> အမည်ပြောင်းမယ်</a>
                          @endcan

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="mt-4">
                      {{$catPagi->links()}}
                </div>           
 

          </div>
          @include('layouts.side')
    </div>
</div>
@endsection
