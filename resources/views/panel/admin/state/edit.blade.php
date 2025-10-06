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
                    <form method="post" class="signin_validate" action="{{route('admin.state.update',$state->id)}}">
                        @csrf @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <strong>{{$state->name}}</strong>
                            </div>
                            <div class="card-body state-card" >
                                <div class="state-input chart-stat">
                                    <label class="me-sm-2">investment facilities :</label>
                                    <input type="number" class="form-control" name="investment_facilities" value="{{$state->investment_facilities}}"></div>
                                <div class="state-input chart-stat">
                                    <label class="me-sm-2">education rank :</label>
                                    <input type="number" class="form-control" name="education_rank" value="{{$state->education_rank}}"></div>
                                <div class="state-input chart-stat">
                                    <label class="me-sm-2">tourism :</label>
                                    <input type="number" class="form-control" name="tourism" value="{{$state->tourism}}"></div>
                                <div class="state-input chart-stat">
                                    <label class="me-sm-2">jobs and business :</label>
                                    <input type="number" class="form-control" name="jobs_and_business" value="{{$state->jobs_and_business}}"></div>
                                <div class="state-input chart-stat">
                                    <label class="me-sm-2">accommodation :</label>
                                    <input type="number" class="form-control" name="accommodation" value="{{$state->accommodation}}"></div>
                                <div class="state-input chart-stat">
                                    <label class="me-sm-2">status</label>
                                    <select class="form-control" name="is_active">
                                        <option value="1" >active</option>
                                        <option value="0"@if($state->is_active == 0){{'selected'}} @endif>inactive</option>
                                    </select></div>
                                <div class="edit-option">
                                    <button  class="btn btn-success ps-5 pe-5" type="submit">edit</button>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                   
                    
                </div>
            </div>

        </div>
    </div>

@endsection
