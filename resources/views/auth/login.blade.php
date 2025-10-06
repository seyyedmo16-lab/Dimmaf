<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin | login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/images/favicon.png')}}">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('admin/css/style-en.css')}}">
</head>

<body>

    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">

        <div class="authincation">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-xl-5 col-md-6">
                        <div class="mini-logo text-center my-5">
                            <a href="landing.html"><img src="./images/logo.png" alt=""></a>
                        </div>
                        <div class="auth-form card">
                            <div class="card-header justify-content-center">
                                <h4 class="card-title">Sign in</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" name="myform" class="signin_validate"
                                    action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            placeholder="hello@example.com" name="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                            name="password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row d-flex justify-content-between mt-4 mb-2">
                                        <div class="mb-3 mb-0">
                                            <label class="toggle">
                                                <input class="toggle-checkbox" type="checkbox" name="remember">
                                                <div class="toggle-switch"></div>
                                                <span class="toggle-label">Remember me</span>
                                            </label>
                                        </div>
                                        <div class="mb-3 mb-0">
                                            <a href="reset.html">Forgot Password?</a>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success w-100">Sign in</button>
                                    </div>
                                </form>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <script src="{{ asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/validator/jquery.validate.js')}}"></script>
    <script src="{{ asset('admin/vendor/validator/validator-init.js')}}"></script>
    <script src="{{ asset('admin/js/scripts.js')}}"></script>



</body>

</html>
