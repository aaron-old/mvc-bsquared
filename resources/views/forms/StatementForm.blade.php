<legend>
    Statement
</legend>

<form action="/statement/{{$user->username}}" method="POST"  role="form" id="userStatementForm">
    {!! csrf_field() !!}
    <fieldset id="box">
        <label for="statement">Short Statement: </label>
        <input type="text" name="statement" id="statement" value="{{$user->statement->statement}}">

        <label for="backgroundImg">Background Image: (Please Upload .PNG or .JPG) 800X500</label>
        <input type="file" name="backgroundImg" id="backgroundImg">

        <input type="submit" name="submit" id="submit" value="Update Profile">
    </fieldset>
</form>