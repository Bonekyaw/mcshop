@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-3">
	            <form  action="/search" method="post">
	            	@csrf            	
	                  <div class="form-group">
	                    <input type="text" class="form-control shadow" aria-describedby="emailHelp" id="search" name="search" placeholder="ဒီနေရာမှာ စာရိုက်ရှာပါ" value="" required>
	                  </div>
	            </form>
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
	            <div class="mt-1 mb-3 p-3 font-weight-bold shadow-sm" style="border-radius: 10px;">
		            <a href="/histories/edited" class="text-decoration-none text-success">
		            	<i class="fas fa-arrow-circle-right" ></i> &nbsp; ပြန်ပြင်ထားသော အရောင်းစာရင်း
		            </a>
	            </div>

        </div>


		<div class="col-9  ">
		     @empty ($products)               
            	{{-- Carousel start --}}
            	<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <img src="{{ asset('storage/uploads/tag.jpg') }}" class="d-block w-100" alt="..." style="border-radius: 30px;">
				    </div>
				    <div class="carousel-item">
				      <img src="{{ asset('storage/uploads/cat.jpg') }}" class="d-block w-100" alt="..." style="border-radius: 30px;">
				    </div>
				    <div class="carousel-item">
				      <img src="{{ asset('storage/uploads/tag.jpg') }}" class="d-block w-100" alt="..." style="border-radius: 30px;">
				    </div>
				  </div>
				  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
            	{{-- Carousel end --}}
            	<hr>

			        <div class="my-5 text-center h4 font-weight-bold " style="animation: bounceIn 3s;">
			            <span class="bg-success text-white p-4 shadow-lg" style="border-radius: 15px;">မင်္ဂလာပါရှင် ... MC Shop မှ ကြိုဆိုပါတယ်</span>
			        </div>
					<li style="list-style-type: none;font-weight: bold;">
						<div class="spinner-grow spinner-grow-sm text-primary" role="status">
						  <span class="sr-only">Loading...</span>
						</div>	
						ယနေ့ အရောင်းစာရင်း ( {{$histories->count() ?? ''}} )
					</li>
	            <div class=" d-flex flex-wrap mt-2" >
            @endempty

		    @isset ($products)
		          <div class="row ">    	
        			<div class="col-8">

			            <p class="font-weight-bold h4 my-2 text-secondary">
				               သင်ရှာဖွေထားသော ကုန်ပစ္စည်းများ စာရင်း  - ( {{$products->count()}}  )
			            </p>
		                
		           		<br>
		                <table class="table table-striped table-hover">
		                  <thead>
		                    <tr>
		                      <th scope="col">#</th>
		                      <th scope="col">ထုတ်ကုန်အမည်</th>
		                      <th scope="col">ဈေးနှုန်း</th>
		                      <th scope="col">လက်ကျန်</th>
		                    </tr>
		                  </thead>
		                  <tbody id="tbody">
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
		             </tbody>
		                </table>           
			             {{$products->links()}}
        		</div>

	            <div class="col-4 mt-2 d-flex flex-column" >

					<li style="list-style-type: none;font-weight: bold;">
						<div class="spinner-grow spinner-grow-sm text-primary" role="status">
						  <span class="sr-only">Loading...</span>
						</div>	
						ယနေ့ အရောင်းစာရင်း ( {{$histories->count() ?? ''}} )
					</li>
						
		     @endisset

					
					  
					  @php
					  	$i = 0;
					  @endphp
						  @foreach ($histories as $history)
							  @php
							  	$i++;
							  @endphp
								  @if ($i < 10)
									  <div class="@empty ($products)
									      				col-4
									  			  @endempty shadow-sm p-3 my-1 ">
									  		<div class="  d-flex w-100 justify-content-between " >
								      			<a href="/histories/{{$history->id}}/edit" class="mb-1 text-decoration-none">{{$history->product->product}} </a>
								      			<small >{{$history->created_at->diffForHumans()}}</small>
								    		</div>
								    		<small class="mb-1 ">{{$history->quantity}} ခု ရောင်းရပါသည်</small>
									  </div>
									 
								  @endif
						  @endforeach
					
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

    </div>
</div>


@endsection
