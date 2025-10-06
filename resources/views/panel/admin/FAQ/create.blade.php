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
                    <form method="post" class="signin_validate" action="{{route('admin.faq.store')}}">
                        @csrf 
                        <div class="card">
                            <div class="card-body">
                                
                                <p class="p-4 chart-stat mt-5">
                                    <label class="me-sm-2">English question :</label>
                                    <textarea class="form-control w-100" name="question_en" id="" cols="30" rows="5">{{old('question_en')}}</textarea></p>
                                
                                <p class="p-4 chart-stat mt-5">
                                    <label class="me-sm-2">English answer :</label>
                                    <textarea class="form-control w-100" name="answer_en" id="" cols="30" rows="5">{{old('answer_en')}}</textarea></p>
                                
                                <p class="p-4 chart-stat mt-5"   style="direction:rtl;text-align:right;">
                                    <label class="me-sm-2">سوال فارسی :</label>
                                    <textarea class="form-control w-100" name="question_fa" id="" cols="30" rows="5">{{old('question_fa')}}</textarea></p>
                               
                                <p class="p-4 chart-stat mt-5"  style="direction:rtl;text-align:right;">
                                    <label class="me-sm-2">پاسخ فارسی :</label>
                                    <textarea class="form-control w-100" name="answer_fa" id="" cols="30" rows="5">{{old('answer_fa')}}</textarea></p>
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
