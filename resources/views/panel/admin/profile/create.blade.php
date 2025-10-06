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
                        <div class="card-header">
                            <h4 class="card-title">User Profile</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.profile.update')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-xl-12">
                                        <label class="me-sm-2">New Email</label>
                                        <input name="email" type="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="mb-3 col-xl-12">
                                        <label class="me-sm-2">New Password</label>
                                        <input name="password" type="password" class="form-control"
                                            placeholder="**********">
                                        <p class="mt-2 mb-0">please enter new email and password
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                   
                    <p class="p-4"></p>
                </div>
            </div>

        </div>
    </div>

@endsection
