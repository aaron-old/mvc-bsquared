'use strict';

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

/**
 * Created by Aaron Young on 5/21/2016.
 */

/**
 * 
 * @type {{init}}
 */
BSQUARED.UserControls = function () {

    return {
        init: function init() {}
    };
}();
/**
 * 
 * @type {{init}}
 */
BSQUARED.Profile = function () {

    var url = window.location.pathname;
    var submitProfile = $('#userProfileForm');
    var $post = {};

    return {
        init: function init() {

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

                success: function success(response) {
                    return response;
                }
            }).done(function (msg) {
                console.log(msg['message']);
            });
        }
    };
}();
//# sourceMappingURL=Bsquared.js.map
