<div class="sidebar">
    <a class="brand-logo" href="{{ route('admin.dashboard') }}">
        <img src="{{ asset('assets/img/DIMMAF-LOGO.png') }}" alt="">
    </a>
    <div class="menu">
        <ul>
            <li>
                <a href="{{ route('admin.contact.index') }}">
                    <span><i class="mdi mdi-message"></i></span>
                    <span class="nav-text">Contact</span>
                    @if (App\Models\Contact::whereNull('answer')->count() > 0)
                        <span class="bubble">
                            {{ App\Models\Contact::whereNull('answer')->count() }}
                        </span>
                    @endif
                </a>
            </li>
            <li><a href="{{ route('admin.faq.index') }}">
                    <span><i class="mdi mdi-calendar-question"></i></span>
                    <span class="nav-text">FAQ</span>
                </a>
            </li>
            <li><a href="{{ route('admin.state.index') }}">
                    <span><i class="mdi mdi-city"></i></span>
                    <span class="nav-text">States</span>
                </a>
            </li>
            <li><a href="{{ route('admin.blog.index') }}">
                    <span><i class="mdi mdi-blogger"></i></span>
                    <span class="nav-text">Blog</span>
                </a>
            </li>
            <li><a href="{{ route('admin.category.index') }}">
                    <span><i class="mdi mdi-source-fork"></i></span>
                    <span class="nav-text">Category</span>
                </a>
            </li>
            
            <li><a href="{{ route('admin.aboutUs.show') }}">
                    <span><i class="mdi mdi-file-document"></i></span>
                    <span class="nav-text">About Us</span>
                </a>
            </li>

            <li><a href="{{ route('admin.whatDo.index') }}">
                    <span><i class="mdi mdi-file-document"></i></span>
                    <span class="nav-text">What Do We Offer</span>
                </a>
            </li>

            <li><a href="{{ route('admin.info.index') }}">
                    <span><i class="mdi mdi-cards"></i></span>
                    <span class="nav-text">Info Tab</span>
                </a>
            </li>

            <li><a href="{{ route('admin.profile.index') }}">
                    <span><i class="mdi mdi-account"></i></span>
                    <span class="nav-text">Admin profile</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="sidebar-footer">
        {{-- <div class="social">
            <a href="#"><i class="fa fa-youtube-play"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
        </div> --}}

    </div>

</div>
