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
				<hr>
				<div class="font-weight-bold shadow p-3 text-secondary" style="border-radius: 28px;">
					ယနေ့ ရောင်းရငွေပေါင်း = <em class="text-success">{{$total}} Ks</em> 
				</div>
				<hr>

				<div class="my-4">
	               <p class="font-weight-bold h5 pb-2 text-secondary"> <i class="fas fa-tags"></i> မျိုးတူရာ Tags အုပ်စု</p>
	              <div class="row d-flex ">
	                @foreach ($tagProducts as $tagProduct)
	                  <form action="/tags/{{$tagProduct->id}}" method="get" class="m-1">                    
	                    <button type="submit" class="btn btn-outline-success">{{$tagProduct->tag}}</button>            
	                  </form>
	                @endforeach
	              </div>
            	</div>        

            </div>

            <div class="col-6">
            <p class="font-weight-bold h4 my-2 text-secondary">
                သင်ရှာဖွေထားသော ကုန်ပစ္စည်းများ စာရင်း 
                @isset ($products)
	                - ( {{$products->count()}}  )
            	@endisset 
                
            </p>
            <br>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">ထုတ်ကုန်အမည်</th>
                      <th scope="col">ဈေးနှုန်း</th>
                      <th scope="col">လက်ကျန်</th>
                    </tr>
                  </thead>
                  <tbody id="tbody">
            @isset ($products)
                      @foreach ($products as $product)
                    <tr>
                      <td scope="row">
			              @if ($product->photo)
			                <img src="{{ asset('storage/'.$product->photo) }}" alt="..."  style="border-radius: 10px;width: 60px;height: 40px;">
			              @else
			                <img src="{{ asset('storage/uploads/pro.jpg') }}" alt="..." style="border-radius: 10px;width: 60px;height: 40px;">
			              @endif
                      </td>
                      <td>
                        <a href="/products/{{$product->id}}" class="text-decoration-none">{{$product->product}}</a>                        
                      </td>
                      <td>{{$product->price}}</td>
                      <td>{{$product->inStock}}</td>
                    </tr>
                    @endforeach
            @endisset
             </tbody>
                </table>           
            @isset ($products)
	             {{$products->links()}}
            @endisset
            </div>

            <div class="col-3">
				<ul class="list-group list-group-flush shadow-sm mb-3 ">
				  <li class="list-group-item font-weight-bold text-primary">
				  	<div class="spinner-grow spinner-grow-sm text-primary" role="status">
					  <span class="sr-only">Loading...</span>
					</div> 
					ယနေ့ အရောင်းစာရင်း ( {{$histories->count() ?? ''}} )
				  </li>
				  @php
				  	$i = 0;
				  @endphp
					  @foreach ($histories as $history)
						  @php
						  	$i++;
						  @endphp
							  @if ($i < 8)
								  <li class="list-group-item">
								  		<div class="d-flex w-100 justify-content-between">
							      			<a href="/products/{{$history->product->id}}" class="mb-1 text-decoration-none">{{$history->product->product}}</a>
							      			<small >{{$history->created_at->diffForHumans()}}</small>
							    		</div>
							    		<small class="mb-1 ">{{$history->quantity}} ခု ရောင်းရပါသည်</small>
								  </li>
							  @endif
					  @endforeach
				</ul>
		        <form action="/histories" method="post">
		             	@csrf
		                  	
					  <div class="form-group">
					    <input type="hidden" name="day" value="{{ now()->isoFormat('D')}}">
					    <input type="hidden" name="month" value="{{ now()->isoFormat('M')}}">
					    <input type="hidden" name="year" value="{{ now()->isoFormat('YYYY')}}">
					    <button type="submit" class="btn btn-light">
					    	<i class="fas fa-arrow-circle-right" ></i> &nbsp; ဆက်ကြည့်လိုပါကနှိပ်ရန် &nbsp;
					    	<span class="badge badge-primary badge-pill">{{$histories->count() ?? ''}}</span>
					    </button>
					  </div>
		        </form>

			</div>
    </div>
</div>


@endsection
