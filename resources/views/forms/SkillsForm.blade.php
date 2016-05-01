<form id="skills" action="{{url('/member/skills')}}" method="post" enctype="multipart/form-data">

    <fieldset id="skillsForm">
        <legend>Skills Section</legend>
        <p><label for="destination_id">Skills Number: </label></p>
        <p><select name="destination_id" id="destination_id">
                <option value="1" selected="selected">Skill #1</option>
                <option value="2">Skill #2</option>
                <option value="3">Skill #3</option>
            </select></p><br>

        <!-- Script updates the form based off the value changed in the select drop down.
        How do I keep the values if the user changes this last.
        -->

        <p><label for="label">Label One</label></p>
        <p><input type="text" name="label" id="label"></p><br>

        <p><label for="iconImg">Upload an Icon:(PNG or JPG Only) Dimensions:48X48 </label></p><br>
        <p><input type="file" name="iconImg" id="iconImg"></p><br>

        <p><label for="column_text">Column Text</label></p>
        <p><textarea rows="4" cols="50" name="column_text" id="column_text"></textarea></p><br>

        <p><input type="submit" name="submit_skills" id="submit_skills" value="Update Skills"></p>
    </fieldset>
    <br>
    <!--
    Resume Upload... PDF only
    -->
    <fieldset id="resumeForm">
        <legend>Resume Upload</legend>
        <p><label for="">Resume: (PDF only!)</label></p>

        <p><input type="file" name="resume" id="resume"></p><br>
        <input type="submit" name="submit_resume" id="submit_resume" value="Submit Resume">

        <!--Maybe add a resume preview here on the bottom based of the users previous input ( keeps design similar.)
        if(get the path of the resume is not not null then)
        display the page
        else
        display not yet uploaded.
        -->
    </fieldset>
</form>