/**
 *
 * Aaron Young, Megan Palmer, Lucas Mathis, Peter Atwater, Sherri Miller
 * Bob Fisher, Kathy Pratt, James Gibbs, Tanya Ulrich, Kyle Cleven, Jason Kessler-Holt
 * Source for Navigation: http://cssmenumaker.com/
 * Source for Hashing Algorithm: http://pajhome.org.uk/crypt/md5/sha512.html
 * Source for Back-End(Tutorial):http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
 * Source for Login Page: http://www.24psd.com/css3-login-form-template/
 * Inspired by: http://www.noahglushien.com/
 * FAQ Source: http://www.snyderplace.com/demos/collapsible.html
 *
 * CREATIVE COMMONS- All social media link and images used fall under CC
 * http://creativecommons.org/licenses/by/3.0/legalcode
 */

BSQUARED.Profile = (function(){
    
    var btnSubmitProfile = $('#test');
    
    return {
        init: function(){

            btnSubmitProfile.on('click', function(event){
               event.preventDefault();
                
                alert('post');
                // var url = window.location.pathname;
                // var $post = {};
                //
                // $post.firstName = $('#firstName').val();
                // $post.lastName = $('#lastName').val();
                // $post.aboutMe = $('#aboutMe').val();
                //
                // BSQUARED.Forms.post("POST", url, $post);
            });
        }
    }
})();