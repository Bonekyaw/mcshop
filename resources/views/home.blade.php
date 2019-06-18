@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
    	@include('layouts.mainNav')
            <div class="col-3">
            	<h6><strong>ယနေ့ရောင်းအား</strong></h6>
            	<div class="progress mb-2">
					  <div class="progress-bar progress-bar-striped progress-bar-animated {{$today > 30 ? 'bg-success' : 'bg-warning'}}" role="progressbar" 
					  aria-valuenow="{{$today }}" 
					  aria-valuemin="0" aria-valuemax="100" style="width: {{$today}}%">
					  	{{$today}} %
					  </div>
				</div>
            	<h6><strong>ယမန်နေ့ရောင်းအား</strong></h6>
            	<div class="progress mb-2">
					  <div class="progress-bar progress-bar-striped progress-bar-animated {{$yesterday > 30 ? 'bg-success' : 'bg-warning'}}" role="progressbar" 
					  aria-valuenow="{{$yesterday }}" 
					  aria-valuemin="0" aria-valuemax="100" style="width: {{$yesterday}}%">
					  	{{$yesterday}} %
					  </div>
				</div>
            	<h6><strong>မနက်ဖြန်ရောင်းအား (ဗေဒင်)</strong></h6>
            	@php
            		$rand = mt_rand(25,100);
            	@endphp
            	<div class="progress mb-2">
					  <div class="progress-bar progress-bar-striped progress-bar-animated {{ $rand > 30 ? 'bg-success' : 'bg-warning'}}" role="progressbar" 
					  aria-valuenow="{{$rand }}" 
					  aria-valuemin="0" aria-valuemax="100" style="width: {{$rand}}%">
					  	{{$rand}} %
					  </div>
				</div>
            </div>
            <div class="col-8">
            	<p>Hi Hi Hi</p>
            </div>
    </div>
</div>
@endsection
