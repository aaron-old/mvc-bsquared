<form action="/works/{{$user->username}}" method="post" enctype="multipart/form-data" id="works">
    {!! csrf_field() !!}
    <fieldset id="box">
        <fieldset id="worksForm">
            <legend>Update Works</legend>

            <label for="destination_id">Works Number:</label>

            <select name="destination_id" id="destination_id">
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

            <label for="title">Project Title:</label>
            <input type="text" name="title" id="title" placeholder="">

            <label for="projectThumb">Project Thumbnail: (Please Upload .PNG or .JPG) 130X130</label>
            <input type="file" name="projectThumb" id="projectThumb">

            <label for="projectDescription">Project Description: </label>
            <textarea rows="4" cols="50" name="projectDescription" id="projectDescription"></textarea>

            <label for="previewDestination">Preview Destination: (Please Upload .PNG or .JPG) 348X210 </label>
            <input type="file" name="previewDestination" id="previewDestination">

            <label for="work_link">Project Link:(www.example.com) </label>
            <input type="text" name="work_link" id="work_link">

            <input type="submit" name="doWorks" id="doWorks" value="Update Works">
        </fieldset>
    </fieldset>

</form>