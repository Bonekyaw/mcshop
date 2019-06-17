@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        @include('layouts.nav')
        <div class="col-8 px-5 mt-3">
            <form action="/brands" method="post" >
              @csrf
              <h3><strong>Brand အမည် အသစ်ထည့်ရန်</strong></h3>
              <hr>
              @include('brand.form')
              <button type="submit" class="btn btn-primary shadow"><i class="fas fa-plus"></i> ထည့်သွင်းမည်</button>
              <a href="/brands"  class="btn btn-danger shadow"><i class="fas fa-times"></i> မထည့်သွင်းတော့ပါ</a>

            </form>
        </div>
        @include('layouts.side')
    </div>
</div>
@endsection
