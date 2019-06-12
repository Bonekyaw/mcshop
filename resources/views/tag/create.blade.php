@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        @include('layouts.nav')
        <div class="col-8 px-5 mt-3">
            <form action="/tags" method="post" >
              @csrf
              <h3><strong>Tag အမည် အသစ်ထည့်ရန်</strong></h3>
              <hr>
              @include('tag.form')
              <button type="submit" class="btn btn-primary">ထည့်သွင်းမည်</button>

            </form>
        </div>
        @include('layouts.side')
    </div>
</div>
@endsection
