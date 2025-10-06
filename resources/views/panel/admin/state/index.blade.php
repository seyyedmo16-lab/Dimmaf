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

                                    <table class="table">
                                        <thead>
                                            <td>symbol</td>
                                            <td>name</td>
                                            <td>investment</td>
                                            <td>education</td>
                                            <td>tourism</td>
                                            <td>jobs</td>
                                            <td>accommodation</td>
                                            <td>status</td>
                                            <td></td>
                                        </thead>
                                        <tbody>
                                            @isset($states)
                                                @foreach ($states as $state)
                                                    @if($state->name == 'general-en' || $state->name == 'general-fa')
                                                        @continue
                                                    @endif
                                                    <tr>
                                                        <td>{{ $state->symbol }}</td>
                                                        <td><a href="{{route('admin.state.edit' , $state->id)}}">{{ $state->name }}</a></td>
                                                        <td>{{ $state->investment_facilities }}</td>
                                                        <td>{{ $state->education_rank }}</td>
                                                        <td>{{ $state->tourism }}</td>
                                                        <td>{{ $state->jobs_and_business }}</td>
                                                        <td>{{ $state->accommodation }}</td>
                                                        <td>@if($state->is_active)<span class="badge bg-success">active</span> @else <span class="badge bg-danger">inactive</span> @endif </td>
                                                        <td><a href="{{route('admin.state.edit' , $state->id)}}" class="btn btn-small btn-success ">edit</a></td>
                                                    </tr>
                                                @endforeach
                                            @else
                                            <p>there is no new message</p>
                                            @endisset
                                        </tbody>
                                    </table>
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
