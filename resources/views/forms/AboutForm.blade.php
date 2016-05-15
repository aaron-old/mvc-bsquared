<form id="about" action="/about/{{$user->username}}" method="post">
    {!! csrf_field() !!}
    <fieldset id="box">

        <legend>Overview Section</legend>
        <label for="overview">Overview: </label>

        <textarea cols="100" rows="5" name="overview" id="overview"></textarea>
        <input type="submit" name="submit_overview" id="submit_overview" value="Update Overview">

        <fieldset>
            <legend>About Me Segments</legend>

            <label for="destination_id">About Me Number:</label>
            <select name="destination_id" id="destination_id">
                    <option value="1" selected="selected">About Me #1</option>
                    <option value="2">About Me #2</option>
                    <option value="3">About Me #3</option>
            </select>


            <label for="aboutImage">Upload an Image:(PNG or JPG Only) Dimensions:140X140</label>
            <input type="file" name="aboutImage" id="aboutImage">
            <label for="label">Label Name</label>
            <input type="text" name="label" id="label">

            <label for="column_text">Column Text</label>
            <textarea rows="4" cols="50" name="column_text" id="column_text"></textarea>

            <input type="submit" name="submit_about" id="submit_about" value="Update About Me Segment">
        </fieldset>
    </fieldset>
</form>


