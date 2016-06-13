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
            <p id="profilePictureName">{{$portfolio->profile->firstName. ' ' .$portfolio->profile->lastName}}</p>
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
                        @if($portfolio->paths->where('destination_id', $k)->first())
                            @if($portfolio->paths->where('destination_id', $k)->first()->path)
                                <img src="{{asset('/images/member_uploads/about/'. $portfolio->paths->where('destination_id', $k)->first()->path)}}" alt="my skill">
                            @endif
                        @else
                            <img src="{{asset('images/member_uploads/about/default_profile.png')}}" alt="">
                        @endif

                        @if($portfolio->labels->where('destination_id',$k)->first())
                            <h3 class="skillHeader">{{$portfolio->labels->where('destination_id',$k)->first()->label}}</h3>
                         @else
                            <h3 class="skillHeader">Coming Soon!</h3>
                        @endif

                        @if($portfolio->columns->where('destination_id',$i)->first())
                            <p>{{$portfolio->columns->where('destination_id',$i)->first()->column_text}}</p>
                        @else
                            <p>Stay Tuned!</p>
                        @endif
                    </div>
                @endfor
            </div>

            <div id="slide3" class="item">
                <div class="row skillsColumns">
                    @for($i = 1, $k=4; $i<4; $i++, $k++)
                        <div class="col-sm-4">
                            @if($portfolio->paths->where('destination_id', $i)->first())
                                @if($portfolio->paths->where('destination_id', $i)->first()->path)
                                    <img src="{{asset('/images/member_uploads/skills/'. $portfolio->paths->where('destination_id', $i)->first()->path)}}" alt="my skill">
                                @endif
                            @else
                                <img src="{{asset('/images/member_uploads/skills/default_icon.png')}}" alt="my skill">
                            @endif
                            @if($portfolio->labels->where('destination_id',$i)->first())
                               <h3 class="skillHeader">{{$portfolio->labels->where('destination_id',$i)->first()->label}}</h3>
                            @else
                               <h3 class="skillHeader">Coming Soon!</h3>
                            @endif
                            @if($portfolio->columns->where('destination_id',$k)->first())
                               <p>{{$portfolio->columns->where('destination_id',$k)->first()->column_text}}</p>
                            @else
                               <p>Stay Tuned!</p>
                            @endif
                        </div>
                    @endfor
                </div>

                <div id="resumeDiv">
                    @foreach($portfolio->paths->where('destination_id', 35) as $resume)
                        <a href="/resume/{{$resume->path}}" target="_blank">
                    @endforeach
                        <button class="button button--nina button--text-thick button--text-upper button--size-l"
                                data-text="Resumé">
                            <span>R</span><span>e</span><span>s</span><span>u</span><span>m</span><span>é</span>
                        </button>
                    </a>
                </div>
            </div>

            <div id="slide4" class="item">
                <h2 id="worksTitle">Select a Project!</h2>
                <p id="descriptionWorks">Hover over a project to gather a brief description, or click thee image to see the specs!</p>
                @for($row =1, $count=1, $destination_id=10; $row<4; $row++)
                    <div class="row">
                        @for($column = 1, $rowCount=$count; $column<4; $column++, $count++, $destination_id++)
                            <div class="col-sm-4">
                                @if($portfolio->paths->where('destination_id', $destination_id)->first())
                                    <img src="{{asset('/images/member_uploads/works/'. $portfolio->paths->where('destination_id', $destination_id)->first()->path)}}"
                                         id="worksImage{{$count}}"
                                         class="worksImageHover"
                                         type="button"
                                         data-toggle="modal"
                                         data-target="#modal{{$count}}"
                                         height="130"
                                         width="130"
                                         alt="{{$destination_id}}">
                                @else
                                    <img src="{{asset('images/member_uploads/works/default_works.png')}}"
                                         id="worksImage{{$count}}"
                                         class="worksImageHover"
                                         type="button"
                                         data-toggle="modal"
                                         data-target="#modal{{$count}}"
                                         height="130"
                                         width="130"
                                         alt="{{$destination_id}}">
                                @endif
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
                                  action="">
                                <input type="text" id="name" name="name" placeholder="Name" required="required">
                                <br>
                                <input type="email" id="email" name="email" placeholder="Email" required="required">
                                <br>
                                <input type="text" name="subject" placeholder="Subject" required="required">
                                <br>
                                <input id="memberContactEmail" type="hidden" name="email" value="">
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