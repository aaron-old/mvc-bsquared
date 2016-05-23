<form id="skills" action="/skills/{{$user->username}}" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <fieldset id="box">
        <fieldset>
            <legend>My Skills Segments</legend>
            <label for="destination_id">Skills Number: </label>
            <select name="destination_id" id="destination_id">
                    <option value="1" selected="selected">Skill #1</option>
                    <option value="2">Skill #2</option>
                    <option value="3">Skill #3</option>
                </select>

            <label for="label">Label One</label>
            <input type="text" name="label" id="label">

            <label for="iconImg">Upload an Icon:(PNG or JPG Only) Dimensions:48X48 </label>
            <input type="file" name="iconImg" id="iconImg">

            <label for="column_text">Column Text</label>
            <textarea rows="4" cols="50" name="column_text" id="column_text"></textarea>

            <input type="submit" name="submit_skills" id="btnSubmitSkills" value="Update Skills">
        </fieldset>
        <fieldset>
            <legend>Resume Upload</legend>
            <label for="">Resume: (PDF only!)</label>

            <input type="file" name="resume" id="resume">
            <input type="submit" name="submit_resume" id="submit_resume" value="Submit Resume">

            <!--Maybe add a resume preview here on the bottom based of the users previous input ( keeps design similar.)
               if(get the path of the resume is not not null then)
                    display the page
               else
                    display not yet uploaded.
             -->
        </fieldset>
    </fieldset>
</form>