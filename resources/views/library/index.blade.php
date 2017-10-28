<!-- LIBRARY DISPLAY PAGE, SEE ALL  -->

@extends('layouts.app_library')

@section('content')

<div class="widget container">

 @if($titles->count() > 0)
   @foreach($titles as $title)

<div class="row text-center">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail" style="background-color:white; width:280px; height:600px;">
      <img src="{{ $title->featured_img }}" alt="{{ $title->name }}" Style="width:250px; height:400px; margin-top:10px;">
      <div class="caption">
        <h3 class="text-center">{{ $title->name }}</h3>
        <p class="text-center">{{ $title->summary }}</p>
        <p>
          <a href="#"  class="btn  btn-warning">
             Read 
          </a>
        </p>
      </div>
    </div>
  </div>
</div>



 @endforeach
        
    @else
         <p>Something went wrong! Sorry working on it right now</p>
    @endif
</div>

@endsection