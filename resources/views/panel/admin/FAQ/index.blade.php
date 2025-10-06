@extends('layouts.admin.master')

@section('title', 'All Tickets')

@section('content')

    @if (\Session::has('success'))
        @javascript('success', session('success'))
        @javascript('type', 'success')
    @elseif(\Session::has('info'))
        @javascript('info', session('info'))
        @javascript('type', 'info')
    @elseif(\Session::has('warning'))
        @javascript('warning', session('warning'))
        @javascript('type', 'warning')
    @elseif(\Session::has('error'))
        @javascript('error', session('error'))
        @javascript('type', 'error')
    @endif

    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="mb-3 row">
                        <a href="{{route('admin.faq.create')}}" class="btn btn-success ps-5 pe-5">Create new FAQ</a>
                    </div>
                    @foreach ($faqs as $faq)
                    <div class="card">
                        <div class="card-body">
                            <p class="p-4 chart-stat">{{$faq->question_en}}</p>
                            <p class="p-4 chart-stat">{{$faq->answer_en}}</p>
                            <p class="p-4 chart-stat"  style="direction:rtl;text-align:right;">{{$faq->question_fa}}</p>
                            <p class="p-4 chart-stat"  style="direction:rtl;text-align:right;">{{$faq->answer_fa}}</p>
                            <div class="edit-option">
                                <a href="{{route('admin.faq.edit' , $faq->id)}}"><i class="fa fa-pencil"></i></a>
                                <a onclick="return confirm('Are you sure?')" href="{{route('admin.faq.delete',$faq->id)}}"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                    
                </div>
            </div>

        </div>
    </div>

@endsection
