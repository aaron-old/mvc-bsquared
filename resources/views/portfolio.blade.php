@extends('layouts.app')

@section('PageTitle')Name Portfolio @stop

@section('uniqueHeaderInformation')
<!-- Stops carousel from automatically changing slides ---- Move Script to JS file in future -- LM -->
<script>
    $(document).ready(function() {
        $('.carousel').carousel('pause');

        $("form").valid();

        $(".nav ul li a").each(function(){
            $(".active").removeClass("active");
        })
    });
</script>

<!--
This will be plugged to resource portfolio_backgrounds (will accept path to the resource)
-->
<style>
    .addBG {
        background-color: #eee;
        background: url('{{asset('img/member_uploads/member_backgrounds/member_background_default.jpg')}}');
        background-repeat: no-repeat;
        background-position: center center;
        width: 100%;
        max-width: 940px;
    }


</style>
@stop

@section('Navigation')
        <!-- Add Logic Here to change navigation heading. -->
@include('layouts.navigation')
@stop

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@section('BodyContent')

    <div id="portImgHolder" class="container">
        <div class="row">
            <img height="150" width="150" class="memberPhoto" src="{{asset('img/member_uploads/default_profile.png')}}"
            alt="First Name Last Name">
        </div>
    </div>

    <div id="myCarousel" class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>

        <div class="carousel-inner" role=listbox>

            <div id="slide1" class="item active addBG">
                <p>Statement Here</p>
            </div>

            <div id="slide2" class="item">
                <p id="aboutPortfolio">About Overview</p>

                @for($i = 7, $k=22; $i < 10; $i++, $k++)
                    <div class="col-sm-4">
                        <img src="{{asset('img/member_uploads/about/default_profile.png')}}" alt="About Me">
                        <h3>About Label</h3>
                        <p>About Column</p>
                    </div>
                @endfor
            </div>

            <div id="slide3" class="item">
                <div class="row skillsColumns">
                    @for($i = 1, $k=4; $i<4; $i++, $k++)
                        <div class="col-sm-4">
                            <img src="{{asset('img/member_uploads/skills/default_icon.png')}}" alt="my skill">
                            <h3 class="skillHeader">Skill Label</h3>
                            <p>Skill Column</p>
                        </div>
                    @endfor
                </div>

                <div id="resumeDiv">
                    <a href="#" target="_blank">
                        <button class="button button--nina button--text-thick button--text-upper button--size-l"
                                data-text="Resumé"> <!--onclick="this.form.submit()"-->
                            <span>R</span><span>e</span><span>s</span><span>u</span><span>m</span><span>é</span>
                        </button>
                    </a>
                </div>
            </div>

            <div id="slide4" class="item">
                <h2 id="worksTitle">Select a Project!</h2>
                <p id="descriptionWorks">Hover over a project to gather a brief description, or click thee image to see the specs!</p>
                @for($row =1, $count=1; $row<4; $row++)
                    <div class="row">
                        @for($column = 1; $column<4; $column++)
                            <div class="col-sm-4">
                                <img src="{{asset('img/member_uploads/works/default_works.png')}}"
                                     type="button"
                                     data-toggle="modal"
                                     data-target="#modal{{$count}}"
                                     height="130"
                                     width="130"
                                     alt="Work">
                            </div>
                        @endfor
                    </div>
                @endfor
            </div>

            <div id="slide5" class="item">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Get in Touch</h2>
                        <div id="faqForm" class="container">
                            <p>If you would like to contact me, please complete the form below with your name,
                                email address, subject, and a brief message. I will contact you within 24 hours. Thank you.</p>
                            <form id="contact" method="post" action="{{url('/')}}">
                                <input type="text" id="name" name="name" placeholder="Name" required="required">
                                <br>
                                <input type="email" id="email" name="email" placeholder="Email" required="required">
                                <br>
                                <input type="text" name="subject" placeholder="Subject" required="required">
                                <br>
                                <input type="text" name="userID" value="1" style="display: none">
                                <textarea name="content" placeholder="Your Message" required="required"></textarea>
                                <br><br>
                                <button class="button button--nina button--text-thick button--text-upper button--size-l"
                                        data-text="Send Mail"
                                        name="submit"
                                        onclick="this.form.submit()">
                                    <span>S</span><span>e</span><span>n</span><span>d</span>
                                    <span>M</span><span>a</span><span>i</span><span>l</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a id="leftCarouselClick" class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a id="rightCarouselClick" class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

        @for($i = 1, $k=25; $i < 10; $i++, $k++)
            <div class="modal fade" id="modal{{$i}}" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Works Title</h4>
                        </div>
                        <div id="myModal{{$i}}" class="modal-body">
                            <img id="modImage{{$i}}"
                                 src="{{asset('img/member_uploads/project_uploads/project_preview_default.png')}}"
                                 alt="Project Preview">
                            <p>Works Description</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button"
                                    class="button button--nina button--text-thick button--text-upper button--size-l"
                                    data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
@stop