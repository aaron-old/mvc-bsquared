<div class="result"></div>
<form id="userSkillsForm" class="form-inline"
      method="post"
      action="/skills/{{$user->username}}"
      enctype="multipart/form-data">
    {{csrf_field()}}
    <legend class="legend">My Skills Segments</legend>
    <div id="skills_Label_Column_ImageForm" class="form-group portfolioUpdateForm">
        <div id="skillDestinationSelect" class="form-group skillFormGroup">
            <label id="skillLabelSelect" for="skills_DestinationID">Skills Number: </label>
            <select id="skills_DestinationID" class="form-control memberFocus">
                <option value="1" selected="selected">Skill #1</option>
                <option value="2">Skill #2</option>
                <option value="3">Skill #3</option>
            </select>
        </div>
        <div id="skillLabel" class="form-group skillFormGroup">
            <label for="txtSkillLabel">Skill Name</label>
            <input id="txtSkillLabel"  class="form-control memberFocus" type="text">
            <input id="skillLabelDestinationID" type="hidden">
        </div>
        <div id="skillColumn" class="form-group skillFormGroup">
            <label for="txtAreaSkillsColumn">Skill Description</label>
            <textarea id="txtAreaSkillsColumn" class="form-control memberFocus" rows="4" cols="50"></textarea>
            <input id="skillColumnDestinationID" type="hidden">
        </div>
    </div>
</form>
<form id="userSkillsPhotoForm" class="form-inline" action="" enctype="multipart/form-data">
    <div id="skillImage" class="form-group skillFormGroup">
        <button id="btnAddSkillsImage" class="btn btn-default memberSubmitButton">Upload Skill Icon</button>
        <input id="fileSkillsIcon" name="member_skill_image_1_user_{{$user->user_id}}" type="file">
        <input id="fileSkillsDestinationID" type="hidden">
    </div>
</form>
<button id="btnSubmitSkill_Column_Label_Image" class="btn btn-default memberSubmitButton">Save</button>
<form id="userResumeForm" class="form-inline" action="" enctype="multipart/form-data">
    <legend class="legend">Resume Upload</legend>
    <div id="skills_resumeForm" class="form-group portfolioUpdateForm">
        <div id="resumeFile" class="form-group skillFormGroup">
            <label for="fileResume">Resume: (PDF only!)</label>
            <input  id="fileResume" name="resume_user_{{$user->user_id}}" class="form-control memberFocus" type="file">
            <input id="fileResumeDestinationID" type="hidden">
        </div>
        <hr>
        <button id="btnAddResume" class="btn btn-default memberSubmitButton">Upload Resume</button>
    </div>
</form>
