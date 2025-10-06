@extends('layouts.user.master')

@section('content')
   
   @if (session('lang') == 'en' || session('lang') == null)
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">

            <div class="container">

                <ol>
                    <li><a href="{{route('home')}}"> Index </a></li>
                    <li><a href="{{route('guest.blog.index')}}">  Provinces </a></li>
                    <li><a href="{{route('guest.blog.index' , $blog->state->id)}}"> @if($blog->state->name != 'general-en' && $blog->state->name != 'general-fa'){{$blog->state->name}} @endif</a></li>
                    <li><a href="{{route('guest.blog.show' , $blog->slug)}}"> {{substr($blog->title_en,0,30).'...'}} </a></li>
                </ol>
                <h2> {{$blog->title_en}} </h2>

            </div>
        </section>
        <!-- End Breadcrumbs -->

        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-8 entries">
                        <article class="entry entry-single">

                            <div class="entry-img">
                                {{-- header img --}}
                                {{-- <img class="img-fluid"> --}}
                            </div>

                            <h2 class="entry-title">

                                <a href="{{route('guest.blog.show' , $blog->slug)}}">{{$blog->title_en}}</a>
                            </h2>
                             {{-- thumbnail img --}}
                            {{-- <img class="img-thumbnail"> --}}
                                    
                            <div class="entry-content">
                                

                                <p>
                                    {!! $blog->body_en !!}
                                </p>

                                <!--  <blockquote>
                                        <p>
                                        If you want to learn more about migrating to this province, do not miss reading this article.
                                        </p>
                                    </blockquote> -->

                                <p>
                                </p>

                           
                                {{-- <div class="entry-footer">
                                    <i class="bi bi-folder"></i>
                                    <ul class="cats">
                                        <li><a href="#">Business</a></li>
                                    </ul>
                    
                                    <i class="bi bi-tags"></i>
                                    <ul class="tags">
                                        @isset($blog->categories)
                                        @foreach($blog->categories as $category)
                                        <li><a href="{{$category->name}}#">{{$category->name}}</a></li>
                                        @endforeach
                                        @endisset
                                        <li><a href="#">Creative</a></li>
                                        <li><a href="#">Tips</a></li>
                                        <li><a href="#">Marketing</a></li>
                                    </ul>
                                </div> --}}
                                @isset($blog->link)
                                    <a href="{{$blog->link}}" class="get-started-btn scrollto"> More detail</a>
                                @endisset
                        </article>
                        <!-- End blog entry -->
                        <!-- <div class="blog-author d-flex align-items-center">
                                <img src="assets/img/blog/blog-author.jpg" class="rounded-circle float-left" alt="">
                                <div>
                                <h4>Jane Smith</h4>
                                <div class="social-links">
                                    <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                                    <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                    <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                </div>
                                <p>
                                    Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
                                </p>
                                </div>
                            </div> -->
                        <!-- End blog author bio -->
                        <!--  -->
                        <!-- End blog comments -->

                            
                    </div>
                    <!-- End blog entries list -->
                   
                     {{-- sidebar --}}
                     @include('layouts.user.sidebar')
                </div>
            </div>
        </section>
        <!-- End Blog Single Section -->

    @elseif (session('lang') == 'fa')

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{route('home')}}"> صفحه اصلی </a></li>
                    <li><a href="{{route('guest.blog.index')}}"> استان </a></li>
                    <li><a href="{{route('guest.blog.index' , $blog->state->id)}}">@if($blog->state->name != 'general-en' && $blog->state->name != 'general-fa') {{$blog->state->name}} @endif</a></li>
                    <li><a href="{{route('guest.blog.show' , $blog->slug)}}"> {{substr($blog->title_fa,0,30).'...'}} </a></li>
                </ol>
                <h2> {{$blog->title_fa}} </h2>
            </div>
        </section>
        <!-- End Breadcrumbs -->

        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-8 entries">
                        <article class="entry entry-single">
                            <div class="entry-img">
                                    {{-- header img --}}
                                {{-- <img class="img-fluid"> --}}
                            </div>
                            <h2 class="entry-title">
                                <a href="{{route('guest.blog.show' , $blog->slug)}}">{{$blog->title_fa}}</a>
                            </h2>
                             {{-- thumbnail img --}}
                            {{-- <img class="img-thumbnail"> --}}
                            <div class="entry-content">
                                <p>
                                    {!! $blog->body_fa !!}
                                </p>
                                <!-- <blockquote>
                                    <p>
                                        Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.
                                    </p>
                                    </blockquote>-->

                                <p></p>
                                
                                                <!-- <div class="entry-footer">
                                    <i class="bi bi-folder"></i>
                                    <ul class="cats">
                                    <li><a href="#">Business</a></li>
                                    </ul>
                                    <i class="bi bi-tags"></i>
                                    <ul class="tags">
                                    <li><a href="#">Creative</a></li>
                                    <li><a href="#">Tips</a></li>
                                    <li><a href="#">Marketing</a></li>
                                    </ul>
                                </div>-->
                                @isset($blog->link)
                                <a href="{{$blog->link}}" class="get-started-btn scrollto"> اطلاعات بیشتر</a>
                            @endisset
                        </article>
                        <!-- End blog entry -->
                        <!--
                            <div class="blog-author d-flex align-items-center">
                            <img src="assets/img/blog/blog-author.jpg" class="rounded-circle float-left" alt="">
                            <div>
                                <h4>Jane Smith</h4>
                                <div class="social-links">
                                <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                </div>
                                <p>
                                Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
                                </p>
                            </div>
                            </div>
                            -->
                        <!-- End blog author bio -->
                        <!--   -->
                        <!-- End blog comments -->
                           

                    </div>
                    <!-- End blog entries list -->

                    {{-- sidebar --}}
                    @include('layouts.user.sidebar')

                </div>
            </div>
        </section>
        <!-- End Blog Single Section -->

    @endif

