<fieldset id="changePasswordForm">
    <legend>Change Password</legend>
    <ul>
        <li>Passwords must be at least 6 characters long</li>
        <li>Passwords must contain
            <ul>
                <li>At least one upper case letter (A..Z)</li>
                <li>At least one lower case letter (a..z)</li>
                <li>At least one number (0..9)</li>
            </ul>
        </li>
        <li>Your password and confirmation must match exactly</li>
    </ul><br>
    <form action="" method="post"
          name="change_password_form">

        <p><label for="email">Email:</label></p>
        <p><input type="email" name="email" id="email" value="" /><br></p>

        <p><label for="role">User Role:</label></p>
        <p><input type="text" id="role" name="role" value=""><br></p>

        <p><label for="password">New Password:</label>
        <p><input type="password" name="password" id="password" autocomplete="off"/><br></p>

        <p><label for="confirmpwd">Confirm Password:</label>
        <p><input type="password" name="confirmpwd" id="confirmpwd" autocomplete="off" /><br></p>

        <br><p><input type="button"
                      value="Change Password"
                      onclick="return changepasswordhash(this.form,
                                                  this.form.password,
                                                  this.form.confirmpwd);" /></p>
    </form>
</fieldset>