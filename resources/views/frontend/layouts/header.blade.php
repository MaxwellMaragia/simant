<header class="container-fluid no-left-padding no-right-padding header_s header-fix header_s7">
    <!-- SidePanel -->
    <div id="slidepanel-4" class="slidepanel">
        <!-- Top Header -->
        <div class="container-fluid no-right-padding no-left-padding top-header">
            <!-- Container -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-6">
                        <ul class="top-social">
                            <li><a href="{{ $facebook->value }}" target="_blank" title="Facebook"><i class="ion-social-facebook-outline"></i></a></li>
                            <li><a href="{{ $twitter->value }}" target="_blank" title="Twitter"><i class="ion-social-twitter-outline"></i></a></li>
                            <li><a href="{{ $instagram->value }}" target="_blank" title="Instagram"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 logo-block">
                        <a href="{{ url('/') }}" title="Logo">Simant prakash</a>
                    </div>
                    <div class="col-lg-4 col-6">
                        <ul class="top-right user-info">
                            <li><a href="#search-box" data-toggle="collapse" class="search collapsed" title="Search"><i class="pe-7s-search sr-ic-open"></i><i class="pe-7s-close sr-ic-close"></i></a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="{{ route('login') }}"><i class="pe-7s-user"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('login') }}" title="Log In">Log In</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- Container /- -->
        </div><!-- Top Header /- -->
    </div><!-- SidePanel /- -->

    <!-- Container -->
    <div class="container">
        <!-- Menu Block -->
        <div class="container-fluid no-left-padding no-right-padding menu-block">
            <nav class="navbar ownavigation navbar-expand-lg">
                <a class="navbar-brand" href="{{ url('/') }}">Simant prakash</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar7" aria-controls="navbar7" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbar7">
                    <ul class="navbar-nav">

                        <li><a class="nav-link" title="Features" href="{{ url('about-me') }}">About me</a></li>
                        <li><a class="nav-link" title="Business" href="{{ route('category','business') }}">Business</a></li>
                        <li><a class="nav-link" title="Travel" href="{{ route('category','travel-adventure') }}">Travel & adventure</a></li>
                    </ul>
                </div>
                <div id="loginpanel-4" class="desktop-hide">
                    <div class="right toggle" id="toggle-4">
                        <a id="slideit-4" class="slideit" href="#slidepanel"><i class="fo-icons fa fa-inbox"></i></a>
                        <a id="closeit-4" class="closeit" href="#slidepanel"><i class="fo-icons fa fa-close"></i></a>
                    </div>
                </div>
            </nav>
        </div><!-- Menu Block /- -->
    </div><!-- Container /- -->
    <!-- Search Box -->
    <div class="search-box collapse" id="search-box">
        <div class="container">
            <form  method="get" action="{{ route('search') }}">
                <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." required="required" name="keywords">
                        <span class="input-group-btn">
							<button class="btn btn-secondary" type="submit"><i class="pe-7s-search"></i></button>
						</span>
                </div>
            </form>
        </div>
    </div><!-- Search Box /- -->
</header>
