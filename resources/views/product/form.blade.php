  <div class="form-group">
    <label for="product">Product ထုတ်ကုန်အမည် ပေးပါ</label>
    <input type="text" class="form-control shadow-sm" id="product" name="product" 
    placeholder="ဒီနေရာမှာ စာရိုက်ပါ" value="{{ old('product') ?? $product->product}}">
  </div>
  @if ($errors->first('product'))
     <div class="alert alert-danger ">{{$errors->first('product')}}</div>
  @endif

  <div class="form-group">
    <label for="brand">Brand တံဆိပ်ကို ရွေးချယ်ပါ</label>
    <select class="form-control shadow-sm" id="brand" name="brand_id" >
      <option value="">ဒီနေရာကိုနှိပ်ပြီး တခုခုကို ရွေးချယ်ပါ</option>
      @foreach ($brands as $brand)
      	<option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected':''}}>{{ $brand->brand }}</option>      	
      @endforeach
    </select>
  </div>  
  @if ($errors->first('brand_id'))
     <div class="alert alert-danger ">{{$errors->first('brand_id')}}</div>
  @endif

  <div class="form-group">
    <label for="category">Category မျိုးကွဲတစ်ခုကို ရွေးချယ်ပါ</label>
    <select class="form-control shadow-sm" id="category" name="category_id" >
      <option value="">ဒီနေရာကိုနှိပ်ပြီး တခုခုကို ရွေးချယ်ပါ</option>
      @foreach ($cats as $category)
      	<option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected':''}}>{{ $category->category }}</option>      	
      @endforeach
    </select>
  </div>  
  @if ($errors->first('category_id'))
     <div class="alert alert-danger ">{{$errors->first('category_id')}}</div>
  @endif

  <div class="form-group">
    <label for="tag">Tag မျိုးတူရာတူရာကို တခုထက်မက ရွေးချယ်နိုင်သည်</label>
    <select multiple class="form-control shadow-sm" id="tag" name="tag_id[]" >
      @foreach ($tagProducts as $tag)
      	<option value="{{ $tag->id }}" >
      		{{ $tag->tag }}
      	</option>      	
      @endforeach
    </select>
  </div>  
  @if ($errors->first('tag_id'))
     <div class="alert alert-danger ">{{$errors->first('tag_id')}}</div>
  @endif

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="price">ရောင်းဈေး ( ကျပ် )</label>
      <input type="number" class="form-control shadow-sm" name="price" id="price" placeholder="eg. 540.90" 
      value="{{ old('price') ?? $product->price}}">
    </div>
  @if ($errors->first('price'))
     <div class="alert alert-danger ">{{$errors->first('price')}}</div>
  @endif

    <div class="form-group col-md-4">
      <label for="cost">ဝယ်ဈေး ( ကျပ် )</label>
      <input type="number" class="form-control shadow-sm" name="cost" id="cost" placeholder="eg. 540.90" 
      value="{{ old('cost') ?? $product->cost}}">
    </div>
  @if ($errors->first('cost'))
     <div class="alert alert-danger ">{{$errors->first('price')}}</div>
  @endif

    <div class="form-group col-md-4">
      <label for="discount">Discount လျှော့ဈေး</label>
      <input type="number" class="form-control shadow-sm" name="discount" id="discount" placeholder=" ( % ) မထည့်လည်းရသည်" 
      value="{{ old('discount') ?? $product->discount}}">
    </div>
  @if ($errors->first('discount'))
     <div class="alert alert-danger ">{{$errors->first('discount')}}</div>
  @endif
  </div>

  <div class="form-group">
    <label for="description">ယခုထုတ်ကုန်အကြောင်း</label>
    <textarea class="form-control shadow-sm " name="description" id="description" rows="2" placeholder="မထည့်လည်းရသည်" 
    >{{ old('description') ?? $product->description}}</textarea>
  </div>
  @if ($errors->first('description'))
     <div class="alert alert-danger ">{{$errors->first('description')}}</div>
  @endif

  <div class="form-group">
    <label for="benefit">ယခုထုတ်ကုန်ကို သုံးခြင်းဖြင့် ရရှိလာမည့် အကျိုးကျေးဇူး</label>
    <textarea class="form-control shadow-sm " name="benefit" id="benefit" rows="2" placeholder="မထည့်လည်းရသည်" 
    >{{ old('benefit') ?? $product->benefit}}</textarea>
  </div>
  @if ($errors->first('benefit'))
     <div class="alert alert-danger ">{{$errors->first('benefit')}}</div>
  @endif

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="weight">အလေးချိန်</label>
      <input type="text" class="form-control shadow-sm" name="weight" id="weight" placeholder="eg. 160 g OR 10 lb" 
      value="{{ old('weight') ?? $product->weight}}">
    </div>
  @if ($errors->first('weight'))
     <div class="alert alert-danger ">{{$errors->first('weight')}}</div>
  @endif

    <div class="form-group col-md-4">
      <label for="photo">ဓာတ်ပုံထည့်ရန်</label>
      <input type="file" class="form-control shadow-sm" name="photo" id="photo" >
    </div>
	  @if ($errors->first('photo'))
	     <div class="alert alert-danger ">{{$errors->first('photo')}}</div>
	  @endif

  <div class="form-group col-md-4">
      <label for="inStock">ကုန်ပစ္စည်းအရေအတွက်</label>
      <input type="number" class="form-control shadow-sm" name="inStock" id="inStock" placeholder="eg. 100" 
      value="{{ old('inStock') ?? $product->inStock}}">
    </div>
  @if ($errors->first('inStock'))
     <div class="alert alert-danger ">{{$errors->first('inStock')}}</div>
  @endif
  </div>
