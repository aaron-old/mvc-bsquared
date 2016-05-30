<div class="result"></div>
<form id="userAboutForm" class="form-inline"
      method="post"
      action="/about/{{$user->username}}"
      enctype="multipart/form-data">
     {{csrf_field()}}

    <legend class="legend">Overview Section</legend>
    <div id="about_OverviewFormFields" class="form-group portfolioUpdateForm">
        <div class="form-group">
            <label for="txtAbout_Overview">Overview: </label>
            <textarea id="txtAbout_Overview" class="form-control memberFocus" rows="5" cols="50">{{old('', $user->about->overview)}}</textarea>
        </div>
        <button id="btnSubmitAbout_Overview" type="submit" class="btn btn-default memberSubmitButton">Save</button>
    </div>
    <legend class="legend">About Me Segments</legend>
    <div id="about_Label_Column_ImageForm" class="form-group portfolioUpdateForm">
        <div id="aboutDestinationSelect" class="form-group aboutFormGroup">
            <label id="aboutLabelSelect" for="about_DestinationID">About Me Number:</label>
            <select id="about_DestinationID" class="form-control memberFocus" >
                <option value="1" selected="selected">About Me #1</option>
                <option value="2">About Me #2</option>
                <option value="3">About Me #3</option>
            </select>
        </div>
        <div id="aboutLabel" class="form-group aboutFormGroup">
            <label for="txtAboutLabel">About Me Title</label>
            <input id="txtAboutLabel" class="form-control memberFocus" type="text">
            <input id="aboutLabelDestinationID" type="hidden">
        </div>
        <div id="aboutColumn" class="form-group aboutFormGroup">
            <label for="txtAreaAboutColumn">About Me Description</label>
            <textarea id="txtAreaAboutColumn" class="form-control memberFocus" rows="4" cols="50"></textarea>
            <input id="aboutColumnDestinationID" type="hidden">
        </div>
        <div id="aboutImage" class="form-group aboutFormGroup">
            {{--<label for="btnAddAboutImage">Upload an Image:(PNG or JPG Only) Dimensions:140X140</label>--}}
            <button id="btnAddAboutImage" class="btn btn-default memberSubmitButton">Upload About Image</button>
            <input id="fileAboutImage" type="file">
            <input id="fileAboutDestinationID" type="hidden">
        </div>
        <button id="btnSubmitAbout_Column_Label_Image" class="btn btn-default memberSubmitButton">Save</button>
    </div>
</form>


