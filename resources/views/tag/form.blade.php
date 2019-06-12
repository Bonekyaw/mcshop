  <div class="form-group">
    <input type="text" class="form-control" id="tag" name="tag" 
    placeholder="ဒီနေရာမှာ စာရိုက်ပါ" value="{{ old('tag') ?? $tag->tag}}">
  </div>
  @if ($errors->first('tag'))
     <div class="alert alert-danger ">{{$errors->first('tag')}}</div>
  @endif
