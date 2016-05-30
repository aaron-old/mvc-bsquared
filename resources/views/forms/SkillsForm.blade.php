<div class="result"></div>
<form id="userSkillsForm" class="form-inline"
      method="post"
      action="/skills/{{$user->username}}"
      enctype="multipart/form-data">

    <legend class="legend">My Skills Segments</legend>
    <div id="skills_Label_Column_ImageForm" class="form-group portfolioUpdateForm">
        <div class="form-group">
            <label for="skills_DestinationID">Skills Number: </label>
            <select id="skills_DestinationID" class="form-control memberFocus">
                <option value="1" selected="selected">Skill #1</option>
                <option value="2">Skill #2</option>
                <option value="3">Skill #3</option>
            </select>
        </div>
        <div class="form-group">
            <label for="txtSkillLabel">Skill Name</label>
            <input id="txtSkillLabel"  class="form-control memberFocus" type="text">
            <input id="skillColumnDestinationID" type="hidden">
        </div>
        <div class="form-group-lg">
            <label for="txtAreaSkillsColumn">Skill Description</label>
            <textarea id="txtAreaSkillsColumn" class="form-control memberFocus" rows="4" cols="50"></textarea>
        </div>
        <div class="form-group">
            <button id="btnAddSkillsImage" class="btn btn-default memberSubmitButton">Upload Skill Icon</button>
            <input id="fileSkillsIcon" type="file">
            <input id="fileSkillsDestinationID" type="hidden">
        </div>
        <button id="btnSubmitSkill_Column_Label_Image" class="btn btn-default memberSubmitButton">Save</button>
    </div>
    <legend class="legend">Resume Upload</legend>
    <div id="skills_resumeForm" class="form-group portfolioUpdateForm">
        <div class="form-group">
            <label for="fileResume">Resume: (PDF only!)</label>
            <input  id="fileResume" class="form-control memberFocus" type="file">
        </div>
        <hr>
        <button id="btnAddResume" class="btn btn-default memberSubmitButton">Upload Resume</button>
    </div>
</form>