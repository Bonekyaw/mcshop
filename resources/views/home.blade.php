@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        @include('layouts.nav')
        <div class="col-8 ">
          <div class="row d-flex">
            <h5>Something</h5>
          </div>
        </div>
        @include('layouts.side')
    </div>
</div>
@endsection
