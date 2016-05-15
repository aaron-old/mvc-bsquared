<legend>
    Statement
</legend>

<form action="/statement/{{$user->username}}" method="post" enctype="multipart/form-data" id="statement">
    {!! csrf_field() !!}
    <fieldset id="box">
        <label for="statement">Short Statement: </label>

        <!-- Placeholder call from the database so user can see last input -->
        <input type="text" name="statement" id="statement"></p>

        <label for="backgroundImg">Background Image: (Please Upload .PNG or .JPG) 800X500</label>

        <!-- Background Image File Upload-->
        <input type="file" name="backgroundImg" id="backgroundImg">

        <input type="submit" name="submit" id="submit" value="Update Profile">
    </fieldset>
</form>