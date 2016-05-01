<form name="delete_user" id="delete_user" method="post" action="{{url('/')}}">
    <fieldset>
        <legend>Choose a userID from above to delete a user (VERY POWERFUL)</legend>
        <p><input type="text" id="userID" name="userId" placeholder="userID"><br></p>
        <input type="submit" name="submit" id="submit" value="Delete User">
    </fieldset>
</form>