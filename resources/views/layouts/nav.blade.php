        <div class="col-3 " >
            <div  class="list-group shadow-sm mt-1">
                  <a class="list-group-item list-group-item-action  align-items-center font-weight-bold" 
                  href="/home">
                        <i class="fas fa-home"></i>  &nbsp; ပင်မစာမျက်နှာ 
                  </a>
                  <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center font-weight-bold" 
                  href="/categories">
                      <span><i class="fas fa-project-diagram"></i> &nbsp; မျိုးကွဲများ</span>   <span class="badge badge-primary badge-pill">{{$catCount ?? '' }}</span>
                  </a>
                  <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center font-weight-bold" 
                  href="/brands">
                       <span><i class="fas fa-bold"></i> &nbsp; တံဆိပ်များ</span>  <span class="badge badge-primary badge-pill">{{$brandCount ?? '' }}</span>
                  </a>
                  <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center font-weight-bold" 
                  href="/products">
                       <span><i class="fas fa-database"></i> &nbsp; ထုတ်ကုန်များ</span>  <span class="badge badge-primary badge-pill">{{$productCount ?? '' }}</span>
                  </a>
                  <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center font-weight-bold" 
                  href="/histories">
                        ရောင်းပြီးစာရင်း <span class="badge badge-primary badge-pill">{{$historyCount ?? ''}}</span>
                  </a>
                  <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center font-weight-bold" 
                  href="/histories/outOfStock">
                        ကုန်တော့မည့်စာရင်း <span class="badge badge-primary badge-pill">{{$bellNoti}}</span>
                  </a>
            </div>
            <hr>
            <div class="my-2">
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
