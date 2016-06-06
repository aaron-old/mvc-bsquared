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
    var $postImage = {};
    
    return {
        init: function(){

            $('#txtFirstName').focus();
            //('#fileProfilePhoto').hide();
            $('#fileProfilePhotoDestinationID').val(36);
            
            $('#userProfileForm').submit(function(event) {
                
                var fileProfilePhoto = $('#fileProfilePhoto');
                event.preventDefault();

                $post.firstName = $('#txtFirstName').val();
                $post.lastName = $('#txtLastName').val();
                $post.aboutMe = $('#txtAreaAboutMe').val();
                $post.token = $('input[name="_token"]').val();
                $postImage.file  = new FormData(fileProfilePhoto[0]);
                $postImage.destinationID = $('#fileProfilePhotoDestinationID').val();
                
                BSQUARED.Forms.post('POST', url, $post);
                BSQUARED.Forms.post('POST', imageURL, $post);
            });
            
            // $('#btnAddProfilePhoto').on('click', function(event){
            //     event.preventDefault();
            //     $('#fileProfilePhoto').click();
            // })
        }
    }
})();


