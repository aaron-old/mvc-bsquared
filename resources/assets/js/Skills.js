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

BSQUARED.Skills = (function(){
    
    var btnSubmitSkills = $('#btnSubmitSkills');
    
    return {
        
        init:function(){
            
            btnSubmitSkills.on('click', function(event){
                event.preventDefault();
                
                var url = window.location.pathname;
                var $post = {};
                
                $post.portion = $('#destination_id').val();
                $post.label = $('#label').val();
                $post.column =$('#column_text').val();

                BSQUARED.Forms.post("POST", url, $post);
            });
        }
    }
    
    
})();
