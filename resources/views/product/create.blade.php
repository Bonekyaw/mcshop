@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        @include('layouts.nav')
        <div class="col-8 px-5 mt-3">
            <form action="/products" method="post" enctype="multipart/form-data">
              @csrf
              <h3><strong>Product အမည် အသစ်ထည့်ရန်</strong></h3>
              <hr>
              @include('product.form')
              <button type="submit" class="btn btn-primary shadow">ထည့်သွင်းမည်</button>

            </form>
        </div>
        @include('layouts.side')
    </div>
</div>
@endsection
