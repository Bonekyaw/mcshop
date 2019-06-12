  <div class="form-group">
    <input type="text" class="form-control" id="category" name="category" 
    placeholder="ဒီနေရာမှာ စာရိုက်ပါ" value="{{ old('category') ?? $category->category}}">
  </div>
  @if ($errors->first('category'))
     <div class="alert alert-danger ">{{$errors->first('category')}}</div>
  @endif
