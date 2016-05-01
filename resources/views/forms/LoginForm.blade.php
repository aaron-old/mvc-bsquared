<div id="wrapper">
    <!-- SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!-- END SLIDE-->
    <form action="" method="post" name="login_form"
          class="login-form">
        <div class="header">
            <h1>b[squared] Login<br></h1>
        </div>

        <div class="content">
            <input type="text" name="email" autocomplete="off" class="input email"
                   value="email@bsquared.com" onfocus="this.value=''"/>
            <input type="password" name="password" autocomplete="off" id="password" class="input password"
                   value="password" onfocus="this.value=''"/>
        </div>
        <div class="footer">
            <input type="button" class="button" value="Login" onclick="formhash(this.form, this.form.password);" />
        </div>
    </form>
</div>
<div class="gradient"></div>