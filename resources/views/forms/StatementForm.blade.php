<form action="{{url('/member/statement')}}" method="post" enctype="multipart/form-data" id="statement">
    <fieldset>
        <legend>Statement</legend>

        <p><label for="statement">Short Statement: </label></p>

        <!-- Placeholder call from the database so user can see last input -->
        <p><input type="text" name="statement" id="statement"></p><br>

        <p><label for="backgroundImg">Background Image: (Please Upload .PNG or .JPG) 800X500</label></p>

        <!-- Background Image File Upload-->
        <p><input type="file" name="backgroundImg" id="backgroundImg"></p><br><br>

        <p><input type="submit" name="submit" id="submit" value="Update Profile"></p>
    </fieldset>
</form>