 <header class="header" id="site-header">
        <div class="container">
                <div class="header-content-wrapper">
                    <div class="logo">
                        <div class="logo-text">
                            <div class="logo-title">SCRIBLYZ</div>
                        </div>
                    </div>

                    <nav id="primary-menu" class="primary-menu">
                        <a href='javascript:void(0)' id="menu-icon-trigger" class="menu-icon-trigger showhide">
                            <span id="menu-icon-wrapper" class="menu-icon-wrapper" style="visibility: hidden">
                                <svg width="1000px" height="1000px">
                                    <path id="pathD" d="M 300 400 L 700 400 C 900 400 900 750 600 850 A 400 400 0 0 1 200 200 L 800 800"></path>
                                    <path id="pathE" d="M 300 500 L 700 500"></path>
                                    <path id="pathF" d="M 700 600 L 300 600 C 100 600 100 200 400 150 A 400 380 0 1 1 200 800 L 800 200"></path>
                                </svg>
                            </span>
                        </a>

                         <!-- Left Side Of Navbar -->
                        <ul class="primary-menu-menu" style="overflow: hidden;">
                           @if(Auth::check())
                            <li>
                                <a href="{{ route('profile',['slug'=> Auth::user()->slug ]) }}">
                                  <i class="fa fa-md fa-home"></i> 
                                    Home 
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('title.create') }}"> 
                                  <i class="fa fa-md fa-pencil"></i> 
                                    Create 
                                </a>
                            </li>

                            <li>
                                <a href="#"> 
                                  <i class="fa fa-md fa-book"></i> 
                                    Library 
                                </a>
                            </li>

                            <li>
                                <a href="#"> 
                                  <i class="fa fa-md fa-envelope"></i>
                                   Message 
                                 </a>
                            </li>
                            <unread></unread>
                        @endif

                        
                        </ul>
                        <!-- END LEFT SIDE OF NAV BAR -->

                    </nav>
                    <ul class="nav-add">
                        <!-- SEARCH feature -->
                        <li class="search search_main" style="color: black; margin-top: 5px;">
                             @if(Auth::check())
                            <a href="{{url('search')}}">
                                <i class="seoicon-loupe"></i>
                            </a>
                            @endif
                        </li>
                        <!-- END Search -->
                        
                        
                    </ul>
                </div>
        </div>
    </header>