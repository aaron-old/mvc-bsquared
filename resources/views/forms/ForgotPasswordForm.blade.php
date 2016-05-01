<div id="wrapper">
    <div class="user-icon-forgot"></div>
    <form action="{{url('/')}}" method="post" name="login_form" class="login-form">

        <div class="header">
            <h1 id="loginHeader">b[squared] Password Recovery</h1>
            <p>Enter your E-mail Address and an e-mail will be sent to reset your password.</p>
        </div>

        <div class="content">
            <input  type="text" name="email" autocomplete="off" class="input email" value="email@bsquared.com"
                    onfocus="this.value=''"/>
        </div>

        <div class="footer">
            <input type="submit" class="button" value="Reset" />
            <br>
            <br>
        </div>
    </form>
</div>