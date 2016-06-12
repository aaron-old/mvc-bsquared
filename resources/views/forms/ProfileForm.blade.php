<div class="result"></div>
<legend class="legend">
    Profile
</legend>
<div class="form-group">
    <form id="userProfilePhotoForm" class="form-inline  pull-left" action="" enctype="multipart/form-data">
        <span class="userPhotos">
            <img src="{{asset('/images/member_uploads/default_profile.png')}}" alt="userProfilePicture">
        </span>
        {{csrf_field()}}
        <div  id="uploadProfilePhoto" class="form-group">
            <input id="fileProfilePhoto"
                   name="profilePhoto"
                   type="file"
                   style="display: none;"
                   class="form-control">
            <button id="btnAddProfilePhoto"
                    class="btn btn-default memberSubmitButton">Upload Profile Photo</button>
            <input id="fileProfilePhotoDestinationID" type="hidden" value="0">
        </div>
    </form>
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
            <button id="btnSubmitButton" type="submit" class="btn btn-default memberSubmitButton">Save</button>
        </div>
    </form>
</div>




