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
                    <div class="card">
                        <div class="card-body">
                            <div class="buy-sell-widget">

                                <div class="tab-content tab-content-default">

                                    <div class="text-center mb-5 mt-5"><img src="{{asset('assets/img/panel-admin.png')}}"><p class="mb-5 mt-5">Dimmaf website management panel</p></div>

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
