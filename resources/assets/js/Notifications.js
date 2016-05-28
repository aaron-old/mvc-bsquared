/*--------------------------------

 File Name: Bsquared.js

 Date:
 Modified:
 Notes:
 -----------------------------------*/

BSQUARED.Notifications = (function() {

    var successNotificationPortfolio;
    
    successNotificationPortfolio = function () {
        $('.result').html('<div class="alert alert-success" role="alert">' +
            '<button type="button" class="close">x</button>Portfolio Updated!</div>');

        window.setTimeout(function () {
            $('.alert-success').fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            })
        }, 5000);

        $('.alert-success .close').on('click', function (e) {
            $(this).parent().fadeTo(500, 0).slideUp(500)
        });
    };


    var errorNotificationPortfolio = function() {

        $('.result').html('<div class="alert alert-danger" role="alert">' +
            '<button type="button" class="close">x</button>Seems to have been an error</div>');

        window.setTimeout(function () {
            $('.alert-danger').fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            })
        }, 5000);

        $('.alert-danger .close').on('click', function (e) {
            $(this).parent().fadeTo(500, 0).slideUp(500)
        });
    };

    return {

        sendSuccessNotification : function(){
             return successNotificationPortfolio();
        },

        sendErrorNotification : function(){
            return errorNotificationPortfolio();
        },

        sendConfirmationNotification : function(properties){

        }
    }

})();