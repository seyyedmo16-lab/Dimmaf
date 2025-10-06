@if (session('lang') == 'en' || session('lang') == null)
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="row col-md-8 col-lg-8 col-xl-8">
                        <div class="col-lg-4 col-md-4 footer-contact">
                        <img src="{{asset('assets/img/DIMMAF-LOGO.png')}}" style="max-width:115px">
                        <p>
                            <br>
                            <strong>Phone:</strong><a href="tel:+14168257730"> +14168257730<br></a>
                            
                            <strong>Email:</strong><a href="mailto:info@dimmaf.com"> info@dimmaf.com<br></a>
                            {{-- <strong>Email:</strong><a href="mailto:info@directimmigrationaffairs.com">info@directimmigrationaffairs.com<br></a> --}}
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-4 footer-links ml-auto">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{route('home')}}">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{route('aboutus')}}">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{route('whatdoweoffer.index')}}">What do we offer</a></li>
                            {{-- <li><i class="bx bx-chevron-right"></i> <a href="{{route('home')}}">Contact Us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{route('home')}}">Privacy policy</a></li> --}}
                        </ul>
                    </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-lg-4 float-right">
                        <img src="{{asset('assets\img\logo-canada.png')}}" style="width:100%; height:auto; border-radius:5px 5px 0 0;"/>
                    </div>

                    {{-- <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#"> Student Visa \ Exchange</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#"> Family migration</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#"> Setting up \ Entrepreneurial
                                    migration</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#"> permanent residency </a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#"> Work permit support </a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Join Us</h4>
                        <p>Answer the online questions of the existing world of design to be used basically.</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div> --}}

                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong></strong> All Rights Reserved ( 2022 - 2023 )
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/presento-bootstrap-corporate-template/ -->
                    Designed by <a href="http://www.idebin.com" target="_blank">IDEBIN</a>
                </div>
            </div>
            <div class="social-links text-center text-md-end pt-3 pt-md-0">
                {{-- <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> --}}
                <a href="https://www.linkedin.com/in/fariborz-azari-b1a56227" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
@elseif(session('lang') == 'fa')
    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="row col-md-8 col-lg-8 col-xl-8">
                        <div class="col-lg-4 col-md-4 footer-contact">
                        <img src="{{asset('assets/img/DIMMAF-LOGO.png')}}" style="max-width:115px">
                        <p>
                            <br>
                            <strong>شماره تماس:</strong><a href="tel:+14168257730"> +14168257730<br></a>
                            
                            <strong>ایمیل:</strong><a href="mailto:info@dimmaf.com"> info@dimmaf.com<br></a>
                            {{-- <strong>Email:</strong><a href="mailto:info@directimmigrationaffairs.com">info@directimmigrationaffairs.com<br></a> --}}
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-4 footer-links ml-auto">
                        <h4>لینک های مفید</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{route('home')}}">صفحه اصلی</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{route('aboutus')}}">درباره ما</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{route('whatdoweoffer.index')}}">آنچه ما ارائه می دهیم </a></li>
                            {{-- <li><i class="bx bx-chevron-right"></i> <a href="{{route('home')}}">Contact Us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{route('home')}}">Privacy policy</a></li> --}}
                        </ul>
                    </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-lg-4 float-right">
                        <img src="{{asset('assets\img\logo-canada.png')}}" style="width:100%; height:auto; border-radius:5px 5px 0 0;"/>
                    </div>

                    {{-- <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#"> Student Visa \ Exchange</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#"> Family migration</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#"> Setting up \ Entrepreneurial
                                    migration</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#"> permanent residency </a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#"> Work permit support </a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Join Us</h4>
                        <p>Answer the online questions of the existing world of design to be used basically.</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div> --}}

                </div>
            </div>
        </div>


        <div class="container d-md-flex py-4">

            <div class="ms-md-auto text-center text-md-end">
                <div class="copyright">
                    &copy; تمام حقوق سایت محفوظ است ( 2022 - 2023 ) <strong><span></span></strong>
                </div>
                <div class="credits">
                    طراحی <a href="http://www.idebin.com" target="_blank">ایده بین</a>
                </div>
            </div>
            <div class="social-links text-center text-md-end pt-3 pt-md-0">
                {{-- <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> --}}
                <a href="https://www.linkedin.com/in/fariborz-azari-b1a56227" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
@endif
