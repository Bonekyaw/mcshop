@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        @include('layouts.nav')
        <div class="col-9 ">
          @if (session()->has('success'))
            <p class="alert alert-success text-center">{{session()->get('success')}}</p>
          @endif
            <p class="font-weight-bold h4 text-secondary">
                Tag မျိုးတူရာတူရာ ပေါင်းစုခြင်း
            </p>
            <hr>
          <div class="row d-flex">

           @foreach ($tagPagi as $tag)
                <div class=" m-1 text-center d-flex flex-column justify-content-center" style="width: 10rem;border-radius: 20px; height: 100px; background: url({{ asset('storage/uploads/tag.jpg')  }});">
                   <a href="/tags/{{$tag->id}}" class=" font-weight-bold text-white h4" 
                    style="border-radius: 18px;">{{$tag->tag}}</a>                              
                  <a href="/tags/{{$tag->id}}" class="text-warning font-weight-bold">{{$tag->products()->count()}}</a>
                </div>

           @endforeach

          </div>
          <div class="mt-2">
               {{$tagPagi->links()}}
          </div>

        </div>
    </div>
</div>
@endsection
