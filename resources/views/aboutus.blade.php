@extends('layouts.user.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>About Us</h1>
            @if($about)
                <div class="about-content">
                    @if($about->body_en)
                        <div class="content-en">
                            {!! $about->body_en !!}
                        </div>
                    @endif
                    @if($about->body_fa)
                        <div class="content-fa">
                            {!! $about->body_fa !!}
                        </div>
                    @endif
                </div>
            @else
                <p>No about us content available.</p>
            @endif
        </div>
    </div>
</div>
@endsection
