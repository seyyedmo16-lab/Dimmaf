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
                    <form method="post" class="signin_validate" action="{{route('admin.faq.update',$faq->id)}}">
                        @csrf @method('PUT')
                        <div class="card">
                            <div class="card-body">
                                <p class="p-4 chart-stat"><textarea class="form-control w-100" name="question_en" id="" cols="30" rows="5">{{$faq->question_en}}</textarea></p>
                                <p class="p-4 chart-stat"><textarea class="form-control w-100" name="answer_en" id="" cols="30" rows="5">{{$faq->answer_en}}</textarea></p>
                                <p class="p-4 chart-stat"   style="direction:rtl;text-align:right;"><textarea class="form-control w-100" name="question_fa" id="" cols="30" rows="5">{{$faq->question_fa}}</textarea></p>
                                <p class="p-4 chart-stat"  style="direction:rtl;text-align:right;"><textarea class="form-control w-100" name="answer_fa" id="" cols="30" rows="5">{{$faq->answer_fa}}</textarea></p>
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
