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
            $('#btnSendMemberMail').on('click', function(event){
                event.preventDefault();
                BSQUARED.Notifications.success_MemberMail_Notification();
            });
        }
    }
})();

