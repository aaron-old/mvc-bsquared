/*--------------------------------

 File Name: Portfolio.js
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
BSQUARED.Portfolio = (function() {

    
    return {
        init: function(){
            $('.carousel').carousel('pause');

            $('#btnSendMemberMail').on('click', function(event){
                event.preventDefault();
                BSQUARED.Notifications.success_MemberMail_Notification();
            });

            var defaultImageCheck = $('.imageResource');

            defaultImageCheck.each(function(){
               if($(this).attr('src') === ""){
                   $(this).attr('src', 'images/member_uploads/about/default_profile.png');
               }
            });
        }
    }
})();

