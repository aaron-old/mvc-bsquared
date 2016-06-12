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
BSQUARED.About = (function(){

    /**
     * PRIVATE VARIABLES & METHODS
     * @type {string}
     */

    var overviewURL = window.location.pathname;
    
    var form      = 'about';
    var labelURL  = '/label';
    var columnURL = '/column';
    var imageURL  = '/path';
    
    var destination_id;

    var column = $('#txtAreaAboutColumn');
    var label  = $('#txtAboutLabel');

    /**
     * 
     * @type {{labelDestinationID: number, columnDestinationID: number, imageDestinationID: number}}
     */
    var destinations = {
        labelDestinationID  : 22,
        columnDestinationID : 7,
        imageDestinationID  : 22
    };

    /**
     *
     * @param optionValue
     */
    var setDestinations = function(optionValue) {
        
        destinations.labelDestinationID  = BSQUARED.Destinations.searchLists(form, optionValue, 'labelDestination');
        destinations.columnDestinationID = BSQUARED.Destinations.searchLists(form, optionValue, 'columnDestination');
        destinations.imageDestinationID  = BSQUARED.Destinations.searchLists(form, optionValue, 'image');
        
        $('#aboutLabelDestinationID').val(destinations.labelDestinationID);
        $('#aboutColumnDestinationID').val(destinations.columnDestinationID);
        $('#fileAboutDestinationID').val(destinations.imageDestinationID);

        BSQUARED.Forms.loadValues(labelURL, destinations.labelDestinationID, 'label', label);
        BSQUARED.Forms.loadValues(columnURL, destinations.columnDestinationID, 'column', column);
    };

    /**
     * 
     * @param destination_id
     */
    var getDestinations = function(destination_id){
        var fileAboutImage = $('#fileAboutImage');

        var userIDStart = fileAboutImage.attr('name').lastIndexOf('_');
        var userID = fileAboutImage.attr('name').substr(userIDStart+1);
        switch(destination_id) {
            case '1':
                setDestinations(1);
                fileAboutImage.attr('name', 'member_about_image_1_user_'+userID);
                break;
            case '2':
                setDestinations(2);
                fileAboutImage.attr('name', 'member_about_image_2_user_'+userID);
                break;
            case '3' :
                setDestinations(3);
                fileAboutImage.attr('name', 'member_about_image_3_user_'+userID);
                break;
            default:
                setDestinations(1);
                fileAboutImage.attr('name', 'member_about_image_1_user_'+userID);
                break;
        }
    };
    
    return {

        init:function(){
            
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
            
            BSQUARED.Forms.loadValues(labelURL, aboutLabelDestinationID.val(), 'label', label);
            BSQUARED.Forms.loadValues(columnURL, aboutColumnDestinationID.val(), 'column', column);
            
            formSelectDestination.on('change', function(){
                destination_id = $('#about_DestinationID').find('option:selected').val();
                getDestinations(destination_id);
            });
            
            btnSaveAbout.on('click', function(event){
                event.preventDefault();
                
                var $postLabel = {};
                var $postColumn = {};

                $('#userAboutImageForm').submit();
                
                $postLabel.label = $('#txtAboutLabel').val();
                $postColumn.column = $('#txtAreaAboutColumn').val();
                $postLabel.labelDestinationID = $('#aboutLabelDestinationID').val();
                $postColumn.columnDestinationID = $('#aboutColumnDestinationID').val();
                
                BSQUARED.Forms.post("POST", labelURL, $postLabel);
                BSQUARED.Forms.post("POST", columnURL, $postColumn);
                
            });
            
            $('#userAboutImageForm').submit(function(event){
               event.preventDefault();
                var data = new FormData($('#userAboutImageForm')[0]);
                data.append('destinationID', $('#fileAboutDestinationID').val());
                data.append('photoValue', $('#about_DestinationID option:selected').val());
                BSQUARED.Forms.postFiles("POST", imageURL, data);
            });
            
            btnAboutImage.on('click', function(event){
                event.preventDefault();
                fileInput.click();
            });

            btnSaveOverview.on('click', function(event){
                event.preventDefault();
                 var $post = {};
                $post.overview = $('#txtAbout_Overview').val();
                BSQUARED.Forms.post("POST", overviewURL, $post);
            });
        }
    }
})();