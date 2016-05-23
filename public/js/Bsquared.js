'use strict';

/**
 * Created by Aaron Young on 5/21/2016.
 */

// Global Namespace.
var BSQUARED = BSQUARED || {};

BSQUARED.Main = function () {

    var year;
    year = new Date().getFullYear();

    var btnSubmitTest = $('#test');

    // // A private function which logs any arguments
    // alertYear = function(  ) {
    //     alert(currentYear);
    // };

    return {

        // A public function utilizing privates
        init: function init() {

            var footerYear = $('#footerYear').html('2014-' + year);
            BSQUARED.Profile.init();

            btnSubmitTest.on('click', function () {
                alert('here');
            });
        }
    };
}();

$(document).ready(function () {
    BSQUARED.Main.init();
});

/**
 * Created by Aaron Young on 5/21/2016.
 */

BSQUARED.LoginForms = function () {}();
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

BSQUARED.UserControls = function () {

    return {};
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

BSQUARED.Profile = function () {

    var btnSubmitProfile = $('#test');

    return {
        init: function init() {

            btnSubmitProfile.on('click', function (event) {
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

BSQUARED.Forms = function () {

    return {

        post: function post(type, url, data) {
            $.ajax({
                type: type,
                url: url,
                data: data.serialize(),
                datatype: "json",
                cache: true,

                success: function success(data) {
                    return data;
                }
            });
        }
    };
}();
//# sourceMappingURL=Bsquared.js.map
