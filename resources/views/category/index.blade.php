@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        @include('layouts.nav')
        <div class="col-9 ">
          @if (session()->has('success'))
            <p class="alert alert-success text-center">{{session()->get('success')}}</p>
          @else
            <p class="font-weight-bold h4 text-secondary">
                Category မျိုးကွဲများ 
            </p>
            <hr>
          @endif
          <div class="row d-flex">

           @foreach ($catPagi as $category)
                <div class=" m-1 text-center d-flex flex-column justify-content-center" style="width: 10rem;border-radius: 20px; height: 100px; background: url({{ asset('storage/uploads/cat.jpg')  }});">
                   <a href="/categories/{{$category->id}}" class=" font-weight-bold text-white h4 text-decoration-none" 
                    style="border-radius: 18px;">{{$category->category}}</a>                              
                  <a href="/categories/{{$category->id}}" class="text-warning font-weight-bold text-decoration-none">{{$category->products()->count()}}</a>
                </div>

           @endforeach

          </div>
          <div class="mt-2">
               {{$catPagi->links()}}
          </div>

        </div>
    </div>
</div>
@endsection
