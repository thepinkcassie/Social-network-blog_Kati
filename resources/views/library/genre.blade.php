@extends('layouts.app_library')

@section('content')

<div class="col-lg-12">

  <aside aria-label="sidebar" class="sidebar sidebar-right">

    <div  class="widget w-tags">
      <div class="heading text-center">
         <h4 class="heading-title">Genre: {{ $genre->genre }}</h4>
         <div class="heading-line">
             <span class="short-line"></span>
             <span class="long-line"></span>
         </div>
      </div>

<div class="container">

  <div class="row medium-padding120">
     <main class="main">
       <div class="row">
          <div class="case-item-wrap">
             @foreach($genre->titles as $title)
               <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                 <div class="case-item">
                   <div class="case-item__thumb mouseover poster-3d lightbox shadow animation-disabled" data-offset="5">
                      <img src="{{asset( $title->featured_img) }}" alt="{{ $title->name }}" style="width:318px; height:399px;">
                   </div>

                   <div class="text-center">
                     <a href="#">
                       <h6 class="case-item__title">{!! $title->name !!}</h6>
                     </a>
                       <h6>{!! str_limit($title->summary, 85) !!}</h6>
                     <a href="#">
                       <button class="btn btn-sm btn-warning">Read Now</button>
                     </a>
                   </div>
                 </div>
               </div>
             @endforeach
          </div>
       </div>

       @if($genre->titles->count() == 0)
         <h6 class="text-center">
              So sorry, our {{$genre->genre }} genre is empty (sad face).
              <br> 
              The good news is you can create a story for this genre,
              <br>
              and we can't wait to see what you create for the {{$genre->genre }} genre.
          </h6>
       @endif

       {{-- Later will add Bee mascot face looking sad- hire new artist for bee(Al vinno) --}}

     </main>
  </div>
</div>
      

@endsection