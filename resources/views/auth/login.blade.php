@extends('layouts.app')

@section('PageTitle')Login @stop

@section('Navigation')
        <!-- Add Logic Here to change navigation heading. -->
@include('layouts.navigation')
@stop

@section('BodyContent')
<div class="container">

    <div id="wrapper">
        <!-- SLIDE-IN ICONS-->
        <div class="user-icon"></div>
        <div class="pass-icon"></div>
        <!-- END SLIDE-->
        <form role="form" action="{{ url('/login') }}" method="post" class="login-form">
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
</div>
@endsection
