<body>

    @if (session('lang') == 'en' || session('lang') == null)
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top d-flex align-items-center">
            <div class="container d-flex align-items-center">
                <h1 class="logo me-auto"><a href="{{route('home')}}">
                        <img src="{{asset('assets/img/DIMMAF-LOGO.png')}}"></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->

                <nav id="navbar" class="navbar order-last order-lg-0">
                    <ul>
                        <li><a class="nav-link" href="{{route('home')}}">Home</a></li>
                        <li><a class="nav-link" href="{{route('aboutus')}}">About Us</a></li>
                        <li><a class="nav-link" href="{{route('whatdoweoffer.index')}}">What do we offer</a></li>
                        {{-- <li><a class="nav-link scrollto" href="{{route('home')}}#services">Services</a></li>
                        <li><a class="nav-link scrollto" href="{{route('home')}}#faq">FAQ</a></li> --}}
                        {{-- <li><a class="nav-link scrollto" href="#team">Team</a></li> --}}
                        {{-- <li><a class="nav-link scrollto" href="{{route('guest.blog.index')}}">Blogs</a></li> --}}
                        <li class="dropdown"><a href="#"><span>Provinces</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                @foreach(App\Models\State::activeStates() as $state)
                                    <li><a href="{{route('guest.blog.index' , $state->id)}}">{{$state->name}}</a></li>
                                @endforeach
                            </ul>
                          </li>
                        <!--<li><a class="active" href="blog.html">Blog</a></li>
                            <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                                <ul>
                                <li><a href="#">Drop Down 1</a></li>
                                <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                                    <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Drop Down 2</a></li>
                                <li><a href="#">Drop Down 3</a></li>
                                <li><a href="#">Drop Down 4</a></li>
                                </ul>
                            </li> -->
                        
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

                <a href="{{route('home').'#contact'}}" class="get-started-btn scrollto">
                    @if(session('lang') == 'fa')
                        دریافت مشاوره
                    @else
                        Get consultation
                    @endif
                </a>
                
                @if(session('lang') == 'fa')
                    <a class="nav-link scrollto" href="{{route('language.switch' , 'en')}}">
                        <span class="lang">EN</span><img src="{{asset('assets/img/flag/CA.png')}}" alt="English language">
                    </a>
                @else
                    <a class="nav-link scrollto" href="{{route('language.switch' , 'fa')}}">
                        <span class="lang">FA</span><img src="{{asset('assets/img/flag/FA.png')}}" alt="Farsi language">
                    </a>
                @endif

            </div>

          
        </header>
        <!-- End Header -->

    @elseif(session('lang') == 'fa')

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top d-flex align-items-center">
            <div class="container d-flex align-items-center">
                <h1 class="logo ms-auto"><a href="{{route('home')}}">
                        <img src="{{asset('assets/img/DIMMAF-LOGO.png')}}"></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->

                <nav id="navbar" class="navbar order-last order-lg-0">
                    <ul>
                        <li><a class="nav-link" href="{{route('home')}}">صفحه اصلی</a></li>
                        <li><a class="nav-link" href="{{route('aboutus')}}">درباره ما</a></li>
                        <li><a class="nav-link" href="{{route('whatdoweoffer.index')}}">آنچه ما ارائه می دهیم </a></li>
                        {{-- <li><a class="nav-link scrollto" href="{{route('home')}}#services">خدمات</a></li>
                        <li><a class="nav-link scrollto " href="{{route('home')}}#faq">سوالات متداول</a></li> --}}
                        {{-- <li><a class="nav-link scrollto" href="{{route('home')}}#team">تیم</a></li> --}}
                        {{-- <li><a class="nav-link scrollto" href="{{route('guest.blog.index')}}">بلاگ</a></li> --}}
                        <li class="dropdown"><a href="#"><span>استان ها</span> <i style="margin-right: 5px;" class="bi bi-chevron-down"></i></a>
                          <ul>
                              @foreach(App\Models\State::activeStates() as $state)
                                    <li><a href="{{route('guest.blog.index' , $state->id)}}">{{$state->name}}</a></li>
                              @endforeach
                          </ul>
                        </li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>
                <!-- .navbar -->
                
                <a href="{{route('home').'#contact'}}" class="get-started-btn scrollto">ارتباط با مشاورین</a>
                
                <a class="nav-link scrollto" href="{{route('language.switch' , 'en')}}"><span class="lang">EN</span><img src="{{asset('assets/img/flag/CA.png')}}" alt="English language"></a>

            </div>
           
        </header>
        <!-- End Header -->

    @endif
