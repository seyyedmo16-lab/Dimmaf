@extends('layouts.admin.master')

@section('title', 'All blogs')

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
                    <div class="card">
                        <div class="card-body">
                            <div class="buy-sell-widget">

                                <div class="tab-content tab-content-default">

                                    <div class="chart-content text-center">
                                        <div class="row">

                                            @foreach($categories as $category)
                                            <div class="col-xl-4 col-sm-6 col-6 mb-5">
                                                <div class="chart-stat">
                                                    <p class="mb-1">{{$category->created_at->diffForHumans()}}</p>
                                                    <strong>{{$category->name}}</strong>
                                                    <a href="{{route('admin.category.edit' , $category->id)}}"><i class="fa fa-pencil"></i></a>
                                                </div>
                                               
                                            </div>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <p class="p-4"></p>
                </div>
            </div>

        </div>
    </div>

@endsection
