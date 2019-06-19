        <div class="col-3 " >
            <form action="" method="get" >
                  <div class="form-group">
                    <input type="text" class="form-control shadow" aria-describedby="emailHelp" placeholder="ဒီနေရာမှာ စာရိုက်ရှာပါ">
                  </div>
            </form>
        </div>
        <div class="col-9 ">
          <div class="row d-flex">
					<div class="col-3 d-flex mr-4">
					  <div class="dropdown mr-1">
					    <button type="button" class="btn btn-secondary dropdown-toggle font-weight-bold" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
					      ရွေးချယ်စရာ Menu များ &nbsp; <i class="fas fa-database"></i> &nbsp;
					    </button>
					    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
		                  <a class="dropdown-item" 
		                  href="/home">
		                        <i class="fas fa-home"></i>  &nbsp; ပင်မစာမျက်နှာ 
		                  </a>
		                  <a class="dropdown-item" 
		                  href="/categories">
		                      <span><i class="fas fa-project-diagram"></i> &nbsp; မျိုးကွဲများ</span>   <span class="badge badge-primary badge-pill">{{$cats->count() ?? '' }}</span>
		                  </a>
		                  <a class="dropdown-item" 
		                  href="/brands">
		                       <span><i class="fas fa-bold"></i> &nbsp; တံဆိပ်များ</span>  <span class="badge badge-primary badge-pill">{{$brands->count() ?? '' }}</span>
		                  </a>
		                  <a class="dropdown-item" 
		                  href="/products">
		                       <span><i class="fas fa-database"></i> &nbsp; ထုတ်ကုန်များ</span>  <span class="badge badge-primary badge-pill">{{$products->count() ?? '' }}</span>
		                  </a>
		                  <a class="dropdown-item" 
		                  href="/histories/outOfStock">
		                        ကုန်တော့မည့်စာရင်း <span class="badge badge-primary badge-pill">{{$bellNoti}}</span>
		                  </a>
		                  <form action="/histories" method="post">
		                  	@csrf
		                  	
							  <div class="form-group">
							    <input type="hidden" name="day" value="{{ now()->isoFormat('D')}}">
							    <input type="hidden" name="month" value="{{ now()->isoFormat('M')}}">
							    <input type="hidden" name="year" value="{{ now()->isoFormat('YYYY')}}">
							    <button type="submit" class="btn btn-light">ယနေ့ရောင်းပြီးစာရင်း <span class="badge badge-primary badge-pill">{{$histories->count() ?? ''}}</span></button>
							  </div>
		                  </form>
					    </div>
					  </div>
					</div>          
					<div class="col-2 d-flex mr-3">
					  <div class="dropdown mr-1">
					    <button type="button" class="btn btn-secondary dropdown-toggle font-weight-bold" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
					      မျိုးကွဲများ &nbsp; <i class="fas fa-project-diagram"></i> &nbsp; 
					    </button>
					    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
					    	@foreach ($cats as $category)
							      <a class="dropdown-item" href="/categories/{{$category->id}}">{{$category->category}}</a>
					    	@endforeach
					    </div>
					  </div>
					</div>
{{-- 					<div class="col-2 d-flex  mr-4">
					  <div class="dropdown mr-1">
					    <button type="button" class="btn btn-secondary dropdown-toggle font-weight-bold" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
					      မျိုးတူအုပ်စု &nbsp; <i class="fas fa-tags"></i> &nbsp;
					    </button>
					    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
					    	@foreach ($tagProducts as $tag)
							      <a class="dropdown-item" href="/tags/{{$tag->id}}">{{$tag->tag}}</a>
					    	@endforeach
					    </div>
					  </div>
					</div>        
 --}}        
					<div class="col-2 d-flex">
					  <div class="dropdown mr-1">
					    <button type="button" class="btn btn-secondary dropdown-toggle font-weight-bold" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
					      တံဆိပ်များ &nbsp; <i class="fas fa-bold"></i> &nbsp; &nbsp;&nbsp; 
					    </button>
					    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
					    	@foreach ($brands as $brand)
							      <a class="dropdown-item" href="/categories/{{$brand->id}}">{{$brand->brand}}</a>
					    	@endforeach
					    </div>
					  </div>
					</div>        
				</div>
			</div>
