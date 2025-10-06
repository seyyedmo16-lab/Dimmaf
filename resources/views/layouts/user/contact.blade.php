@if(isset($blog->state) || isset($blog) || isset($state))
    
    @if (session('lang') == 'en' || session('lang') == null)

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                @if(!isset($blog->state))
                <h2><i class="bx bx-envelope"></i> Contact Us</h2>
                <p>Get in touch with our immigration experts for personalized consultation</p>
                @else
                    <h2><i class="bx bx-map"></i> Contact us for advice about {{$blog->state->name}}</h2>
                    <p>Our experts will respond to your messages as soon as possible</p>
                @endif
            </div>

            <div id='cantact_us' class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-5">
                    <div class="contact-info">
                        <div class="info-box">
                            <div class="info-icon">
                                <i class="bx bx-envelope"></i>
                            </div>
                            <div class="info-content">
                                <h4>Email Us</h4>
                                <p>Send us an email anytime</p>
                                <a href="mailto:info@dimmaf.com" class="contact-link">
                                    <i class="bx bx-envelope"></i> info@dimmaf.com
                                </a>
                            </div>
                        </div>

                        <div class="info-box">
                            <div class="info-icon">
                                <i class="bx bx-phone-call"></i>
                            </div>
                            <div class="info-content">
                                <h4>Call Us</h4>
                                <p>Speak with our experts directly</p>
                                <a href="tel:+14168257730" class="contact-link">
                                    <i class="bx bx-phone"></i> +1 416 825 7730
                                </a>
                            </div>
                        </div>

                        <div class="info-box">
                            <div class="info-icon">
                                <i class="bx bx-time"></i>
                            </div>
                            <div class="info-content">
                                <h4>Business Hours</h4>
                                <p>Monday - Friday: 9:00 AM - 6:00 PM<br>
                                Saturday: 10:00 AM - 4:00 PM<br>
                                Sunday: Closed</p>
                            </div>
                        </div>

                        <div class="info-box">
                            <div class="info-icon">
                                <i class="bx bx-map"></i>
                            </div>
                            <div class="info-content">
                                <h4>Location</h4>
                                <p>Toronto, Ontario, Canada<br>
                                Serving clients worldwide</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="contact-form-wrapper">
                        <div class="form-header">
                            <h3><i class="bx bx-send"></i> Send us a Message</h3>
                            <p>Fill out the form below and we'll get back to you within 24 hours</p>
                        </div>
                        
                        <form id="contact_us" action="{{route('guest.contact.store')}}" method="post" role="form" class="php-email-form">
                            @csrf
                            <input type="hidden" value="@isset($blog){{$blog->state->id}}@else{{1}}@endisset" name="state_id">
                            
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                               id="name" placeholder="Your Name" value="{{ old('name') }}" required>
                                        <label for="name"><i class="bx bx-user"></i> Your Name</label>
                                    </div>
                                    @error('name')
                                        <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 form-group">
                                    <div class="form-floating">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                               name="email" id="email" placeholder="Your Email" value="{{ old('email') }}" required>
                                        <label for="email"><i class="bx bx-envelope"></i> Your Email</label>
                                    </div>
                                    @error('email')
                                        <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror" 
                                           name="subject" id="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                                    <label for="subject"><i class="bx bx-message-square-detail"></i> Subject</label>
                                </div>
                                @error('subject')
                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <div class="form-floating">
                                    <textarea class="form-control @error('message') is-invalid @enderror" 
                                              name="message" id="message" rows="5" placeholder="Your Message" required>{{ old('message') }}</textarea>
                                    <label for="message"><i class="bx bx-message"></i> Your Message</label>
                                </div>
                                @error('message')
                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            
                            <div class="form-messages">
                                <div class="loading">
                                    <i class="bx bx-loader-alt bx-spin"></i> Sending your message...
                                </div>
                                <div class="error-message"></div>
                                <div class="sent-message">
                                    <i class="bx bx-check-circle"></i> Your message has been sent successfully. Thank you!
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn-send">
                                    <i class="bx bx-send"></i> Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section>
    @elseif (session('lang') == 'fa')
    
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact" dir="rtl">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    @if(!isset($blog->state))
                    <h2><i class="bx bx-envelope"></i> ارتباط با ما</h2>
                    <p>با کارشناسان مهاجرت ما برای مشاوره شخصی‌سازی شده در تماس باشید</p>
                    @else
                        <h2><i class="bx bx-map"></i> برای دریافت مشاوره در خصوص {{$blog->state->name}} با ما در تماس باشید</h2>
                        <p>کارشناسان ما در اسرع وقت به پیام‌های شما پاسخ خواهند داد</p>
                    @endif
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">

                    <div class="col-lg-5">
                        <div class="contact-info">
                            <div class="info-box">
                                <div class="info-icon">
                                    <i class="bx bx-envelope"></i>
                                </div>
                                <div class="info-content">
                                    <h4>ایمیل ما</h4>
                                    <p>هر زمان برای ما ایمیل بفرستید</p>
                                    <a href="mailto:info@dimmaf.com" class="contact-link">
                                        <i class="bx bx-envelope"></i> info@dimmaf.com
                                    </a>
                                </div>
                            </div>

                            <div class="info-box">
                                <div class="info-icon">
                                    <i class="bx bx-phone-call"></i>
                                </div>
                                <div class="info-content">
                                    <h4>تماس تلفنی</h4>
                                    <p>مستقیماً با کارشناسان ما صحبت کنید</p>
                                    <a href="tel:+14168257730" class="contact-link">
                                        <i class="bx bx-phone"></i> +1 416 825 7730
                                    </a>
                                </div>
                            </div>

                            <div class="info-box">
                                <div class="info-icon">
                                    <i class="bx bx-time"></i>
                                </div>
                                <div class="info-content">
                                    <h4>ساعات کاری</h4>
                                    <p>دوشنبه تا جمعه: 9:00 صبح - 6:00 عصر<br>
                                    شنبه: 10:00 صبح - 4:00 عصر<br>
                                    یکشنبه: تعطیل</p>
                                </div>
                            </div>

                            <div class="info-box">
                                <div class="info-icon">
                                    <i class="bx bx-map"></i>
                                </div>
                                <div class="info-content">
                                    <h4>موقعیت</h4>
                                    <p>تورنتو، انتاریو، کانادا<br>
                                    خدمات‌رسانی به مشتریان در سراسر جهان</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="contact-form-wrapper">
                            <div class="form-header">
                                <h3><i class="bx bx-send"></i> برای ما پیام بفرستید</h3>
                                <p>فرم زیر را پر کنید و ما ظرف 24 ساعت به شما پاسخ خواهیم داد</p>
                            </div>
                            
                            <form id="contact_us" action="{{route('guest.contact.store')}}" method="post" role="form" class="php-email-form">
                                @csrf
                                <input type="hidden" value="@isset($blog){{$blog->state->id}}@else{{2}}@endisset" name="state_id">
                                
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <div class="form-floating">
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                                   id="name" placeholder="نام شما" value="{{ old('name') }}" required>
                                            <label for="name"><i class="bx bx-user"></i> نام شما</label>
                                        </div>
                                        @error('name')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                        <div class="form-floating">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                                   name="email" id="email" placeholder="ایمیل شما" value="{{ old('email') }}" required>
                                            <label for="email"><i class="bx bx-envelope"></i> ایمیل شما</label>
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('subject') is-invalid @enderror" 
                                               name="subject" id="subject" placeholder="موضوع" value="{{ old('subject') }}" required>
                                        <label for="subject"><i class="bx bx-message-square-detail"></i> موضوع</label>
                                    </div>
                                    @error('subject')
                                        <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <div class="form-floating">
                                        <textarea class="form-control @error('message') is-invalid @enderror" 
                                                  name="message" id="message" rows="5" placeholder="پیام شما" required>{{ old('message') }}</textarea>
                                        <label for="message"><i class="bx bx-message"></i> پیام شما</label>
                                    </div>
                                    @error('message')
                                        <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-messages">
                                    <div class="loading">
                                        <i class="bx bx-loader-alt bx-spin"></i> در حال ارسال پیام شما...
                                    </div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">
                                        <i class="bx bx-check-circle"></i> پیام شما با موفقیت ارسال شد. متشکریم!
                                    </div>
                                </div>
                                
                                <div class="text-center">
                                    <button type="submit" class="btn-send">
                                        <i class="bx bx-send"></i> ارسال پیام
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    @endif
@endif

