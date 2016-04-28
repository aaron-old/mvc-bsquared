@extends('master.master')

@section('PageTitle')Faq @stop

@section('Navigation')
        <!-- Add Logic Here to change navigation heading. -->
    @include('layouts.navigation.visitor')
@stop

@section('BodyContent')
    <div id="faqDiv" class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>F.A.Q.</h1>
            </div>
        </div>
        <div class="panel-group" id="accordion">
            <div class="faqHeader">General Questions</div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">What is b[squared]?</a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        Actually, b[squared] represents the name "Binary Beasts," which is our team and cohort name for the duration of the Bachelor of Applied Science Information Systems (BAS IS) program at Olympic College (OC).
                        We chose the name, in part, because we are all deeply interested in technology and are continually awed by the fact, that all computers truly do is commicate with each other using binary digits. Also, the name Binary
                        Beasts sounds cool!
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">When will b[squared] members be graduating with their BAS in Information Systems?</a>
                    </h4>
                </div>
                <div id="collapseTen" class="panel-collapse collapse">
                    <div class="panel-body">
                        The b[squared] cohort will be graduating together in SPRING 2016. We are proud to be a member of the first cohort of students in Olympic College's BAS IS program.
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">How do I get in contact with a b[squared] member?</a>
                    </h4>
                </div>
                <div id="collapseEleven" class="panel-collapse collapse">
                    <div class="panel-body">
                        By selecting the Portfolio link in the navigation on the top of any page, a drop down menu will appear showing each b[squared] member. Click
                        on the member you would like to contact. Next, scroll through the portfolio using the side arrows until you reach "Get In Touch". Complete the form, press "Send Mail"
                        and the cohort member will e-mail you within 24 hours.
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">How often will new portfolio items be added to the website?</a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        We will be continually working on new projects. We can't fit all of our work in the Portfolio section, but will display the items we think
                        best represents our accomplishments. Each b[squared] member has personally chosen the project examples being displayed.
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Can I become a member of the website?</a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">
                        Unfortunately, this website is only for current students of the Olympic College BAS Information Systems program.
                        Learn more about the <a href="http://www.olympic.edu/information-systems-bachelor-applied-science-bas" class="faqLink" target="_blank">BAS IS program at OC</a>.
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">What courses are part of the BAS IS program?</a>
                    </h4>
                </div>
                <div id="collapseFive" class="panel-collapse collapse">
                    <div class="panel-body">
                        BAS IS students at Olympic College take a wide range of courses, which are listed <a href="http://www.olympic.edu/computer-information-systems/information-systems-bachelor-applied-science/class-schedule" class="faqLink" target="_blank">here</a>.
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('ExtraJavaScript')
    <script>
        $(document).ready(function(){
            $('button').click(function(){
                $("form").valid();
            })
        });
    </script>
@stop