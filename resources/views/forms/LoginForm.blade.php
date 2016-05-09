<div id="wrapper">
    <!-- SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!-- END SLIDE-->
    <form action="{{url('/login')}}" role="form" method="POST" name="login_form" class="login-form">
        {!! csrf_field() !!}
        <div class="header">
            <h1>b[squared] Login<br></h1>
        </div>

        <div class="content">
            <input type="email" name="email" autocomplete="off" class="input email"
                   value="{{ old('email') }}" onfocus="this.value=''"/>

            <input type="password" name="password" autocomplete="off" id="password" class="input password"
                   value="password" onfocus="this.value=''"/>
        </div>
        <div class="footer">
            <input type="submit" class="button" value="Login" onclick="formhash(this.form, this.form.password);" />
            <label>
                <input type="checkbox" name="remember"> Remember Me
            </label>
            <p><a href="{{url('/password/reset')}}">Forgot Your Password?</a> </p>
        </div>
    </form>
</div>
<div class="gradient"></div>