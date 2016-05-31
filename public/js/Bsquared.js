'use strict';

/*--------------------------------

 File Name: Bsquared.js
 Date: 2016 28 2016
 Author: Aaron Young
 Modified By:
 Modified Date:
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
    BSQUARED.Portfolio.init();
    BSQUARED.Profile.init();
    BSQUARED.Statement.init();
    BSQUARED.About.init();
    BSQUARED.Skills.init();
    BSQUARED.Works.init();
});

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
BSQUARED.Portfolio = function () {

    return {
        init: function init() {
            $('#btnSendMemberMail').on('click', function (event) {
                event.preventDefault();
                BSQUARED.Notifications.success_MemberMail_Notification();
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

 File Name: Skills.js
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
BSQUARED.Skills = function () {

    var labelURL = '/label';
    var columnURL = '/column';
    var imageURL = '/path';
    var resumeURL = '/resume';

    var destination_id;

    /**
     *
     * @type {{labelDestinationID: number, columnDestinationID: number, imageDestinationID: number, resumeDestinationID: number}}
     */
    var destinations = {
        labelDestinationID: 1,
        columnDestinationID: 4,
        imageDestinationID: 1,
        resumeDestinationID: 35
    };

    /**
     *
     * @param label
     * @param column
     * @param image
     * @param resume
     */
    var setDestinations = function setDestinations(label, column, image, resume) {
        destinations.labelDestinationID = label;
        destinations.columnDestinationID = column;
        destinations.imageDestinationID = image;
        destinations.resumeDestinationID = resume;

        $('#skillLabelDestinationID').val(destinations.labelDestinationID);
        $('#skillColumnDestinationID').val(destinations.columnDestinationID);
        $('#fileSkillsDestinationID').val(destinations.imageDestinationID);
        $('#fileResumeDestinationID').val(destinations.resumeDestinationID);

        loadValues(labelURL, label);
        loadValues(columnURL, column);
    };

    var loadValues = function loadValues(url, destination_id) {
        url = url + '/' + destination_id;
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() }
        });
        $.ajax({
            method: "GET",
            url: url,
            datatype: "json",
            cache: false,
            success: function success(data) {},
            error: function error(data) {
                BSQUARED.Notifications.error_Loading_Notification();
            }
        }).done(function (data) {
            if (data.hasOwnProperty('label')) {
                $('#txtSkillLabel').val(data.label.label);
            }
            if (data.hasOwnProperty('column')) {
                $('#txtAreaSkillsColumn').val(data.column.column_text);
            }
        });
    };

    var getDestinations = function getDestinations(destination_id) {
        switch (destination_id) {
            case '1':
                setDestinations(1, 4, 1, 35);
                break;
            case '2':
                setDestinations(2, 5, 2, 35);
                break;
            case '3':
                setDestinations(3, 6, 3, 35);
                break;
            default:
                setDestinations(1, 4, 1, 35);
        }
    };

    return {

        init: function init() {
            var firstFieldFocus = $('#txtSkillLabel');
            var fileImageInput = $('#fileSkillsIcon');
            var fileResumeInput = $('#fileResume');
            var formSelectDestination = $('#skills_DestinationID');
            var btnSaveSkill = $('#btnSubmitSkill_Column_Label_Image');

            var labelDestinationID = $('#skillLabelDestinationID');
            var columnDestinationID = $('#skillColumnDestinationID');
            var imageDestinationID = $('#fileSkillsDestinationID');
            var resumeDestinationID = $('#fileResumeDestinationID');

            firstFieldFocus.focus();
            fileImageInput.hide();
            fileResumeInput.hide();
            fileResumeInput.hide();

            labelDestinationID.val(1);
            columnDestinationID.val(4);
            imageDestinationID.val(1);
            resumeDestinationID.val(35);

            loadValues(labelURL, labelDestinationID.val());
            loadValues(columnURL, columnDestinationID.val());

            formSelectDestination.on('change').on('click', function () {
                destination_id = $('#skills_DestinationID').find('option:selected').val();
                getDestinations(destination_id);
            });

            btnSaveSkill.on('click', function (event) {
                event.preventDefault();

                var $postLabel = {};
                var $postColumn = {};
                var $postImage = {};
                var $postResume = {};

                $postLabel.label = $('#txtSkillLabel').val();
                $postLabel.labelDestinationID = labelDestinationID.val();

                $postColumn.column = $('#txtAreaSkillsColumn').val();
                $postColumn.columnDestinationID = columnDestinationID.val();

                BSQUARED.Forms.post("POST", labelURL, $postLabel);
                BSQUARED.Forms.post('POST', columnURL, $postColumn);
            });

            $('#btnAddResume').on('click', function (event) {
                event.preventDefault();
                $('#fileResume').click();
            });

            $('#btnAddSkillsImage').on('click', function (event) {
                event.preventDefault();
                $('#fileSkillsIcon').click();
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
BSQUARED.UserControls = function () {}();
/*--------------------------------

 File Name: Profile.js
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
BSQUARED.Profile = function () {

    var url = window.location.pathname;
    var $post = {};

    return {
        init: function init() {

            $('#txtFirstName').focus();
            $('#fileProfilePhoto').hide();

            $('#userProfileForm').submit(function (event) {

                event.preventDefault();

                $post.firstName = $('#txtFirstName').val();
                $post.lastName = $('#txtLastName').val();
                $post.aboutMe = $('#txtAreaAboutMe').val();
                $post.token = $('input[name="_token"]').val();

                BSQUARED.Forms.post('POST', url, $post);
            });

            $('#btnAddProfilePhoto').on('click', function (event) {
                event.preventDefault();
                $('#fileProfilePhoto').click();
            });
        }
    };
}();

/*--------------------------------

 File Name: Forms.js
 Date: 2016 28 2016
 Author: Aaron Young
 Modified By:
 Modified Date:
 Notes:
 -----------------------------------*/

/**
 * 
 * @type {{post}}
 */
BSQUARED.Forms = function () {

    /**
     * PRIVATE VARIABLE & METHODS
     */

    var ajaxSetup;
    var portfolioSuccess;
    var portfolioError;

    /**
     * PUBLIC METHODS
     */
    return {

        /**
         * 
         * @param type
         * @param url
         * @param data
         */
        post: function post(type, url, data) {
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() }
            });
            $.ajax({
                method: type,
                url: url,
                data: data,
                datatype: "json",
                cache: false,
                success: function success(data) {
                    console.log(data);
                    BSQUARED.Notifications.sendSuccessNotification();
                },
                error: function error(data) {
                    console.log(data);
                    BSQUARED.Notifications.sendErrorNotification();
                }

            }).done(function (data) {
                console.log(data);
            });
        },

        postFiles: function postFiles(type, url, data) {
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() }
            });
            $.ajax({
                method: type,
                url: url,
                data: data,
                datatype: "json",
                cache: false,
                processData: false,
                contentType: false,
                success: function success() {
                    console.log('alert the user');
                    BSQUARED.Notifications.sendSuccessNotification();
                },
                error: function error() {
                    console.log('alert the user');
                    BSQUARED.Notifications.sendErrorNotification();
                }
            });
        },

        uploadFiles: function uploadFiles(event, data) {}
    };
}();

