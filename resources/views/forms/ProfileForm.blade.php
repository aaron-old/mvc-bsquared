<form action="{{url('/member/profile')}}" method="post" enctype="multipart/form-data" id="profile">
    <fieldset>
        <legend>Profile</legend>
        <p><label for="firstname">First Name: </label></p>
        <input type="text" name="firstname" id="firstname"><br><br>

        <p><label for="lastname">Last Name:</label></p>
        <input type="text" name="lastname" id="lastname"><br><br>

        <p><label for="picture">Upload Photo: (Please Upload .PNG or .JPG) 140X100</label></p>
        <input type="file" name="picture" id="picture"><br><br>

        <p><label for="aboutme">About Me</label></p>
        <textarea name="aboutme" id="aboutme" rows="5" cols="100"></textarea><br><br>

        <p><input type="submit" name="submit" value="Update Profile" /></p>
    </fieldset>
</form>