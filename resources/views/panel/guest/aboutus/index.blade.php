
@extends('layouts.user.master')

@section('content')

@if (session('lang') == 'en' || session('lang') == null)

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>About Us</li>
        </ol>
        <h2></h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page blog">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-12 col-md-12 entries">
            {{-- header img --}}
            @if($about->image)
            <img src="{{asset($about->image)}}" style="width:100%; height:auto; border-radius:5px 5px 0 0;"/>
            @endif
              <article class="entry entry-single  tabs" style="display: flex; flex-flow:column">
                {!!$about->body_en!!}
              </article>
          </div>
        </div>
      </div>
    </section>



 
    @elseif (session('lang') == 'fa')

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
          <div class="container">
    
            <ol>
              <li><a href="index.html">صفحه اصلی</a></li>
              <li>درباره ما</li>
            </ol>
            <h2> </h2>
    
          </div>
        </section><!-- End Breadcrumbs -->
    
        <section class="inner-page blog">
          <div class="container" data-aos="fade-up">
            <div class="row">
              <div class="col-lg-12 col-md-12 entries">
                {{-- header img --}}
                @if($about->image)
                <img src="{{asset($about->image)}}" style="width:100%; height:auto; border-radius:5px 5px 0 0;"/>
                @endif
                  <article class="entry entry-single  tabs" style="display: flex; flex-flow:column">
                    {!!$about->body_fa!!}
                  </article>
              </div>
            </div>
          </div>
        </section>

    @endif
    @endsection