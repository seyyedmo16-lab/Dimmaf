@extends('layouts.admin.master')

@section('title', 'All blogs')

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
                                <div class="tab-content tab-content-default">
                                    @if($whatDoes->isEmpty())
                                        <div class="text-center mb-5 mt-5"><img src="{{asset('assets/img/no-records.png')}}"><p class="mb-5 mt-5">there is no blog</p></div>
                                    @else
                                        <table class="table">
                                            <thead>
                                                <td class="text-center">ID</td>
                                                <td class="text-center">Title-EN</td>
                                                <td class="text-center">Title-FA</td>
                                                <td class="text-center">Description-EN</td>
                                                <td class="text-center">Description-FA</td>
                                                <td class="text-center">Body</td>
                                                
                                                <td class="text-center">Edit</td>
                                            </thead>
                                            <tbody>
                                                @php $count=0; @endphp
                                                @foreach ($whatDoes as $whatDo)
                                                    <tr>
                                                        <td class="text-center">{{$whatDo->id}}</td>
                                                        <td class="text-center">{{$whatDo->title_en ?? 'Empty'}}</td>
                                                        <td class="text-center">{{$whatDo->title_fa ?? 'Empty'}}</td>
                                                        <td class="text-center">{{$whatDo->description_en ?substr($whatDo->description_en,0,29)."...": 'Empty'}}</td>
                                                        <td class="text-center">{{$whatDo->description_fa ?mb_substr($whatDo->description_fa,0,29)."...": 'Empty'}}</td>
                                                        <td class="text-center">@if(empty($whatDo->body_en))
                                                            <span class=" badge bg-danger ms-2"><i class="la la-times"></i>english</span>
                                                            @else 
                                                            <span class=" badge bg-success ms-2"><i class="la la-check"></i>english</span>
                                                            @endif
                                                            @if(empty($whatDo->body_fa))
                                                            <span class=" badge bg-danger ms-2"><i class="la la-times"></i>persian</span>
                                                            @else
                                                            <span class="badge bg-success ms-2"><i class="la la-check"></i>persian</span>
                                                            @endif</a></td>
                                                        
                                                        <td class="text-center"><a href="{{route('admin.whatDo.edit', $whatDo->id)}}" class="btn btn-success ps-5 pe-5">edit</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                                
                        </div>
                    </div>
                    <p class="p-4"></p>
                </div>
            </div>

        </div>
    </div>

@endsection
