<div class="container">
    <div>
        <main class="main">
            <div class="col-lg-10 col-lg-offset-1">
                <article class="hentry post post-standard-details">
                    <h2>{!! $page->page_title !!}</h2>

                    <div class="post__content">


                        <div class="post-additional-info">

                            <div class="post__author author vcard">
                                By

                                <div class="post__author-name fn">
                                    <a href="#" class="post__author-link">{{ $page->user->name}}</a>
                                </div>

                            </div>

                            <span class="post__date">

                                

                                <time class="published" datetime="2016-03-20 12:00:00">
                                   <i class="seoicon-clock"></i> {{ $page->created_at->diffForHumans() }}
                                </time>

                            </span>


                        </div>



                        <div class="post__content-info">

                            <p>{!! $page->content !!}</p>
                        </div>
                    </div>

                    <div class="socials">Vote:
                        <a href="#" class="social__item">
                            <i class="seoicon-social-facebook"></i>
                        </a>
                    </div>

                    <div class="socials">Comment:
                        <a href="#" class="social__item">
                            <i class="seoicon-social-twitter"></i>
                        </a>
                    </div>

                    {{--SOCIAL --}}
                <div class="socail text-center"> Share:
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <div class="addthis_inline_share_toolbox"></div>
                </div>
            {{--END SOCIAL--}}

                    {{-- THIS IS A COMMENT AND IT WORKS USE TO WRITE COMMENTS FROM NOW ON --}}


                    <div class="pagination-arrow">
                    
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


                </article>

            
              
                    </div>
                </div>

                
                 <div class="row">

                </div>

            <!-- COMMENTS -->
                

            <!-- END COMMENTS -->

                <div class="row">

                </div>


            </div>

            {{-- End Post Details --}}


        </main>
    </div>
</div>
