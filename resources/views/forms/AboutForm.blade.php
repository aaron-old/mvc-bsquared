<form id="about" action="{{url('/member/about')}}" method="post" enctype="multipart/form-data">

    <fieldset>
        <legend>About Overview</legend>
        <p><label for="overview">Overview: </label></p>

        <p><textarea cols="100" rows="5" name="overview" id="overview"></textarea></p>
        <p><input type="submit" name="submit_overview" id="submit_overview" value="Update Overview"></p><br>
    </fieldset>
    <br>

    <fieldset>
        <legend>About Me Segments</legend>

        <p><label for="destination_id">About Me Number:</label></p>
        <p><select name="destination_id" id="destination_id">
                <option value="1" selected="selected">About Me #1</option>
                <option value="2">About Me #2</option>
                <option value="3">About Me #3</option>
            </select></p>
        <br>

        <p><label for="aboutImage">Upload an Image:(PNG or JPG Only) Dimensions:140X140</label></p>
        <p><input type="file" name="aboutImage" id="aboutImage"></p><br>
        <p><label for="label">Label Name</label>
            <input type="text" name="label" id="label"></p><br>



        <p><label for="column_text">Column Text</label></p>
        <p><textarea rows="4" cols="50" name="column_text" id="column_text"></textarea></p><br>

        <input type="submit" name="submit_about" id="submit_about" value="Update About Me Segment">
    </fieldset>
    <br>
</form>