  <div class="form-group">
    <input type="text" class="form-control shadow-sm" id="brand" name="brand" 
    placeholder="ဒီနေရာမှာ စာရိုက်ပါ" value="{{ old('brand') ?? $brand->brand}}">
  </div>
  @if ($errors->first('brand'))
     <div class="alert alert-danger ">{{$errors->first('brand')}}</div>
  @endif
