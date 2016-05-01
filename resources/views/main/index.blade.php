@extends('master.master')

@section('PageTitle')Home @stop

@section('Navigation')
    <!-- Add Logic Here to change navigation heading. -->
    @include('layouts.navigation.visitor')
@stop

@section('BodyContent')
    <p class="topStatement ocLink"><span class="logo">Welcome to b<span class="logoBlack">[</span>squared<span
                    class="logoBlack">]</span></span>
        <br>
        <a  href="http://www.olympic.edu/information-systems-bachelor-applied-science-bas" target="_blank">
            Olympic College Bachelors of Applied Science Information Systems</a><br>
        <span class="logoBlack">Cohort 2014-2016</span>
    </p>
    <hr id="indexDivider">


    <hr id="indexDivider">
    <div class="container">
        <p id="descripPar ocLink" class="descripPar"><span class="logoBlack">Want to know more about the program?</span>
            <a href="{{url('/faq')}}"><br>view the FAQ.</a>
        </p>
    </div>
@stop
