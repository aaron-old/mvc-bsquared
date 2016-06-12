/*--------------------------------

 File Name: Profile.js
 Date: 2016 28 2016
 Author: Aaron Young
 Modified By:
 Modified Date:
 Notes:
 -----------------------------------*/

/**
 * 
 * @type {{init}}
 */
BSQUARED.Profile = (function(){
    
    var url = window.location.pathname;
    var imageURL = '/path';
    var $post = {};
    
    return {
        init: function(){

            $('#txtFirstName').focus();
            //('#fileProfilePhoto').hide();
            $('#fileProfilePhotoDestinationID').val(36);
            
            $('#userProfileForm').submit(function(event) {
                event.preventDefault();

                $post.firstName = $('#txtFirstName').val();
                $post.lastName = $('#txtLastName').val();
                $post.aboutMe = $('#txtAreaAboutMe').val();
                BSQUARED.Forms.post('POST', url, $post);
            });
            
            $('#userProfilePhotoForm').submit(function(event){
                event.preventDefault();
                var data = new FormData($('#userProfilePhotoForm')[0]);
                data.append('destinationID', $('#fileProfilePhotoDestinationID').val());
                BSQUARED.Forms.postFiles("POST", imageURL, data)
            });

            //$('#fileProfilePhoto').on('change', prepareUpload);
            // var data = new FormData();
            //
            // $.each(files, function(key, value){
            //     data.append(key, value);
            // });
            // data.append('destination_id', $('#fileProfilePhotoDestinationID').val());
            // console.log($postImage);
            // console.log(imageURL);
            // BSQUARED.Forms.postFiles('POST', imageURL, data);
        }
    }
})();


