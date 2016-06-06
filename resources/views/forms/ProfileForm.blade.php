<div class="result"></div>
<span class="userPhotos">
<img src="https://placehold.it/150x150" alt="userProfilePicture">
</span>
<legend class="legend">
    Profile
</legend>
<form id="userProfileForm" class="form-inline"
      method="POST"
      action="{{url('/profile/'.$user->username)}}"
      enctype="multipart/form-data">
    {{csrf_field()}}
    <div id="profileFormFields" class="form-group portfolioUpdateForm">
        <div class="form-group">
            <label for="txtFirstName">First Name</label>
            <input id="txtFirstName" class="form-control memberFocus" value="{{old('', $user->profile->firstName)}}">
        </div>
        <div class="form-group">
            <label for="txtLastName">Last Name</label>
            <input id="txtLastName" class="form-control memberFocus" value="{{old('', $user->profile->lastName)}}">
        </div>
        <div id="aboutMeDiv" class="form-group">
            <label for="txtAreaAboutMe">About Me</label>
            <textarea id="txtAreaAboutMe" class="form-control memberFocus" cols="50" rows="5">{{old('', $user->profile->aboutMe)}}</textarea>
        </div>
        <div class="form-group">
            {{--<button id="btnAddProfilePhoto" class="btn btn-default memberSubmitButton">Upload Profile Photo</button>--}}
            <label for="fileProfilePhoto">Upload a Photo: Profile Photo</label>
            <input id="fileProfilePhoto" name="profilePhoto" type="file" class="form-control">
            <input id="fileProfilePhotoDestinationID" type="hidden" >
        </div>
        <button id="btnSubmitButton" type="submit" class="btn btn-default memberSubmitButton">Save</button>
    </div>
</form>


