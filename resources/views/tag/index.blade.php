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
                Tag မျိုးတူရာတူရာ ပေါင်းစုခြင်း
            </p>
            <hr>
          @endif
          <div class="row d-flex">

           @foreach ($tags as $tag)

                <div class="col-3 card text-white text-center p-4 m-3 " 
                style="background-image: url({{ asset('storage/uploads/tag.jpg') }}); background-size: cover;border-radius: 15px;">
                        <a href="/tags/{{$tag->id}}" class=" font-weight-bold h5 " style="text-decoration: none;">{{$tag->tag}}</a>
                        <p class="font-weight-bold font-italic text-dark h4">25</p>
                </div>       

           @endforeach

          </div>
          <div class="mt-2">
               {{$tags->links()}}
          </div>

        </div>
        @include('layouts.side')
    </div>
</div>
@endsection
