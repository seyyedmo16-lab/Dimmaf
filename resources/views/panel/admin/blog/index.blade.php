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
                                <div class="mb-3 row justify-content-around">
                                    <div class="flex-grow-1">
                                        <a href="{{route('admin.blog.create')}}" class="btn btn-success ps-5 pe-5">Create new blog</a>
                                    </div>
                                    <div class="float-right mx-5 " style="margin:20px ;"><span class="font-weight-bold"> count : {{App\Models\Blog::all()->count()}}</span></div>
                                </div>
                                <div class="tab-content tab-content-default">
                                    @if($blogs->isEmpty())
                                        <div class="text-center mb-5 mt-5"><img src="{{asset('assets/img/no-records.png')}}"><p class="mb-5 mt-5">there is no blog</p></div>
                                    @else
                                        <table class="table">
                                            <thead>
                                                <td></td>
                                                <td>title</td>
                                                <td>body</td>
                                                
                                                <td>category</td>
                                            
                                                <td>state</td>
                                                
                                                <td>edit</td>
                                            </thead>
                                            <tbody>
                                                @php $count=0; @endphp
                                                @foreach ($blogs as $blog)
                                                    <tr>
                                                        <td>{{++$count}}</td>
                                                        <td><a href="{{route('guest.blog.show' , $blog->slug)}}">{{ $blog->title_en }}</td>
                                                        <td>@if(empty($blog->body_en))
                                                            <span class=" badge bg-danger ms-2"><i class="la la-times"></i>english</span>
                                                            @else 
                                                            <span class=" badge bg-success ms-2"><i class="la la-check"></i>english</span>
                                                            @endif
                                                            @if(empty($blog->body_fa))
                                                            <span class=" badge bg-danger ms-2"><i class="la la-times"></i>persian</span>
                                                            @else
                                                            <span class="badge bg-success ms-2"><i class="la la-check"></i>persian</span>
                                                            @endif</a></td>
                                                            @isset($blog->category)
                                                            <td>{{ $blog->category->name }}</td>
                                                            @else
                                                            <td>No Category</td>
                                                        @endisset
                                                        @isset($blog->state)
                                                            <td>{{ $blog->state->name}}</td>
                                                            @else
                                                            <td>No State</td>
                                                        @endisset
                                                        
                                                        <td><a href="{{route('admin.blog.edit', $blog->slug)}}" class="btn btn-success ps-5 pe-5">edit</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$blogs->links('pagination.admin_pagination')}}
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
