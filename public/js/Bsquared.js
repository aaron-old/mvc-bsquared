'use strict';

/*--------------------------------

File Name: Bsquared.js

Date:
Modified:
Notes:
-----------------------------------*/

// Global Namespace.
var BSQUARED = BSQUARED || {};

/**
 * 
 * @type {{init}}
 */
BSQUARED.Main = function () {

    var year = new Date().getFullYear();

    return {

        // A public function utilizing privates
        init: function init() {
            var footerYear = $('#footerYear').html('2014-' + year);
        }
    };
}();

$(document).ready(function () {
    BSQUARED.Main.init();
    BSQUARED.Profile.init();
});

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
BSQUARED.LoginForms = function () {

    var email = $('.email');
    var password = $('.password');
    var userIcon = $('.user-icon');
    var passIcon = $('.pass-icon');

    /**
     * 
     */
    return {
        init: function init() {
            email.focus(function () {
                userIcon.css('left', '-48px');
            }).blur(function () {
                userIcon.css('left', '0px');
            });

            password.focus(function () {
                passIcon.css('left', '-48px');
            }).blur(function () {
                passIcon.css('left', '0px');
            });
        }
    };
}();
/*--------------------------------

 File Name: Bsquared.js

 Date:
 Modified:
 Notes:
 -----------------------------------*/

BSQUARED.Skills = function () {

    var btnSubmitSkills = $('#btnSubmitSkills');

    return {

        init: function init() {

            btnSubmitSkills.on('click', function (event) {
                event.preventDefault();

                var url = window.location.pathname;
                var $post = {};

                $post.portion = $('#destination_id').val();
                $post.label = $('#label').val();
                $post.column = $('#column_text').val();

                BSQUARED.Forms.post("POST", url, $post);
            });
        }
    };
}();

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
BSQUARED.UserControls = function () {

    return {
        init: function init() {}
    };
}();
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
BSQUARED.Profile = function () {

    var url = window.location.pathname;
    var $post = {};

    return {
        init: function init() {

            $('#txtFirstName').focus();

            $('#userProfileForm').submit(function (event) {

                event.preventDefault();

                $post.firstName = $('#txtFirstName').val();
                $post.lastName = $('#txtLastName').val();
                $post.aboutMe = $('#txtAreaAboutMe').val();
                $post.token = $('input[name="_token"]').val();

                BSQUARED.Forms.post('POST', url, $post);
            });
        }
    };
}();

/*--------------------------------

 File Name: Bsquared.js

 Date:
 Modified:
 Notes:
 -----------------------------------*/

BSQUARED.Forms = function () {

    return {

        post: function post(type, url, data) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                }
            });
            $.ajax({
                method: type,
                url: url,
                data: data,
                datatype: "json",
                cache: false,

                success: function success(message) {
                    BSQUARED.Notifications.sendSuccessNotification();
                }
            }).done(function (message) {
                console.log(message['message']);
            });
        }
    };
}();

/*--------------------------------

 File Name: Bsquared.js

 Date:
 Modified:
 Notes:
 -----------------------------------*/

BSQUARED.Notifications = function () {

    var successNotificationPortfolio;

    successNotificationPortfolio = function successNotificationPortfolio() {
        $('.result').html('<div class="alert alert-success" role="alert">' + '<button type="button" class="close">x</button>Portfolio Updated!</div>');

        window.setTimeout(function () {
            $('.alert-success').fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 5000);

        $('.alert-success .close').on('click', function (e) {
            $(this).parent().fadeTo(500, 0).slideUp(500);
        });
    };

    var errorNotificationPortfolio = function errorNotificationPortfolio() {

        $('.result').html('<div class="alert alert-danger" role="alert">' + '<button type="button" class="close">x</button>Seems to have been an error</div>');

        window.setTimeout(function () {
            $('.alert-danger').fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 5000);

        $('.alert-danger .close').on('click', function (e) {
            $(this).parent().fadeTo(500, 0).slideUp(500);
        });
    };

    return {

        sendSuccessNotification: function sendSuccessNotification() {
            return successNotificationPortfolio();
        },

        sendErrorNotification: function sendErrorNotification() {
            return errorNotificationPortfolio();
        },

        sendConfirmationNotification: function sendConfirmationNotification(properties) {}
    };
}();
//# sourceMappingURL=Bsquared.js.map
