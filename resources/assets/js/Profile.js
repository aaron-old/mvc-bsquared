/**
 * 
 * @type {{init}}
 */
BSQUARED.Profile = (function(){
    
    var url = window.location.pathname;
    var submitProfile = $('#userProfileForm');
    var $post = {};

    return {
        init: function(){
            
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




// $('#userProfileForm').submit(function(event){
//
//     var url = url;
//     $post.firstName = $('#txtFirstName').val();
//     $post.lastName = $('#txtLastName').val();
//     $post.aboutMe = $('#txtAreaAboutMe').val();
//     $post.token = $('input[name="_token"]').val();
//     BSQUARED.Forms.post("POST", url, $post);
// });

//
// btnSubmitProfile.on('click', function(event){
//    event.preventDefault();
//   
//     alert('post');
//     var url = window.location.pathname;
//     var $post = {};
//    
//     $post.firstName = $('#firstName').val();
//     $post.lastName = $('#lastName').val();
//     $post.aboutMe = $('#aboutMe').val();
//    
//     BSQUARED.Forms.post("POST", url, $post);
// });