/*--------------------------------

 File Name: Notification.js
 Date: 2016 28 2016
 Author: Aaron Young
 Modified By:
 Modified Date:
 Notes: Used to create and return notification's to the users based on control/form uploads.
 -----------------------------------*/

BSQUARED.Notifications = (function() {

    /**
        PRIVATE VARIABLES & METHODS
     */

    var properties = {};
    
    var notification;
    var successNotification_Portfolio;
    var errorNotification_Portfolio;
    var successNotification_Mail;
    var errorNotification_Mail;
    
    var errorMessage = 'Seems to have been an error, want to report a bug? <a href="#">E-mail Support Team</a>';


    /**
     * 
     * @param properties
     */
    notification = function(properties) {

        $('.result').html('<div class="alert ' + properties.type + '">' +
            '<button type="button" class="close">x</button>' + properties.message + '</div>');

        window.setTimeout(function () {
            $('.' + properties.type).fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            })
        }, 5000);

        $('.' + properties.type + '.close').on('click', function(e){
            $(this).parent().fadeTo(500, 0).slideUp(500)
        });
    };



    
    successNotification_Portfolio = function () {
        properties.type = 'alert-success';
        properties.message = 'Portfolio Updated!';

        notification(properties);
    };


    errorNotification_Portfolio = function () {
        properties.type='alert-error';
        properties.message= errorMessage;

        notification(properties);
    };
    
    successNotification_Mail = function () {
        properties.type='alert-success';
        properties.message = 'Message Sent!';
        
        notification(properties);
    };
    
    errorNotification_Mail = function () {
        properties.type='alert-error';
        properties.message= errorMessage;
        
        notification(properties);
    };

    /**
     * Public Methods
     */
    return {

        sendSuccessNotification : function(){
             return successNotification_Portfolio();
        },

        sendErrorNotification : function(){
            return errorNotification_Portfolio();
        },

        success_MemberMail_Notification : function () {
            return successNotification_Mail();

        },
        
        error_MemberMail_Notification : function () {
            return errorNotification_Mail();
        }
    }

})();