<style>
/* Contact Section Styles */
.contact {
    padding: 80px 0;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
}

.contact .section-title h2 {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 20px;
}

.contact .section-title p {
    color: #6c757d;
    font-size: 1.1rem;
    margin-bottom: 40px;
}

/* Contact Info Styles */
.contact-info {
    padding: 20px 0;
}

.contact-info .info-box {
    background: white;
    border-radius: 15px;
    padding: 30px;
    margin-bottom: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    display: flex;
    align-items: flex-start;
    gap: 20px;
}

.contact-info .info-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.contact-info .info-icon {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
}

.contact-info .info-content h4 {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 10px;
    font-size: 1.2rem;
}

.contact-info .info-content p {
    color: #6c757d;
    margin-bottom: 15px;
    line-height: 1.6;
}

.contact-info .contact-link {
    color: #667eea;
    text-decoration: none;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: color 0.3s ease;
}

.contact-info .contact-link:hover {
    color: #764ba2;
    text-decoration: none;
}

/* Contact Form Styles */
.contact-form-wrapper {
    background: white;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    height: fit-content;
}

.contact-form-wrapper .form-header {
    text-align: center;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid #f8f9fa;
}

.contact-form-wrapper .form-header h3 {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.contact-form-wrapper .form-header p {
    color: #6c757d;
    margin: 0;
}

/* Form Floating Labels */
.form-floating {
    position: relative;
    margin-bottom: 20px;
}

.form-floating .form-control {
    height: 60px;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    padding: 20px 15px 10px;
    font-size: 16px;
    transition: all 0.3s ease;
    background: #f8f9fa;
}

.form-floating .form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    background: white;
}

