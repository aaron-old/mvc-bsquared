<div class="result"></div>
<legend class="legend">
    Profile
    {{--<span class="userPhotos">--}}
        {{--<img src="https://placehold.it/150x150" alt="userProfilePicture">--}}
        {{--<span class="userPhotosCaption"><a href="#">Edit Photos</a></span>--}}
    {{--</span>--}}
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
        <div class="form-group-lg">
            <label for="txtAreaAboutMe" style="display:block;">About Me</label>
            <textarea id="txtAreaAboutMe" class="form-control memberFocus" cols="50" rows="5">{{old('', $user->profile->aboutMe)}}</textarea>
        </div>
        <div class="form-group">
            <button id="btnAddProfilePhoto" class="btn btn-default memberSubmitButton">Upload Profile Photo</button>
            <input id="fileProfilePhoto" type="file">
        </div>

        <button id="btnSubmitButton" type="submit" class="btn btn-default memberSubmitButton">Save</button>
    </div>

</form>

