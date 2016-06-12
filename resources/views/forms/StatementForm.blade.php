<div class="result"></div>
<legend class="legend">
    Statement
</legend>
<form id="userStatementForm" class="form-inline"
      method="POST"
      action="/statement/{{$user->username}}">
    {!! csrf_field() !!}
    <div id="statementFormFields" class="form-group portfolioUpdateForm">
        <div class="form-group">
            <label for="txtStatement">Short Statement: </label>
            <input id="txtStatement" type="text" class="form-control memberFocus" value="{{old('', $user->statement->statement)}}">
        </div>
    </div>
</form>
<form id="userBackgroundImageForm">
    <div>
        <button id="btnBackgroundImage" class="btn btn-default memberSubmitButton">Upload Background Image</button>
        <input id="fileBackgroundImage" name="member_background_image_user{{$user->user_id}}" type="file">
        <input id="fileBackgroundImageDestinationID" type="hidden" value="21">
    </div>
    <button id="btnSubmitStatement memberFocus" type="submit" class="btn btn-default memberSubmitButton">Save</button>
</form>