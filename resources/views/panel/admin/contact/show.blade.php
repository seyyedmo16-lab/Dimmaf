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
                        <div class="card-header justify-content-center">
                            <h4 class="card-title">{{$contact->subject}}</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" class="signin_validate" action="{{route('admin.contact.update',$contact->id)}}">
                                @method('PUT')
                                @csrf
                                <div class="row d-flex justify-content-between mt-4 mb-2">
                                    
                                    <label class="toggle">
                                        <span class="toggle-label">{{$contact->message}}</span>
                                    </label>
                               
                                </div>
                                <div class="mb-3">
                                    <textarea  class="form-control" rows="10" placeholder="type your answer here"
                                        name="answer"></textarea>
                                </div>
                                <div class="text-center mb-5">
                                    <button type="submit" class="btn btn-success ps-5 pe-5">Send</button>
                                </div>
                                @isset($contact->answer)
                                    <div class="chart-stat">
                                        <p class="mb-1"><strong>answer : </strong>{{$contact->answer}}</p>
                                    </div>
                                @endisset
                                <div class="chart-stat">
                                    <p class="mb-1"><strong>Email : </strong>{{$contact->email}}</p>
                                </div>
                                <div class="chart-stat">
                                    <p class="mb-1"><strong>Name : </strong>{{$contact->name}}</p>
                                </div>
                                <div class="chart-stat">
                                    <p class="mb-1"><strong>State : </strong>{{$contact->state->name}}</p>
                                </div>
                               
                                
                            </form>
                            <div class="new-account mt-5">
                                <p>{{$contact->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                    </div>
                   
                    <p class="p-4"></p>
                </div>
            </div>

        </div>
    </div>

@endsection
