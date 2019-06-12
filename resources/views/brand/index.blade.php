@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        @include('layouts.nav')
        <div class="col-8 ">
          @if (session()->has('success'))
            <p class="alert alert-success text-center">{{session()->get('success')}}</p>
          @else
            <p class="font-weight-bold h4 ">
                Brand တံဆိပ်များ 
            </p>
            <hr>
          @endif
          <div class="row d-flex">

           @foreach ($brands as $brand)

                <div class="col-3 card bg-primary text-primary text-center p-4 m-3 " 
                style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/Nature/full page/img(20).jpg'); background-size: cover;">
                        <a href="/brands/{{$brand->id}}" class=" font-weight-bold h5 " style="text-decoration: none;">{{$brand->brand}}</a>
                        <p class="font-weight-bold font-italic text-warning">25</p>
                </div>       

           @endforeach

          </div>
          <div class="mt-2">
               {{$brands->links()}}
          </div>

        </div>
        @include('layouts.side')
    </div>
</div>
@endsection
