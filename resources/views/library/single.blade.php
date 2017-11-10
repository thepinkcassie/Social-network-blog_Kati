@extends('layouts.app_library')

@section('content')

<div class="content-wrapper">

{{-- Stunning Header: consider replacing or removing --}}

{{-- End Stunning Header --}}


{{-- Page Details --}}

<div class="container">
  <div>
    <main class="main">
      <div class="col-lg-10 col-lg-offset-1">
          <article class="hentry post post-standard-details">

            <h2>{!! $page->page_title !!}</h2>
            <div class="post__content">

              <div class="post-additional-info">
                <div class="post__author author vcard">
                  By:
                  <div class="post__author-name fn">
                    <a href="#" class="post__author-link">{{ $page->user->name}}
                  </div>
                </div>
                
                {{--Post date aka page date --}}
                <span class="post__date">
                  <time class="published" datetime="2016-03-20 12:00:00">
                    <i class="seoicon-clock"></i> {{ $page->created_at->diffForHumans() }}
                  </time>
                </span>
                {{--End Post date aka page date--}}
              </div>

              {{--Post content aka page content--}}
              <div class="post__content-info">
                <p> {!! $page->content !!} </p>
              </div>
              {{--End post content aka page content--}}

            </div>
           
           {{--Vote Feature**NOT WORKING AS OF 11/08--}}
            <span>
              <a href="#">
                <h3 class="text-center">
                  Vote 
                  <i class="fa fa-lg fa-heart-o" aria-hidden="true"></i>
                </h3>
              </a>
            </span>

            {{--Social Share: Addthis.com--}}
            <div class="socail text-center"> 
              Share:
              <div class="addthis_inline_share_toolbox"></div>
            </div>
            {{--End Social Share: Addthis.com--}}
             
             <br>
            {{--Comments***NOT WORKING AS OF 11/08--}}
            <span>
              <a href="#">
                <h4 class="text-center">
                  Leave a comment
                  <i class="fa fa-commenting-o" aria-hidden="true"></i>
                </h4>
              </a>
            </span>

            <div class="pagination-arrow">
            {{--Left arrow--}}
               @if($prev)
                <a href="{{ route('page.single', ['slug' => $prev->slug] )}}" class="btn-prev-wrap">
                    <svg class="btn-prev">
                      <use xlink:href="#arrow-left"></use>
                    </svg>
                    <div class="btn-content">
                      <div class="btn-content-title">Previous Page</div>
                        <p class="btn-content-subtitle">{{ $prev->page_title}}</p>
                    </div>
                </a>
              @endif 

          {{--Right arrow--}}
             @if($next)
               <a href="{{ route('page.single', ['slug'=>$next->slug]) }}" class="btn-next-wrap">
                 <div class="btn-content">
                   <div class="btn-content-title">Next Page</div>
                     <p class="btn-content-subtitle">{{ $next->page_title}}</p>
                  </div>
                  <svg class="btn-next">
                    <use xlink:href="#arrow-right"></use>
                  </svg>
                </a>
                  @endif
            </div>
            {{--End pagination--}}
          </article>
      </div>
    </main>
  </div>
</div>

{{--End Page Details--}}



@endsection
