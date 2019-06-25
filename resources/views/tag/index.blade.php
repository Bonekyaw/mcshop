@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        @include('layouts.nav')
        <div class="col-8 ">
          @if (session()->has('success'))
            <p class="alert alert-success text-center">{{session()->get('success')}}</p>
          @endif
            <p class="font-weight-bold h4 text-secondary">
                Tag မျိုးတူရာတူရာ ပေါင်းစုခြင်း
            </p>
            <hr>
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th scope="col">Tag အမည်</th>
                      <th scope="col">သက်ဆိုင်သောပစ္စည်းများ စုစုပေါင်း</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($tagPagi as $tag)
                    <tr>
                      <td>
                      </td>
                      <td>
                            <a href="/tags/{{$tag->id}}" class=" text-decoration-none " 
                            >{{$tag->tag}}</a>                      
                      </td>
                      <td>
                            {{$tag->products()->count()}}
                      </td>
                      <td>
                           @can('update', $tag)
                                  <a href="/tags/{{$tag->id}}" class="btn btn-success "> ပစ္စည်းကြည့်မယ်</a>
                                  <a href="/tags/{{$tag->id}}/edit" class="btn btn-primary "> အမည်ပြောင်းမယ်</a>
                          @endcan

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="mt-4">
                      {{$tagPagi->links()}}
                </div>           
 

          </div>
          @include('layouts.side')
    </div>
</div>
@endsection

