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
                            <form action="{{ route('admin.blog.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="mb-5 col-xl-12">
                                        <label class="me-sm-2">English title :</label>
                                        <input type="text" name="title_en" class="form-control" placeholder="english title" value="{{old('title_en')}}">
                                        @error('title_en')
                                            <div class="alert bg-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-5 col-xl-12">
                                        <label class="me-sm-2">Persian Title :</label>
                                        <input type="text" name="title_fa" class="form-control" placeholder="عنوان فارسی" value="{{old('title_fa')}}">
                                        @error('title_fa')
                                            <div class="alert bg-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-5 col-xl-12">
                                        <label class="me-sm-2">Down button link :</label>
                                        <input type="text" name="link" class="form-control" placeholder="paste url here" value="@isset($blog->link){{$blog->link}}@endisset">
                                        @error('link')
                                            <div class="alert bg-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-5 row col-xl-12 col-md-12">
                                        {{-- <div class="col">
                                            <label class="me-sm-2">Category :</label>
                                            <select class="form-control" name="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="alert bg-danger">{{ $message }}</div>
                                            @enderror
                                        </div> --}}
                                        <div class="col" id="states">
                                            <label class="me-sm-2">Provinces :</label>
                                            <select  class="form-control" name="state_id" >
                                                @foreach ($states as $state)
                                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-5 col-xl-12">
                                        <label class="me-sm-2">English Body :</label>
                                        <textarea name="body_en" id="ckeditor_en" rows="20" class="form-control">{{old('body_en')}}
                                            </textarea>
                                        @error('body_en')
                                            <div class="alert bg-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-5 col-xl-12">

                                        <label class="me-sm-2">Persian Body :</label>
                                        <textarea name="body_fa" id="ckeditor_fa" rows="20" class="form-control">{{old('body_fa')}}
                                            </textarea>
                                        @error('body_fa')
                                            <div class="alert bg-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success">Save</button>
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

    <!--Summernote js-->
    <script src="{{ URL::asset('/admin/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ URL::asset('/admin/pages/form-editors.int.js') }}"></script>
    <script src="{{URL::asset('/admin/ckeditor/ckeditor.js')}}"></script>

<script type="text/javascript">

        CKEDITOR.replace('ckeditor_en', {
            alignment: {
                options: [ 'left', 'right' , 'center','html5video'],
            },
            extraPlugins : ['html5video'],
            height: '600',
            language: 'en',
            filebrowserUploadUrl: "{{route('admin.ckeditor.image-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form' ,
        });
        CKEDITOR.replace('ckeditor_fa', {
            alignment: {
                options: [ 'left', 'right' , 'center','html5video'],
            },
            extraPlugins : ['html5video'],
            height: '600',
            language: 'fa',
            filebrowserUploadUrl: "{{route('admin.ckeditor.image-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form' ,
        });

        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {

            $(".js-example-basic-single").select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });
        });

</script>
@endsection
