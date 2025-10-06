@extends('layouts.user.master')

@section('content')

@if (session('lang') == 'en' || session('lang') == null)

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{route('home')}}"> home </a></li>
                <li><a href="{{route('guest.blog.index')}}">  Provinces </a></li>
            </ol>
            <h2> @isset($state) {{$state->name}} @endisset</h2>

        </div>
    </section><!-- End Breadcrumbs -->


    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">
                    @foreach ($blogs as $blogItem)
                        @if(empty($blogItem->body_en))
                            @continue
                        @endif
                        <article class="entry">

                            @if($blogItem->image)
                                <div class="entry-img">
                                    <img src="{{asset($blogItem->image)}}" alt="{{$blogItem->title_en}}" class="img-fluid">
                                </div>
                            @endif

                            <h2 class="entry-title">
                                <a href="{{route('guest.blog.show' , $blogItem->slug)}}">{{$blogItem->title_en}}</a>
                            </h2>


                            <div class="entry-content">
                                
                                <p>
                                    {!! substr(strip_tags($blogItem->body_en),0,400).'...' !!}
                                </p>

                                <div class="read-more">
                                    <a href="{{route('guest.blog.show' , $blogItem->slug)}}"> Additional immigration information </a>
                                </div>
                            </div>

                        </article>
                        <!-- End blog entry -->
                    @endforeach

                    {{$blogs->links('pagination.guest_pagination')}}
                </div><!-- End blog entries list -->

                {{-- sidebar --}}
                @include('layouts.user.sidebar')

            </div>
        </div>
    </section><!-- End Blog Section -->


@elseif (session('lang') == 'fa')


        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{route('home')}}"> صفحه اصلی </a></li>
                    <li><a href="{{route('guest.blog.index')}}"> استان ها </a></li>
                </ol>
                <h2> @isset($state) {{$state->name}} @endisset</h2>
            </div>
        </section>
        <!-- End Breadcrumbs -->


        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-8 entries">
                        @foreach ($blogs as $blogItem)
                            @if(empty($blogItem->body_fa))
                                @continue
                            @endif
                            <article class="entry">
                                @if($blogItem->image)
                                    <div class="entry-img">
                                        <img src="{{asset($blogItem->image)}}" alt="{{$blogItem->title_fa}}" class="img-fluid">
                                    </div>
                                @endif
                                <h2 class="entry-title">
                                    <a href="{{route('guest.blog.show' , $blogItem->slug)}}">{{$blogItem->title_fa}}</a>
                                </h2>
                                
                                <div class="entry-content">

                                    
                                    <p>
                                        {!! substr(strip_tags($blogItem->body_fa),0,400).'...' !!}
                                    </p>

                                    <div class="read-more">
                                        <a href="{{route('guest.blog.show' , $blogItem->slug)}}" id="more">اطلاعات تکمیلی مهاجرت </a>
                                    </div>
                                </div>

                            </article>
                            <!-- End blog entry -->
                        @endforeach
                            {{$blogs->links('pagination.guest_pagination')}}
                    </div><!-- End blog entries list -->

                    {{-- sidebar --}}
                    @include('layouts.user.sidebar')
                </div>
            </div>
        </section>
        <!-- End Blog Section -->

@endif
@endsection
