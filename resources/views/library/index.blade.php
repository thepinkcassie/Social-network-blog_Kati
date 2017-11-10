@extends('layouts.app_library')

@section('content')

{{-- ALL TITLE STORY DISPLAY SECTION --}}
    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color" >
            <div class="container text-center">
                
                  @foreach($titles as $title) 
                 
                    <div class="row">
                        <div class="case-item-wrap">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item" >
                                    <div class="case-item__thumb" >
                                        <img src="{{ $title->featured_img }}" alt="{{ $title->name }}" style="width:318px; height:399px;">
                                    </div>
{{-- Major issue titles repeat on row over and over--}}
                                     <h6 class="case-item__title">
                                       <a href="#">{!! $title->name !!}</a>
                                     </h6>
                                     <h6>{!! str_limit($title->summary, 85) !!}</h6>

                                    <a href="{{ route('page.single', ['slug' => $page_name->slug]) }}">
                                      <button class="btn btn-warning">Read Now</button>
                                    </a>
                                </div>
                            </div>
                            

                            <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{ $title->featured_img }}" alt="{{ $title->name }}" style="width:318px; height:399px;">
                                    </div>

                                      <h6 class="case-item__title">
                                        <a href="#">{!! $title->name !!}</a>
                                      </h6>
                                      <h6>{!! str_limit($title->summary, 85) !!}</h6>

                                    <a href="{{ route('page.single', ['slug' => $page_name->slug]) }}">
                                      <button class="btn btn-warning">Read Now</button>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{ $title->featured_img }}" alt="{{ $title->name }}" style="width:318px; height:399px;">
                                    </div>

                                      <h6 class="case-item__title"><a href="#">{!! $title->name !!}</a></h6>
                                      <h6>{!! str_limit($title->summary, 85) !!}</h6>

                                    <a href="{{ route('page.single', ['slug' => $page_name->slug]) }}">
                                      <button class="btn btn-warning">Read Now</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    @endforeach
                </div>
              
                <div class="padded-50"></div>
            </div>
            </div>
        </div>
    </div>

</div>

@endsection