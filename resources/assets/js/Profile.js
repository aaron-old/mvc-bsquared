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
    var $post = {};
    
    return {
        init: function(){

            $('#txtFirstName').focus();
            $('#fileProfilePhoto').hide();
            
            $('#userProfileForm').submit(function(event) {

                event.preventDefault();

                $post.firstName = $('#txtFirstName').val();
                $post.lastName = $('#txtLastName').val();
                $post.aboutMe = $('#txtAreaAboutMe').val();
                $post.token = $('input[name="_token"]').val();
                
                BSQUARED.Forms.post('POST', url, $post);
            });
            
            $('#btnAddProfilePhoto').on('click', function(event){
                event.preventDefault();
                $('#fileProfilePhoto').click();
            })
        }
    }
})();