/*--------------------------------

 File Name: Notification.js
 Date: 2016 28 2016
 Author: Aaron Young
 Modified By:
 Modified Date:
 Notes: Used to create and return notification's to the users based on control/form uploads.
 -----------------------------------*/

BSQUARED.Notifications = function () {

    /**
        PRIVATE VARIABLES & METHODS
     */

    var properties = {};

    var notification;
    var successNotification_Portfolio;
    var errorNotification_Portfolio;
    var successNotification_Mail;
    var errorNotification_Mail;
    var errorLoadNotification;

    var errorMessage = 'Seems to have been an error, want to report a bug? <a href="#">E-mail Support Team</a>';
    var loadWarning = 'Seems some of your data did not load properly, want to report a bug?<a href="#">E-mail Support Team</a>';

    /**
     * 
     * @param properties
     */
    notification = function notification(properties) {

        $('.result').html('<div class="alert ' + properties.type + '">' + '<button type="button" class="close">x</button>' + properties.message + '</div>');

        window.setTimeout(function () {
            $('.' + properties.type).fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 5000);

        $('.' + properties.type + '.close').on('click', function (e) {
            $(this).parent().fadeTo(500, 0).slideUp(500);
        });
    };

    successNotification_Portfolio = function successNotification_Portfolio() {
        properties.type = 'alert-success';
        properties.message = 'Portfolio Updated!';

        notification(properties);
    };

    errorNotification_Portfolio = function errorNotification_Portfolio() {
        properties.type = 'alert-danger';
        properties.message = errorMessage;

        notification(properties);
    };

    successNotification_Mail = function successNotification_Mail() {
        properties.type = 'alert-success';
        properties.message = 'Message Sent!';

        notification(properties);
    };

    errorNotification_Mail = function errorNotification_Mail() {
        properties.type = 'alert-danger';
        properties.message = errorMessage;

        notification(properties);
    };

    errorLoadNotification = function errorLoadNotification() {
        properties.type = 'alert-warning';
        properties.message = loadWarning;

        notification(properties);
    };

    /**
     * Public Methods
     */
    return {

        sendSuccessNotification: function sendSuccessNotification() {
            return successNotification_Portfolio();
        },

        sendErrorNotification: function sendErrorNotification() {
            return errorNotification_Portfolio();
        },

        success_MemberMail_Notification: function success_MemberMail_Notification() {
            return successNotification_Mail();
        },

        error_MemberMail_Notification: function error_MemberMail_Notification() {
            return errorNotification_Mail();
        },

        error_Loading_Notification: function error_Loading_Notification() {
            return errorLoadNotification();
        }
    };
}();
/*--------------------------------

 File Name: Statement.js
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
BSQUARED.Statement = function () {

    var url = window.location.pathname;
    var $post = {};
    var files = {};

    return {

        /**
         *
         */
        init: function init() {

            $('#fileBackgroundImage').hide();
            $('#txtStatement').focus();

            $('#fileProfilePhoto').on('change');

            $('#userStatementForm').submit(function (event) {
                event.preventDefault();

                $post.statement = $('#txtStatement').val();
                $post.token = $('input[name="_token"]').val();

                BSQUARED.Forms.post('POST', url, $post);
            });

            $('#btnBackgroundImage').on('click', function (event) {
                event.preventDefault();
                $('#fileBackgroundImage').click();
            });
        }
    };
}();
/*--------------------------------

 File Name: Bsquared.js
 Date: 2016 28 2016
 Modified By:
 Modified Date:
 Notes:
 -----------------------------------*/

