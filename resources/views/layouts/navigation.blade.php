<?php
use Bsquared\User;
use Bsquared\Profile;

$profiles = Profile::all();
$members = User::all();

$profileCount = count($profiles);

?>

<header>
    <nav class="navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{url('/')}}"><img id="logo" src="{{asset('images/graphics/logo4.png')}}" alt="b[squared]"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li id="homePageActive"><a href="{{url('/')}}">HOME</a></li>
                    <li id="portfolioPageActive" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="{{url('/portfolio')}}">
                            PORTFOLIOS<span class="caret"></span>
                        </a>
                        <ul id="navList" class="dropdown-menu">
                            @for($i = 0; $i<$profileCount; $i++)
                                <li>
                                    <a href="/portfolio/{{$members[$i]->username}}">
                                        {{strtoupper($profiles[$i]->firstName. ' ' . $profiles[$i]->lastName)}}
                                    </a>
                                </li>
                            @endfor
                        </ul>
                    </li>
                    <li id="faqPageActive"><a href="{{url('/faq')}}">FAQ</a></li>

                    @if(Auth::guest())
                        <li id="loginPageActive"><a href="{{url('/login')}}">LOGIN</a></li>
                        <li id="registerPageActive"><a href="{{url('/register')}}">REGISTER</a></li>
                    @else
                        <li id="updatePortfolioPageActive" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">UPDATE PORTFOLIO
                                <span class="caret"></span></a>
                            <ul id="navList" class="dropdown-menu">
                                <li><a href="{{url('/profile/'.Auth::user()->username)}}">PROFILE</a></li>
                                <li><a href="{{url('/statement/'.Auth::user()->username)}}">STATEMENT</a></li>
                                <li><a href="{{url('/about/'.Auth::user()->username)}}">ABOUT</a></li>
                                <li><a href="{{url('/skills/'.Auth::user()->username)}}">SKILLS</a></li>
                                <li><a href="{{url('/works/'.Auth::user()->username)}}">WORKS</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-toggle">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ strtoupper(Auth::user()->username) }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu" id="navList">
                                <li><a href="{{url('/settings/'.Auth::user()->username)}}">ACCOUNT SETTINGS</a> </li>
                                <li><a href="{{ url('/logout') }}">LOGOUT</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>