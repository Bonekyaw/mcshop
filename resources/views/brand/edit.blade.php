@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        @include('layouts.nav')
        <div class="col-8 px-5 mt-3">
            <form action="/brands/{{$brand->id}}" method="post" >
              @method('PATCH')
              @csrf
              <h3><strong>Brand အမည် ပြန်ပြောင်းရန်</strong></h3>
              <hr>
              @include('brand.form')
              <button type="submit" class="btn btn-primary">ပြောင်းလဲမည်</button>

            </form>
        </div>
        @include('layouts.side')
    </div>
</div>
@endsection
