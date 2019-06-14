        <div class="col-3 " >
            <form action="" method="get" >
                  <div class="form-group">
                    <input type="text" class="form-control shadow" aria-describedby="emailHelp" placeholder="ဒီနေရာမှာ စာရိုက်ရှာပါ">
                  </div>
            </form>
            <div  class="list-group shadow-sm mt-3">
                  <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center font-weight-bold" 
                  href="/home">
                        ပင်မစာမျက်နှာ 
                  </a>
                  <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center font-weight-bold" 
                  href="/categories">
                        မျိုးကွဲများ <span class="badge badge-primary badge-pill">{{$catCount ?? '' }}</span>
                  </a>
                  <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center font-weight-bold" 
                  href="/brands">
                        တံဆိပ်များ <span class="badge badge-primary badge-pill">{{$brandCount ?? '' }}</span>
                  </a>
                  <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center font-weight-bold" 
                  href="/products">
                        ထုတ်ကုန်များ <span class="badge badge-primary badge-pill">{{$productCount ?? '' }}</span>
                  </a>
                  <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center font-weight-bold" 
                  href="#list-item-4">
                        နောက်ဆုံးစာရင်းသွင်း <span class="badge badge-primary badge-pill">34</span>
                  <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center font-weight-bold" 
                  href="#list-item-4">
                        ရောင်းပြီးစာရင်း <span class="badge badge-primary badge-pill">34</span>
                  <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center font-weight-bold" 
                  href="#list-item-4">
                        ကုန်တော့မည့်စာရင်း <span class="badge badge-primary badge-pill">34</span>
                  </a>
            </div>
            <hr>
            <div class="my-2">
              <p class="font-weight-bold h5 pb-2">မျိုးတူရာ Tags အုပ်စု</p>
              <div class="row d-flex ">
                @foreach ($tagProducts as $tagProduct)
                  <form action="/tags/{{$tagProduct->id}}" method="get" class="m-1">                    
                    <button type="submit" class="btn btn-outline-success">{{$tagProduct->tag}}</button>            
                  </form>
                @endforeach
              </div>
            </div>        
        </div>
