<div class="result"></div>
<form id="userWorksForm" class="form-inline"
      method="post"
      action="/works/{{$user->username}}"
      enctype="multipart/form-data" >
    {!! csrf_field() !!}

    <legend class="legend">Update Portfolio Items</legend>

    <input id="worksDestinationID" type="hidden">

    <div id="worksForms" class="form-group portfolioUpdateForm">
        <div class="form-group">
            <label for="works_DestinationID">Works Number:</label>
            <select id="works_DestinationID" class="form-control memberFocus">
                <option value="1" selected="selected">Works 1</option>
                <option value="2">Works 2</option>
                <option value="3">Works 3</option>
                <option value="4">Works 4</option>
                <option value="5">Works 5</option>
                <option value="6">Works 6</option>
                <option value="7">Works 7</option>
                <option value="8">Works 8</option>
                <option value="9">Works 9</option>
            </select>
        </div>

        <div class="form-group">
            <label  for="txtWorksTitle">Project Title</label>
            <div class="col-xs-4">
                <input id="txtWorksTitle" class="form-control memberFocus" type="text">
            </div>
        </div>
        <div class="form-group">
            <label for="fileProjectThumbnail">Project Thumbnail (Please Upload .PNG or .JPG) 130X130</label>
            <input id="fileProjectThumbnail" type="file">
            <input id="fileProjectThumbnailDestinationID" type="hidden">
            <button id="btnAddProjectThumbnail" class="btn btn-default memberSubmitButton">Upload Project Thumbnail</button>
        </div>
        <div class="form-group">
            <label for="txtAreaProjectDescription">Project Description</label>
            <textarea id="txtAreaProjectDescription" class="form-control memberFocus" rows="4" cols="50" ></textarea>
        </div>
        <div class="form-group">
            <label for="fileProjectDescriptionImage">Project Description Image (Please Upload .PNG or .JPG) 348X210 </label>
            <input id="fileProjectDescriptionImage" type="file">
            <input id="fileProjectDescriptionImageDestinationID" type="hidden">
            <button id="btnAddProjectDescriptionImage" class="btn btn-default memberSubmitButton">Upload Description Image</button>
        </div>
        <div class="form-group">
            <label for="txtProjectLink">Project Link:(www.example.com) </label>
            <input id="txtProjectLink" class="form-control memberFocus" type="text">
        </div>
        <hr>
        <button id="btnSubmitWorksItem" class="btn btn-default memberSubmitButton">Save</button>
    </div>
</form>