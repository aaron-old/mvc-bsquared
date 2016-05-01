<fieldset id="registrationForm">
    <legend>Registration Form</legend>
    <ul>
        <li>Usernames may contain only digits, upper and lower case letters and underscores</li>
        <li>Emails must have a valid email format</li>
        <li>Passwords must be at least 6 characters long</li>
        <li>Passwords must contain
            <ul>
                <li>At least one upper case letter (A..Z)</li>
                <li>At least one lower case letter (a..z)</li>
                <li>At least one number (0..9)</li>
            </ul>
        </li>
        <li>Your password and confirmation must match exactly</li>
    </ul>
    <form action="{{url('/')}}" method="post" name="registration_form">

        <br><p><label for="username">Username:</label></p>
        <p><input type="text" name="username" id="username"/></p><br>

        <p><label for="role">User Role:</label></p>
        <p><select id="role" name="role">
                <option value="portfolio_members">Member</option>
                <option value="admin">Administrator</option>
            </select></p><br>

        <p><label for="email">E-Mail:</label></p>
        <p><input type="email" name="email" id="email"/></p><br>

        <p><label for="password">Password:</label></p>
        <p><input type="password" name="password" id="password"/></p><br>

        <p><label for="confirmpass">Confirm Password</label>
        <p><input type="password" name="confirmpass" id="confirmpass"/></p><br>

        <p><input type="button"
                  value="Register"
                  onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpass);"/></p>
    </form>
</fieldset>