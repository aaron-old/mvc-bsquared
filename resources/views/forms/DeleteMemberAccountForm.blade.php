<form name="delete_member" id="delete_user" method="post" action="{{url('/')}}"
      onsubmit="return confirm('You are deleting this account. ' +
       'There is no take backsies once you\'ve deleted your account. Are you sure?');">
    <fieldset>
        <legend>Delete this Account</legend>
        <p><label for="userID">This will permanently remove this account from the website. You will not be able to recover this account once the account has been deleted.</label></p>
        <p><input type="hidden" id="userID" name="userId" placeholder="userID"><br></p>
        <input type="submit" name="submit" id="submit" value="Delete User">
    </fieldset>
</form>