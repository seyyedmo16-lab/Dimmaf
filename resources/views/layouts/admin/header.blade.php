<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <nav class="navbar">

                    <div class="header-search d-flex align-items-center">
                        {{-- <a class="brand-logo me-3" href="index.html">
                            <img src="{{asset('assets/img/DIMMAF-LOGO.png')}}" alt="" width="30">
                        </a>
                        <form action="#">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2"><i
                                                    class="fa fa-search"></i></span>
                                </div>
                            </div>
                        </form> --}}
                    </div>


                    <div class="dashboard_log">
                        <div class="d-flex align-items-center">
                            <div class="profile_log dropdown">
                                <div class="user" data-toggle="dropdown">
                                    <a onclick="logoutForm()">
                                    <span class="thumb"><i class="mdi mdi-power"></i></span>
                                    <span class="name">Logout</span>
                                    </a>
                                </div>
                                
                                    {{-- <a href="accounts.html" class="dropdown-item">
                                        <i class="mdi mdi-account"></i> Account
                                    </a>
                                    <a href="history.html" class="dropdown-item">
                                        <i class="la la-book"></i> History
                                    </a>
                                    <a href="settings.html" class="dropdown-item">
                                        <i class="la la-cog"></i> Setting
                                    </a>
                                    <a href="lock.html" class="dropdown-item">
                                        <i class="la la-lock"></i> Lock
                                    </a> --}}
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<script>
    function logoutForm(){
        event.preventDefault();
        document.getElementById('logout-form').submit();
    }
</script>
