@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        @include('layouts.nav')
        <div class="col-8 ">
          @if (session()->has('success'))
            <p class="alert alert-success text-center">{{session()->get('success')}}</p>
          @endif
          <p class="font-weight-bold h4 mt-3">
            {{$tag->tag}} နှင့် ပတ်သက်သော ထုတ်ကုန်များ 
            <a href="/tags/{{$tag->id}}/edit" class="h6 text-danger bg-warning ">Tag အမည်ပြန်ပြောင်းလိုပါက</a>
            <form action="/tags/{{$tag->id}}" method="post" >
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-outline-danger">ပယ်ဖျက်လိုပါကနှိပ်ရန်</button>
              
            </form>
          </p>
          <hr>

          <div class="row d-flex">
                <div class="col-3 card bg-primary text-primary text-center p-4 m-3 " 
                style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/Nature/full page/img(20).jpg'); background-size: cover;">
                        <a href="/tags/{{$tag->id}}" class=" font-weight-bold h5 " style="text-decoration: none;">{{$tag->tag}}</a>
                        <p class="font-weight-bold font-italic text-warning">25</p>
                </div>       

        </div>
      </div>
        @include('layouts.side')
    </div>
</div>
@endsection
