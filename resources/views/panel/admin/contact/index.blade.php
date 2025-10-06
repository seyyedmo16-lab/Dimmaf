@extends('layouts.admin.master')

@section('title', 'All Tickets')

@section('content')

@if (\Session::has('success'))
@php
    $session = session('success');
@endphp
    <script>
        window.success = '{!! $session !!}';
        window.type = 'success';
    </script>
@endif

    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="buy-sell-widget">
                                <div class="flex-grow-1">
                                    <a href="{{route('admin.contact.history')}}" class="btn btn-success ps-5 pe-5">View History</a>
                                </div>
                                <div class="tab-content tab-content-default">
                                    @if($contacts->isEmpty())
                                        <div class="text-center mb-5 mt-5"><img src="{{asset('assets/img/no-records.png')}}"><p class="mb-5 mt-5">No new message</p></div>
                                    @else
                                        <table class="table">
                                            <thead>
                                                <td>state</td>
                                                <td>subject</td>
                                                <td>email</td>
                                                <td>name</td>
                                                <td>message</td>
                                                <td></td>
                                            </thead>
                                            <tbody>
                                                @foreach ($contacts as $contact)
                                                    <tr>
                                                        <td>{{ $contact->state->name ?? 'N/A' }}</td>
                                                        <td>{{ $contact->subject }}</td>
                                                        <td>{{ $contact->email }}</td>
                                                        <td>{{ $contact->name }}</td>
                                                        <td style="overflow:scroll; width:20%;">{{ $contact->message }}</td>
                                                        <td><a  class="btn btn-success ps-5 pe-5" href="{{route('admin.contact.show' , $contact->id)}}">reply</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
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
