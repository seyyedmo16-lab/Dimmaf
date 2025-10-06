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
                            <form action="{{ route('admin.aboutUs.update') }}" method="post"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                @if($about->image)
                                <div class="col-lg-12 entries">
                                    <label class="me-sm-2" for="image">Curently Image:</label>
                                    <img class="mb-5 form-control" id="about_img"
                                    src="{{ asset($about->image) }}" style="width:100%; height:auto; border-radius:5px 5px 0 0;"/>
                                </div>
                                @endif
                                <div class="mb-5 ml-1 col-xl-12">
                                    <div class="border border-black border-runded " style="background-color:  #f6f8fe">
                                        <label class="me-sm-2" for="image">Choose a picture:</label>

                                        <input class="file-controll" type="file" id="image" name="image"
                                            accept="image/png, image/jpeg , image/jpg , image/bmp">

                                        @error('image')
                                            <div class="alert bg-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-5 col-xl-12">
                                        <label class="me-sm-2">English Body :</label>
                                        <textarea name="body_en" id="ckeditor_en" rows="20" class="form-control">{{ old('body_en') ?? $about->body_en }}
                                            </textarea>
                                        @error('body_en')
                                            <div class="alert bg-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-5 col-xl-12">

                                        <label class="me-sm-2">Persian Body :</label>
                                        <textarea name="body_fa" id="ckeditor_fa" rows="20" class="form-control">{{ old('body_fa') ?? $about->body_fa }}
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
    <script src="{{ URL::asset('/admin/ckeditor/ckeditor.js') }}"></script>

    <script type="text/javascript">
     
        CKEDITOR.replace('ckeditor_en', {
            alignment: {
                options: ['left', 'right', 'center', 'html5video'],
            },
            extraPlugins: ['html5video'],
            height: '600',
            language: 'en',
            filebrowserUploadUrl: "{{ route('admin.ckeditor.image-upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
        });
        CKEDITOR.replace('ckeditor_fa', {
            alignment: {
                options: ['left', 'right', 'center', 'html5video'],
            },
            extraPlugins: ['html5video'],
            height: '600',
            language: 'fa',
            filebrowserUploadUrl: "{{ route('admin.ckeditor.image-upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
        });
    </script>
@endsection
