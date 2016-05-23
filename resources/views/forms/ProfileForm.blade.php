<legend style="text-align: center">
    Profile
    {{--<span class="userPhotos">--}}
        {{--<img src="https://placehold.it/150x150" alt="userProfilePicture">--}}
        {{--<span class="userPhotosCaption"><a href="#">Edit Photos</a></span>--}}
    {{--</span>--}}
</legend>
<form id="userProfileForm" method="POST" action="/profile/{{ $user->username }}" role="form">
    {!! csrf_field() !!}
    <fieldset id="box">
        <div class="userProfileFirstNameInput">
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName" value="{{ old('',$user->profile->firstName)}}">
        </div>
        <div class="userProfileLastNameInput">
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName" value="{{old('',$user->profile->lastName)}}">
        </div>
        <div class="userProfileAbout">
            <label for="aboutMe">About Me</label>
            <textarea name="aboutMe" id="aboutMe" rows="5" cols="100">{{old('',$user->profile->aboutMe)}}</textarea>
        </div>
        <div class="userProfileSubmit">
            {{--<button type="submit" id="btnSubmitProfile" class="submitButton" >Update Profile</button>--}}
            <input id="btnSubmitProfile"  type="button" name="submit" value="Update Profile" />
        </div>
    </fieldset>
</form>

