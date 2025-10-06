@extends('layouts.user.master')

@section('content')
    @if (session('lang') == 'en' || session('lang') == null)
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>What Do We Offer</li>
                </ol>

            </div>
        </section><!-- End Breadcrumbs -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>What Do We Offer</h2>
                    <p></p>
                </div>
                <div class="row" style="display: flex;">
                    @foreach ($whatDoWeOffers as $whatDoWe)
                        <div class="col-md-6 mt-4 mt-md-0">
                            <a href="{{ route('whatdoweoffer.show', $whatDoWe->slug) }}">
                                <div class="icon-box" data-aos="fade-up" data-aos-delay="100"
                                    style="background-color: Gainsboro; height:95%;">
                                    @switch($whatDoWe->id)
                                        @case(1)
                                            <i class="bi bi-briefcase"></i>
                                        @break

                                        @case(2)
                                            <i class="bi bi-card-checklist"></i>
                                        @break

                                        @case(3)
                                            <i class="bi bi-bar-chart"></i>
                                        @break

                                        @case(4)
                                            <i class="bi bi-binoculars"></i>
                                        @break

                                        @case(5)
                                            <i class="bi bi-brightness-high"></i>
                                        @break

                                        @case(6)
                                            <i class="bi bi-calendar4-week"></i>
                                        @break

                                        @default
                                    @endswitch

                                    <h4>{{ $whatDoWe->title_en }}</h4>
                                    <p style="color: black">{{ $whatDoWe->description_en }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @elseif (session('lang') == 'fa')
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('home') }}">صفحه اصلی</a></li>
                    <li> آنچه ما ارائه می دهیم</li>
                </ol>

            </div>
        </section><!-- End Breadcrumbs -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>آنچه ما ارائه می دهیم</h2>
                    <p></p>
                </div>
                <div class="row" style="display: flex;">
                    @foreach ($whatDoWeOffers as $whatDoWe)
                        <div class="col-md-6 mt-4 mt-md-0">
                            <a href="{{ route('whatdoweoffer.show', $whatDoWe->slug) }}">
                                <div class="icon-box" data-aos="fade-up" data-aos-delay="100"
                                    style="background-color: Gainsboro; height:95%;">
                                    @switch($whatDoWe->id)
                                        @case(1)
                                            <i class="bi bi-briefcase"></i>
                                        @break

                                        @case(2)
                                            <i class="bi bi-card-checklist"></i>
                                        @break

                                        @case(3)
                                            <i class="bi bi-bar-chart"></i>
                                        @break

                                        @case(4)
                                            <i class="bi bi-binoculars"></i>
                                        @break

                                        @case(5)
                                            <i class="bi bi-brightness-high"></i>
                                        @break

                                        @case(6)
                                            <i class="bi bi-calendar4-week"></i>
                                        @break

                                        @default
                                    @endswitch

                                    <h4>{{ $whatDoWe->title_fa }}</h4>
                                    <p style="color: black">{{ $whatDoWe->description_fa }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection