@extends('layouts.app')

@section('PageTitle')Login @stop

@section('uniqueHeaderInformation')
    <link href="{{elixir('css/loginStyles.css')}}" type="text/css">
@stop

@section('Navigation')
        <!-- Add Logic Here to change navigation heading. -->
@include('layouts.navigation')

@stop

@section('BodyContent')

<div class="container" style="padding-top: 150px;">

    <div id="wrapper">
        <!-- SLIDE-IN ICONS-->
        <div class="user-icon"></div>
        <div class="pass-icon"></div>
        <!-- END SLIDE-->
        <form role="form" action="{{ url('/login') }}" method="post" name="login_form" class="login-form">
            {!! csrf_field() !!}
            <div class="header">
                <h1>b[squared] Login</h1>
            </div>

            <div class="content">
                <label>
                    <input type="text" name="email" autocomplete="off" class="input email"
                           value="{{ old('email') }}"/>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </label>
                <label>
                    <input type="password" name="password" autocomplete="off" id="password"
                           class="input password"/>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </label>

            </div>
            <div class="footer">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
                <button type="submit" class="button">Login</button>

                <a id="passwordReset" href="{{ url('/password/reset') }}">Forgot Your Password</a>
            </div>
        </form>


    </div>
    <div class="gradient"></div>

    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Login</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">--}}
                        {{--{!! csrf_field() !!}--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input type="email" class="form-control" name="email" value="{{ old('email') }}">--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label class="col-md-4 control-label">Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input type="password" class="form-control" name="password">--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}


                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
@endsection
