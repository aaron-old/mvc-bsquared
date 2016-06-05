@extends('layouts.app')

@section('ExtraJavaScript')

@stop


@section('PageTitle'){{$portfolio->profile->firstName. 's Portfolio'}} Portfolio @stop
@section('Navigation')
    <!-- Add Logic Here to change navigation heading. -->
    @include('layouts.navigation')
@stop



@section('BodyContent')

    <div id="portImgHolder" class="container">
        <div class="row">
            <img class="memberPhoto" src="{{asset('images/member_uploads/default_profile.png')}}"
                 alt="{{$portfolio->profile->firstName.' '.$portfolio->profile->lastName}}">
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
                <p>{{$portfolio->statement->statement}}</p>
            </div>

            <div id="slide2" class="item">
                <p id="aboutPortfolio">{{$portfolio->profile->aboutMe}}</p>

                @for($i = 7, $k=22; $i < 10; $i++, $k++)
                    <div class="col-sm-4">
                        <img src="{{asset('images/member_uploads/about/default_profile.png')}}" alt="About Me">
                        @foreach($portfolio->labels as $label)
                            @if($label['destination_id'] === $k)
                                <h3>{{$label['label']}}</h3>
                            @endif
                        @endforeach
                        @foreach($portfolio->columns as $column)
                            @if($column['destination_id'] === $i)
                                <p>{{$column['column_text']}}</p>
                            @endif
                        @endforeach
                    </div>
                @endfor
            </div>

            <div id="slide3" class="item">
                <div class="row skillsColumns">
                    @for($i = 1, $k=4; $i<4; $i++, $k++)
                        <div class="col-sm-4">
                            <img src="{{asset('images/member_uploads/skills/default_icon.png')}}" alt="my skill">
                            @foreach($portfolio->labels as $label)
                                @if($label['destination_id'] === $i)
                                    <h3 class="skillHeader">{{$label['label']}}</h3>
                                @endif

                            @endforeach
                            @foreach($portfolio->columns as $column)
                                @if($column['destination_id'] === $k)
                                    <p>{{$column['column_text']}}</p>
                                @endif
                            @endforeach
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

                <!-- Todo: Add the on hoverstate via javascript module usercontrols.-->
                <h2 id="worksTitle">Select a Project!</h2>
                <p id="descriptionWorks">Hover over a project to gather a brief description, or click thee image to see the specs!</p>
                @for($row =1, $count=1, $destination_id=10; $row<4; $row++)
                    <div class="row">
                        @for($column = 1, $rowCount=$count; $column<4; $column++, $count++, $destination_id++)
                            <div class="col-sm-4">
                                <!-- todo: need to add the images within a user portfolio.-->
                                <img src="{{asset('images/member_uploads/works/default_works.png')}}"
                                     id="worksImage{{$count}}"
                                     class="worksImageHover"
                                     type="button"
                                     data-toggle="modal"
                                     data-target="#modal{{$count}}"
                                     height="130"
                                     width="130"
                                     alt="{{$destination_id}}">
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
                            <div class="result"></div>
                            <form id="contactMember"
                                  method="post"
                                  action="{{url('/')}}">

                                <input type="text" id="name" name="name" placeholder="Name" required="required">
                                <br>
                                <input type="email" id="email" name="email" placeholder="Email" required="required">
                                <br>
                                <input type="text" name="subject" placeholder="Subject" required="required">
                                <br>
                                <input type="text" name="userID" value="1" style="display: none">
                                <textarea name="content" placeholder="Your Message" required="required"></textarea>
                                <br><br>
                                <button id="btnSendMemberMail"  type="button"
                                        class="button button--nina button--text-thick button--text-upper button--size-l"
                                        data-text="Send Mail">
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

        @for($i = 1, $k=25, $j=10; $i < 10; $i++, $k++, $j)
            <div class="modal fade" id="modal{{$i}}" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            @foreach($portfolio->works as $work)
                                @if($work['destination_id'] === $j)
                                    <h4 class="modal-title">{{$work['title']}}</h4>
                                @endif
                            @endforeach
                        </div>
                        <div id="myModal{{$i}}" class="modal-body">

                            <!-- todo: After configuring file load dynamically load this resource. -->
                            <img id="modImage{{$i}}"
                                 src="{{asset('images/member_uploads/project_uploads/project_preview_default.png')}}"
                                 alt="Project Preview">

                            @foreach($portfolio->works as $work)
                                @unless($work['destination_id'] !== $j)
                                @if($work['destination_id'] === $j && $work['project_description'] !== '')
                                    <p>{{$work['project_description']}}</p>
                                    <p>
                                        @if($work['work_link'] !== '')
                                            Check out the project <a href="{{$work['work_link']}}">at this website</a>
                                        @endif
                                    </p>
                                @endif
                                @endunless
                            @endforeach
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