<form action="{{url('/member/works')}}" method="post" enctype="multipart/form-data" id="works">
    <fieldset id="worksForm">
        <legend>Update Works</legend>

        <p><label for="destination_id">Works Number:</label></p>

        <p><select name="destination_id" id="destination_id">
                <option value="1" selected="selected">Works 1</option>
                <option value="2">Works 2</option>
                <option value="3">Works 3</option>
                <option value="4">Works 4</option>
                <option value="5">Works 5</option>
                <option value="6">Works 6</option>
                <option value="7">Works 7</option>
                <option value="8">Works 8</option>
                <option value="9">Works 9</option>
            </select></p><br>

        <p><label for="title">Project Title:</label></p>
        <p><input type="text" name="title" id="title" placeholder=""></p><br>

        <p><label for="projectThumb">Project Thumbnail: (Please Upload .PNG or .JPG) 130X130</label></p>
        <p><input type="file" name="projectThumb" id="projectThumb"></p><br>

        <p><label for="projectDescription">Project Description: </label></p>
        <p><textarea rows="4" cols="50" name="projectDescription" id="projectDescription"></textarea></p><br>

        <p><label for="previewDestination">Preview Destination: (Please Upload .PNG or .JPG) 348X210 </label></p>
        <p><input type="file" name="previewDestination" id="previewDestination"></p><br>

        <p><label for="work_link">Project Link:(www.example.com) </label></p>
        <p><input type="text" name="work_link" id="work_link"></p><br>

        <input type="submit" name="doWorks" id="doWorks" value="Update Works">
    </fieldset>
</form>