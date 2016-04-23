@extends('master.master')

@section('PageTitle')
Home
@stop

@section('Navigation')
    <header>
        <nav class="navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#"><img id="logo" src="" alt="b[squared]"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li id="homePageActive"><a href="#">HOME</a></li>
                        <li id="portfolioPageActive" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                PORTFOLIOS<span class="caret"></span>
                            </a>
                            <ul id="navList" class="dropdown-menu">
                            </ul>
                        </li>
                        <li id="faqPageActive"><a href="#">FAQ</a></li>
                        <li id="loginPageActive"><a href="#">LOGIN</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
@stop

@section('BodyContent')
    <p class="topStatement ocLink"><span class="logo">Welcome to b<span class="logoBlack">[</span>squared<span
                    class="logoBlack">]</span></span>
        <br>
        <a  href="http://www.olympic.edu/information-systems-bachelor-applied-science-bas" target="_blank">
            Olympic College Bachelors of Applied Science Information Systems</a><br>
        <span class="logoBlack">Cohort 2014-2016 </span>
    </p>
    <hr id="indexDivider">


    <hr id="indexDivider">
    <div class="container">
        <p id="descripPar ocLink" class="descripPar"><span class="logoBlack">Want to know more about the program?</span>
            <a href="faq.php"><br>view the FAQ.</a>
        </p>
    </div>
@stop