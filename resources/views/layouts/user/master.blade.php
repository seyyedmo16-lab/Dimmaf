<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  @if (session('lang') == 'en' || session('lang') == null)
        <title> Dimmaf ( Direct Immigration Affairs)</title>
    @elseif (session('lang') == 'fa')
        <title>Dimmaf (مشاوره امور مهاجرت به کانادا)</title>
    @endif
  <meta content="" name="description">
  <meta content="" name="keywords">
  
        @include('layouts.user.head')
    </head>
    <body>

  
         @include('layouts.user.header')
        <!-- start #main -->
        <main id="main">
            @yield('content')
            @include('layouts.user.contact')
        </main>
        <!-- End #main -->
        @include('layouts.user.footer')
        @include('layouts.user.footer-script')

    </body>
</html>
