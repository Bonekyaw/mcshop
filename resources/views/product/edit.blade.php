@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        @include('layouts.nav')
        <div class="col-8 px-5 mt-3">
            <form action="/products/{{$product->id}}" method="post" enctype="multipart/form-data">
              @method('PATCH')
              @csrf
              <h3 class="text-secondary font-weight-bold">Product အမည် ပြန်ပြောင်းရန်</h3>
              <hr>
              @include('product.form')
              <button type="submit" class="btn btn-primary shadow"><i class="fas fa-check"></i> ပြောင်းလဲမည်</button>
              <a href="/products"  class="btn btn-danger shadow"><i class="fas fa-times"></i> မပြောင်းလဲတော့ပါ</a>

            </form>
        </div>
        @include('layouts.side')
    </div>
</div>
@endsection
