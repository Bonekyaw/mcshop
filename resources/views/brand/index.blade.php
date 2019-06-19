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
                Brand တံဆိပ်များ 
            </p>
            <hr>
          @endif
          <div class="row d-flex">

           @foreach ($brandPagi as $brand)

                <div class=" m-1 text-center d-flex flex-column justify-content-center" style="width: 10rem;border-radius: 20px; height: 100px; background: url({{ asset('storage/uploads/brand.jpg')  }});">
                   <a href="/brands/{{$brand->id}}" class=" font-weight-bold text-white h4 text-decoration-none" 
                    style="border-radius: 18px;">{{$brand->brand}}</a>                              
                  <a href="/brands/{{$brand->id}}" class="text-warning font-weight-bold text-decoration-none">{{$brand->products()->count()}}</a>
                </div>

           @endforeach

          </div>
          <div class="mt-2">
               {{$brandPagi->links()}}
          </div>

        </div>
    </div>
</div>
@endsection
