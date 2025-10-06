@extends('layouts.user.master')

@section('content')
    @if (session('lang') == 'en' || session('lang') == null)
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('whatdoweoffer.index') }}"> What Do We Offer</a></li>
                </ol>
                <h2>{{$whatDoWe->title_en}}</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container" data-aos="fade-up">
                {!!$whatDoWe->body_en!!}
            </div>
            
        </section>
    @elseif (session('lang') == 'fa')
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('home') }}">صفحه اصلی</a></li>
                    <li><a href="{{ route('whatdoweoffer.index') }}"> آنچه ما ارائه می دهیم</a></li>
                </ol>
                <h2>{{$whatDoWe->title_fa}}</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container" data-aos="fade-up">
                {!!$whatDoWe->body_fa!!}
            </div>
            
        </section>
    @endif
@endsection