.form-floating label {
    position: absolute;
    top: 15px;
    left: 15px;
    color: #6c757d;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.3s ease;
    pointer-events: none;
    display: flex;
    align-items: center;
    gap: 8px;
}

.form-floating .form-control:focus ~ label,
.form-floating .form-control:not(:placeholder-shown) ~ label {
    top: 5px;
    font-size: 12px;
    color: #667eea;
}

.form-floating textarea.form-control {
    height: auto;
    min-height: 120px;
    resize: vertical;
}

/* Send Button */
.btn-send {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    padding: 15px 40px;
    border-radius: 50px;
    font-size: 16px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
}

.btn-send:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
    color: white;
}

.btn-send:active {
    transform: translateY(0);
}

/* Form Messages */
.form-messages {
    margin: 20px 0;
    text-align: center;
}

.form-messages .loading,
.form-messages .error-message,
.form-messages .sent-message {
    display: none;
    padding: 15px;
    border-radius: 10px;
    font-weight: 500;
}

.form-messages .loading {
    background: #e3f2fd;
    color: #1976d2;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.form-messages .error-message {
    background: #ffebee;
    color: #c62828;
}

.form-messages .sent-message {
    background: #e8f5e8;
    color: #2e7d32;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

/* Error Messages */
.invalid-feedback {
    color: #dc3545;
    font-size: 14px;
    margin-top: 5px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.invalid-feedback::before {
    content: "⚠";
    font-size: 16px;
}

/* RTL Support */
[dir="rtl"] .contact-info .info-box {
    text-align: right;
}

[dir="rtl"] .form-floating label {
    right: 15px;
    left: auto;
}

[dir="rtl"] .form-floating .form-control {
    text-align: right;
}

/* Responsive Design */
@media (max-width: 768px) {
    .contact {
        padding: 60px 0;
    }
    
    .contact-form-wrapper {
        padding: 30px 20px;
        margin-top: 30px;
    }
    
    .contact-info .info-box {
        padding: 20px;
        flex-direction: column;
        text-align: center;
    }
    
    .contact-info .info-icon {
        align-self: center;
    }
    
    .btn-send {
        width: 100%;
        justify-content: center;
    }
}

/* Animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.contact-info .info-box,
.contact-form-wrapper {
    animation: fadeInUp 0.6s ease-out;
}

.contact-info .info-box:nth-child(2) {
    animation-delay: 0.1s;
}

.contact-info .info-box:nth-child(3) {
    animation-delay: 0.2s;
}

.contact-info .info-box:nth-child(4) {
    animation-delay: 0.3s;
}
</style>
