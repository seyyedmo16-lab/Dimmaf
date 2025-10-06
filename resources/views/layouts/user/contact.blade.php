@if(isset($blog->state) || isset($blog) || isset($state))
    
    @if (session('lang') == 'en' || session('lang') == null)

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                @if(!isset($blog->state))
                <h2>Contact</h2>
                <p>communicate with us for more information </p>
                @else
                    <h2>Contact us for advice about {{$blog->state->name}}</h2>
                    <p>Our experts will respond to your messages as soon as possible </p>
                @endif
            </div>

            <div id='cantact_us' class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-6">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-envelope"></i>
                                <h3>Email Us</h3>
                                <a href="mailto:info@dimmaf.com"> info@dimmaf.com<br></a>
                            {{-- <a href="mailto:info@directimmigrationaffairs.com">info@directimmigrationaffairs.com<br></a> --}}
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="info-box">
                                <i class="bx bx-phone-call"></i>
                                <h3>Call Us</h3>
                                <a href="tel:+14168257730">+1 416 825 7730</a></p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <form id="contact_us" action="{{route('guest.contact.store')}}" method="post" role="form" class="php-email-form">
                        @csrf
                        <input type="hidden" value="@isset($blog){{$blog->state->id}}@else{{1}}@endisset" name="state_id">
                        <div class="row">
                            <div class="col form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                    required>
                                    @error('name')
                            <div class="error-message">{{$message}}</div>
                            @enderror
                            </div>
                            
                            <div class="col form-group">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" required>
                                    @error('email')
                                    <div class="error-message">{{$message}}</div>
                                    @enderror
                            </div>
                           
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                required>
                                @error('subject')
                        <div class="error-message">{{$message}}</div>
                        @enderror
                        </div>
                        
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                required></textarea>
                                @error('message')
                                <div class="error-message">{{$message}}</div>
                                @enderror
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section>
    @elseif (session('lang') == 'fa')
    
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    @if(!isset($blog->state))
                    <h2>ارتباط با ما</h2>
                    <p>برای اطلاعات بیشتر با ما در تماس باشید</p>
                    @else
                        <h2>برای دریافت مشاوره در خصوص {{$blog->state->name}} با ما در تماس باشید</h2>
                        <p>کارشناسان ما در اسرع وقت به پیام های شما پاسخ خواهند داد</p>
                    @endif
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">

                    <div class="col-lg-6">

                        <div class="row">
                         
                            <div class="col-md-12">
                                <div class="info-box">
                                    <i class="bx bx-envelope"></i>
                                    <h3>ایمیل</h3>
                                    <a href="mailto:info@dimmaf.com"> info@dimmaf.com<br></a>
                            {{-- <a href="mailto:info@directimmigrationaffairs.com">info@directimmigrationaffairs.com<br></a> --}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="info-box mt-2">
                                    <i class="bx bx-phone-call"></i>
                                    <h3>شماره تماس</h3>
                                    <a href="tel:+14168257730"> +14168257730</a><br>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <form id="contact_us" action="{{route('guest.contact.store')}}" method="post" role="form" class="php-email-form">
                            @csrf
                            <input type="hidden" value="@isset($blog){{$blog->state->id}}@else{{2}}@endisset" name="state_id">
                            <div class="row">
                                <div class="col form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="نام "
                                        required>
                                        @error('name')
                                <div class="error-message">{{$message}}</div>
                                @enderror
                                </div>
                                <div class="col form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="ایمیل "
                                        required>
                                        @error('email')
                            <div class="error-message">{{$message}}</div>
                            @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="موضوع"
                                    required>
                                    @error('subject')
                            <div class="error-message">{{$message}}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" placeholder="پیام"
                                    required></textarea>
                                    @error('message')
                            <div class="error-message">{{$message}}</div>
                            @enderror
                            </div>
                            <div class="my-3">
                                <div class="loading">در انتظار...</div>
                                <div class="error-message"></div>
                                <div class="sent-message">پیام شما ارسال شد.با تشکر!</div>
                            </div>
                            <div class="text-center"><button type="submit">ارسال پیام</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section>
    @endif
@endif
