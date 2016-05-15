<legend style="text-align: center">
    Profile
    <span class="userPhotos">
        <img src="https://placehold.it/150x150" alt="userProfilePicture">
        <span class="userPhotosCaption"><a href="#">Edit Photos</a></span>
    </span>
</legend>
<form id="userProfileForm" method="POST" action="/profile/{{ $user->username }}" role="form">
    {!! csrf_field() !!}
    <fieldset id="box">
        <div class="userProfileFirstNameInput">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname" value="{{$user->profile->firstName}}">
        </div>
        <div class="userProfileLastNameInput">
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname" value="{{$user->profile->lastName}}">
        </div>
        <div class="userProfileAbout">
            <label for="aboutme">About Me</label>
            <textarea name="aboutme" id="aboutme" rows="5" cols="100">{{$user->profile->aboutMe}}</textarea>
        </div>
        <div class="userProfileSubmit">
            <input type="submit" name="submit" value="Update Profile" />
        </div>
    </fieldset>
</form>