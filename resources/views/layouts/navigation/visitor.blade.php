<header>
    <nav class="navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{url('/')}}"><img id="logo" src="{{asset('img/graphics/logo4.png')}}" alt="b[squared]"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li id="homePageActive"><a href="{{url('/')}}">HOME</a></li>
                    <li id="portfolioPageActive" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="{{url('/portfolio')}}">
                            PORTFOLIOS<span class="caret"></span>
                        </a>
                        <ul id="navList" class="dropdown-menu">
                        </ul>
                    </li>
                    <li id="faqPageActive"><a href="{{url('/faq')}}">FAQ</a></li>
                    <li id="loginPageActive"><a href="{{url('/login')}}">LOGIN</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>