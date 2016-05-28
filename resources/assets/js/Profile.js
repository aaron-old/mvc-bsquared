/*--------------------------------

 File Name: Bsquared.js

 Date:
 Modified:
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
            
            $('#userProfileForm').submit(function(event) {

                event.preventDefault();

                $post.firstName = $('#txtFirstName').val();
                $post.lastName = $('#txtLastName').val();
                $post.aboutMe = $('#txtAreaAboutMe').val();
                $post.token = $('input[name="_token"]').val();
                
                BSQUARED.Forms.post('POST', url, $post);
            });
        }
    }
})();