/**
 *
 * @type {{init}}
 */
BSQUARED.About = function () {

    /**
     * PRIVATE VARIABLES & METHODS
     * @type {string}
     */

    var overviewURL = window.location.pathname;
    var labelURL = '/label';
    var columnURL = '/column';
    var imageURL = '/path';

    var destination_id;

    /**
     * 
     * @type {{labelDestinationID: number, columnDestinationID: number, imageDestinationID: number}}
     */
    var destinations = {
        labelDestinationID: 22,
        columnDestinationID: 7,
        imageDestinationID: 22
    };

    /**
     * 
     * @param label
     * @param column
     * @param image
     */
    var setDestinations = function setDestinations(label, column, image) {
        destinations.labelDestinationID = label;
        destinations.columnDestinationID = column;
        destinations.imageDestinationID = image;

        $('#aboutLabelDestinationID').val(destinations.labelDestinationID);
        $('#aboutColumnDestinationID').val(destinations.columnDestinationID);
        $('#fileAboutDestinationID').val(destinations.imageDestinationID);

        loadValues(labelURL, label);
        loadValues(columnURL, column);
    };

    var loadValues = function loadValues(url, destination_id) {
        url = url + '/' + destination_id;
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() }
        });
        $.ajax({
            method: "GET",
            url: url,
            datatype: "json",
            cache: false,
            success: function success(data) {
                console.log('made');
                console.log(data);
            },
            error: function error(data) {
                console.log(data);
                BSQUARED.Notifications.error_Loading_Notification();
            }
        }).done(function (data) {
            console.log('done');
            console.log(data);

            if (data.hasOwnProperty('label')) {
                $('#txtAboutLabel').val(data.label.label);
            } else {
                //noinspection JSUnresolvedVariable
                $('#txtAreaAboutColumn').val(data.column.column_text);
            }
        });
    };

    var getDestinations = function getDestinations(destination_id) {
        switch (destination_id) {
            case '1':
                console.log(1);
                setDestinations(22, 7, 22);
                break;
            case '2':
                console.log(2);
                setDestinations(23, 8, 23);
                break;
            case '3':
                console.log(3);
                setDestinations(24, 9, 24);
                break;
            default:
                setDestinations(22, 7, 22);
                break;
        }
    };
    return {

        init: function init() {
            var firstFieldFocus = $('#txtAbout_Overview');
            var fileInput = $('#fileAboutImage');
            var aboutLabelDestinationID = $('#aboutLabelDestinationID');
            var fileDestination = $('#fileAboutDestinationID');
            var aboutColumnDestinationID = $('#aboutColumnDestinationID');
            var formSelectDestination = $('#about_DestinationID');
            var btnSaveAbout = $('#btnSubmitAbout_Column_Label_Image');
            var btnSaveOverview = $('#btnSubmitAbout_Overview');
            var btnAboutImage = $('#btnAddAboutImage');

            fileInput.hide();
            firstFieldFocus.focus();
            aboutLabelDestinationID.val(22);
            aboutColumnDestinationID.val(7);
            fileDestination.val(22);

            loadValues(labelURL, aboutLabelDestinationID.val());
            loadValues(columnURL, aboutColumnDestinationID.val());
            //load images

            formSelectDestination.on('change', function () {
                destination_id = $('#about_DestinationID').find('option:selected').val();
                getDestinations(destination_id);
            });

            btnSaveAbout.on('click', function (event) {
                event.preventDefault();

                var $postLabel = {};
                var $postColumn = {};
                var $postImage = {};

                var token = $('input[name="_token"]');

                $postLabel.label = $('#txtAboutLabel').val();
                $postColumn.column = $('#txtAreaAboutColumn').val();
                $postLabel.labelDestinationID = $('#aboutLabelDestinationID').val();
                $postColumn.columnDestinationID = $('#aboutColumnDestinationID').val();
                $postColumn.token = token.val();
                $postLabel.token = token.val();

                BSQUARED.Forms.post("POST", labelURL, $postLabel);
                BSQUARED.Forms.post("POST", columnURL, $postColumn);
            });

            btnAboutImage.on('click', function (event) {
                event.preventDefault();
                fileInput.click();
            });

            btnSaveOverview.on('click', function (event) {
                event.preventDefault();

                var $post = {};

                $post.overview = $('#txtAbout_Overview').val();

                BSQUARED.Forms.post("POST", overviewURL, $post);
            });
        }
    };
}();
/*--------------------------------

 File Name: Overview.js
 Date: 2016 28 2016
 Author: Aaron Young
 Modified By:
 Modified Date:
 Notes:
 -----------------------------------*/

BSQUARED.Overview = function () {};
/*--------------------------------

 File Name: Bsquared.js
 Date: 2016 28 2016
 Modified By:
 Modified Date:
 Notes:
 -----------------------------------*/

/**
 * 
 * @type {{init}}
 */
BSQUARED.Works = function () {

    var url = window.location.pathname;
    var $post = {};
    var files = {};

    return {
        init: function init() {
            $('#fileProjectThumbnail').hide();
            $('#fileProjectDescriptionImage').hide();

            $('#txtWorksTitle').focus();

            $('#userWorksForm').submit(function (event) {
                event.preventDefault();

                $post.worksTitle = $('#txtWorksTitle').val();
                $post.description = $('#txtAreaProjectDescription').val();
                $post.link = $('#txtProjectLink').val();

                BSQUARED.Forms.post('POST', url, $post);
            });

            $('#btnAddProjectThumbnail').on('click', function () {
                event.preventDefault();
                $('#fileProjectThumbnail').click();
            });

            $('#btnAddProjectDescriptionImage').on('click', function (event) {
                event.preventDefault();
                $('#fileProjectDescriptionImage').click();
            });
        }
    };
}();
//# sourceMappingURL=Bsquared.js.map
